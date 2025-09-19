<?php

namespace App\Core\Services;

use App\Modules\ExamManagement\Models\Exam;
use App\Modules\ExamManagement\Models\ExamSession;
use App\Modules\ExamManagement\Models\StudentQrCode;
use App\Modules\UserManagement\Models\Student;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Str;
use InvalidArgumentException;

class StudentExamService
{
    public function getAvailableExams(int $studentId): Collection
    {
        $student = Student::with(['user', 'school'])->findOrFail($studentId);

        return Exam::query()
            ->where('is_published', true)
            ->where('is_active', true)
            ->where('academic_year', $student->academic_year)
            ->whereHas('subject', function ($query) use ($student) {
                $query->where(function ($q) use ($student) {
                    $q->where('section', $student->section)
                        ->orWhere('section', 'common');
                });
            })
            ->where('start_time', '>', Carbon::now()->subMinutes(30))
            ->whereDoesntHave('sessions', function ($query) use ($studentId) {
                $query->where('student_id', $studentId)
                    ->whereIn('session_status', ['submitted', 'in_progress']);
            })
            ->with([
                'subject:id,name,section,duration_minutes',
                'creator:id,name'
            ])
            ->select([
                'id',
                'subject_id',
                'created_by',
                'title',
                'description',
                'exam_type',
                'academic_year',
                'start_time',
                'end_time',
                'duration_minutes',
                'total_score',
                'allow_late_entry',
                'late_entry_limit_minutes',
                'minimum_battery_percentage',
                'require_video_recording'
            ])
            ->orderBy('start_time', 'asc')
            ->get()
            ->map(function ($exam) {
                return [
                    'id' => $exam->id,
                    'title' => $exam->title,
                    'description' => $exam->description,
                    'subject' => $exam->subject,
                    'exam_type' => $exam->exam_type,
                    'start_time' => $exam->start_time,
                    'end_time' => $exam->end_time,
                    'duration_minutes' => $exam->duration_minutes,
                    'total_score' => $exam->total_score,
                    'status' => $this->getExamStatusForStudent($exam),
                    'can_enter' => $this->canStudentEnterExam($exam),
                    'entry_window' => $this->getEntryWindow($exam),
                    'requirements' => [
                        'minimum_battery' => $exam->minimum_battery_percentage,
                        'video_recording' => $exam->require_video_recording,
                        'late_entry_allowed' => $exam->allow_late_entry
                    ]
                ];
            });
    }

    public function getUpcomingExams(int $studentId): Collection
    {
        return $this->getAvailableExams($studentId)
            ->filter(function ($exam) {
                return $exam['status'] === 'upcoming';
            });
    }

    public function getCompletedExams(int $studentId): Collection
    {
        $student = Student::findOrFail($studentId);

        return ExamSession::query()
            ->where('student_id', $studentId)
            ->where('session_status', 'submitted')
            ->with([
                'exam:id,title,subject_id,total_score,start_time,end_time',
                'exam.subject:id,name',
                'result:id,session_id,total_score,percentage,result_status'
            ])
            ->orderBy('submitted_at', 'desc')
            ->get()
            ->map(function ($session) {
                return [
                    'exam_id' => $session->exam->id,
                    'exam_title' => $session->exam->title,
                    'subject' => $session->exam->subject,
                    'submitted_at' => $session->submitted_at,
                    'duration_taken' => $session->started_at->diffInMinutes($session->submitted_at),
                    'result' => $session->result ? [
                        'score' => $session->result->total_score,
                        'percentage' => $session->result->percentage,
                        'status' => $session->result->result_status,
                        'max_score' => $session->exam->total_score
                    ] : null,
                    'can_appeal' => $this->canStudentAppeal($session)
                ];
            });
    }

    public function checkExamAccess(int $examId, int $studentId, array $deviceData = []): array
    {
        $exam = Exam::with(['subject', 'sessions' => function ($query) use ($studentId) {
            $query->where('student_id', $studentId);
        }])->findOrFail($examId);

        $student = Student::with(['user', 'school'])->findOrFail($studentId);
        $now = Carbon::now();

        $checks = [
            'exam_published' => [
                'status' => $exam->is_published && $exam->is_active,
                'message' => $exam->is_published ? 'الامتحان منشور' : 'الامتحان غير منشور'
            ],
            'correct_academic_year' => [
                'status' => $exam->academic_year === $student->academic_year,
                'message' => $exam->academic_year === $student->academic_year ?
                    'السنة الدراسية متطابقة' : 'الامتحان ليس لسنتك الدراسية'
            ],
            'correct_section' => [
                'status' => in_array($exam->subject->section, [$student->section, 'common']),
                'message' => in_array($exam->subject->section, [$student->section, 'common']) ?
                    'القسم متطابق' : 'الامتحان ليس لقسمك'
            ],
            'timing_valid' => [
                'status' => $this->isTimingValid($exam, $now),
                'message' => $this->getTimingMessage($exam, $now)
            ],
            'no_existing_session' => [
                'status' => $exam->sessions->whereIn('session_status', ['submitted', 'in_progress'])->isEmpty(),
                'message' => $exam->sessions->whereIn('session_status', ['submitted', 'in_progress'])->isEmpty() ?
                    'لا توجد جلسة سابقة' : 'لديك جلسة سابقة لهذا الامتحان'
            ],
            'student_not_banned' => [
                'status' => !$student->is_banned || ($student->ban_until && $student->ban_until < $now),
                'message' => (!$student->is_banned || ($student->ban_until && $student->ban_until < $now)) ?
                    'الطالب غير محظور' : 'الطالب محظور حتى ' . $student->ban_until
            ]
        ];

        if (!empty($deviceData)) {
            $checks['battery_level'] = [
                'status' => ($deviceData['battery_level'] ?? 100) >= $exam->minimum_battery_percentage,
                'message' => ($deviceData['battery_level'] ?? 100) >= $exam->minimum_battery_percentage ?
                    'مستوى البطارية كافٍ' : "مستوى البطارية يجب أن يكون {$exam->minimum_battery_percentage}% على الأقل"
            ];

            $checks['location_valid'] = [
                'status' => $this->isLocationValid($student->school, $deviceData['location'] ?? null),
                'message' => 'التحقق من الموقع'
            ];
        }

        $canAccess = collect($checks)->every(fn($check) => $check['status']);

        return [
            'can_access' => $canAccess,
            'checks' => $checks,
            'exam' => [
                'id' => $exam->id,
                'title' => $exam->title,
                'start_time' => $exam->start_time,
                'duration_minutes' => $exam->duration_minutes,
                'requirements' => [
                    'minimum_battery' => $exam->minimum_battery_percentage,
                    'video_recording' => $exam->require_video_recording,
                    'late_entry_allowed' => $exam->allow_late_entry,
                    'late_entry_limit' => $exam->late_entry_limit_minutes
                ]
            ],
            'student' => [
                'id' => $student->id,
                'name' => $student->user->name,
                'academic_year' => $student->academic_year,
                'section' => $student->section,
                'is_banned' => $student->is_banned
            ]
        ];
    }

    public function generateEntryQR(int $examId, int $studentId): StudentQrCode
    {
        $exam = Exam::findOrFail($examId);
        $student = Student::findOrFail($studentId);

        $accessCheck = $this->checkExamAccess($examId, $studentId);
        if (!$accessCheck['can_access']) {
            throw new InvalidArgumentException('غير مصرح لك بدخول هذا الامتحان');
        }

        StudentQrCode::where('student_id', $studentId)
            ->where('exam_id', $examId)
            ->where('qr_type', 'entry')
            ->where('is_used', false)
            ->update(['is_used' => true]);

        return StudentQrCode::create([
            'student_id' => $studentId,
            'exam_id' => $examId,
            'qr_code' => $this->generateUniqueQRCode(),
            'qr_type' => 'entry',
            'is_used' => false,
            'expires_at' => Carbon::now()->addMinutes(5),
            'used_at' => null,
            'used_by_device' => null
        ]);
    }

    public function validateQRCode(string $qrCode, int $examId, int $studentId, array $deviceInfo = []): bool
    {
        $qrCodeRecord = StudentQrCode::where('qr_code', $qrCode)
            ->where('exam_id', $examId)
            ->where('student_id', $studentId)
            ->where('qr_type', 'entry')
            ->where('is_used', false)
            ->where('expires_at', '>', Carbon::now())
            ->first();

        if (!$qrCodeRecord) {
            throw new InvalidArgumentException('رمز QR غير صالح أو منتهي الصلاحية');
        }

        $qrCodeRecord->update([
            'is_used' => true,
            'used_at' => Carbon::now(),
            'used_by_device' => json_encode($deviceInfo)
        ]);

        return true;
    }

    public function getExamDetailsForStudent(int $examId, int $studentId): array
    {
        $exam = Exam::with(['subject', 'creator'])->findOrFail($examId);
        $accessCheck = $this->checkExamAccess($examId, $studentId);

        return [
            'exam' => [
                'id' => $exam->id,
                'title' => $exam->title,
                'description' => $exam->description,
                'subject' => $exam->subject,
                'exam_type' => $exam->exam_type,
                'start_time' => $exam->start_time,
                'end_time' => $exam->end_time,
                'duration_minutes' => $exam->duration_minutes,
                'total_score' => $exam->total_score,
                'question_count' => $exam->questions()->count(),
                'instructions' => $this->getExamInstructions($exam)
            ],
            'access_status' => $accessCheck,
            'time_info' => [
                'current_time' => Carbon::now(),
                'time_until_start' => Carbon::now()->diffInMinutes($exam->start_time, false),
                'can_enter_now' => $accessCheck['can_access']
            ]
        ];
    }

    // ============================================
    // Private Helper Methods
    // ============================================

    private function getExamStatusForStudent(Exam $exam): string
    {
        $now = Carbon::now();

        if ($now < $exam->start_time) {
            return 'upcoming';
        }

        if ($now >= $exam->start_time && $now <= $exam->end_time) {
            return 'ongoing';
        }

        return 'completed';
    }

    private function canStudentEnterExam(Exam $exam): bool
    {
        $now = Carbon::now();
        $status = $this->getExamStatusForStudent($exam);

        if ($status === 'ongoing') {
            return true;
        }

        if ($status === 'upcoming' && $exam->allow_late_entry) {
            $lateEntryDeadline = $exam->start_time->addMinutes($exam->late_entry_limit_minutes);
            return $now <= $lateEntryDeadline;
        }

        return false;
    }

    private function getEntryWindow(Exam $exam): array
    {
        return [
            'start_time' => $exam->start_time,
            'end_time' => $exam->end_time,
            'late_entry_allowed' => $exam->allow_late_entry,
            'late_entry_deadline' => $exam->allow_late_entry ?
                $exam->start_time->addMinutes($exam->late_entry_limit_minutes) : null
        ];
    }

    private function isTimingValid(Exam $exam, Carbon $now): bool
    {
        if ($now >= $exam->start_time && $now <= $exam->end_time) {
            return true;
        }

        if ($exam->allow_late_entry && $now < $exam->start_time) {
            $lateEntryStart = $exam->start_time->subMinutes($exam->late_entry_limit_minutes);
            return $now >= $lateEntryStart;
        }

        return false;
    }

    private function getTimingMessage(Exam $exam, Carbon $now): string
    {
        if ($now < $exam->start_time) {
            $diff = $now->diffInMinutes($exam->start_time);
            return "الامتحان يبدأ خلال {$diff} دقيقة";
        }

        if ($now > $exam->end_time) {
            return "انتهى وقت الامتحان";
        }

        return "الامتحان متاح الآن";
    }

    private function isLocationValid($school, $location): bool
    {
        if (!$location || !$school) {
            return true;
        }

        $distance = $this->calculateDistance(
            $location['latitude'] ?? 0,
            $location['longitude'] ?? 0,
            $school->latitude ?? 0,
            $school->longitude ?? 0
        );

        return $distance <= 1000;
    }

    private function calculateDistance($lat1, $lng1, $lat2, $lng2): float
    {
        $earthRadius = 6371000;

        $latDelta = deg2rad($lat2 - $lat1);
        $lngDelta = deg2rad($lng2 - $lng1);

        $a = sin($latDelta / 2) * sin($latDelta / 2) +
            cos(deg2rad($lat1)) * cos(deg2rad($lat2)) *
            sin($lngDelta / 2) * sin($lngDelta / 2);

        $c = 2 * atan2(sqrt($a), sqrt(1 - $a));

        return $earthRadius * $c;
    }

    private function canStudentAppeal($session): bool
    {
        if (!$session->result) {
            return false;
        }

        $appealDeadline = $session->result->result_published_at?->addDays(7);

        return $appealDeadline && Carbon::now() <= $appealDeadline &&
            !$session->appeals()->exists();
    }

    private function generateUniqueQRCode(): string
    {
        do {
            $code = 'EXAM_' . strtoupper(Str::random(10));
        } while (StudentQrCode::where('qr_code', $code)->exists());

        return $code;
    }

    private function getExamInstructions(Exam $exam): array
    {
        return [
            'general' => [
                'اقرأ جميع الأسئلة بعناية قبل البدء',
                'تأكد من اتصال الإنترنت قبل البدء',
                'لا تغلق الانترنت أثناء الامتحان',
                'سيتم حفظ إجاباتك تلقائياً'
            ],
            'technical' => [
                "مدة الامتحان: {$exam->duration_minutes} دقيقة",
                "الدرجة الكاملة: {$exam->total_score} درجة",
                $exam->require_video_recording ? 'سيتم تسجيل الفيديو أثناء الامتحان' : null,
                "الحد الأدنى لشحن البطارية: {$exam->minimum_battery_percentage}%"
            ],
            'rules' => [
                'ممنوع استخدام أي مصادر خارجية',
                'ممنوع التواصل مع الآخرين',
                'سيتم رصد أي محاولة غش',
                'في حالة انقطاع الاتصال، أعد تسجيل الدخول فوراً'
            ]
        ];
    }
}
