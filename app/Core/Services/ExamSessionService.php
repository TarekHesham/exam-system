<?php

namespace App\Core\Services;

use App\Exceptions\ExamAccessDeniedException;
use App\Modules\ExamManagement\Models\{Exam, ExamSession, ExamQuestion, StudentAnswer};
use App\Modules\Monitoring\Models\ExamMonitoring;
use App\Modules\Results\Models\ExamResult;
use App\Modules\UserManagement\Models\{Student, Teacher};
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\{DB, Cache};
use Illuminate\Support\Str;
use Illuminate\Validation\UnauthorizedException;
use InvalidArgumentException;
use Carbon\Carbon;

class ExamSessionService
{
    public function __construct(
        private StudentExamService $studentExamService
    ) {
        // 
    }

    public function startSession(int $examId, int $studentId, array $sessionData): ExamSession
    {
        return DB::transaction(function () use ($examId, $studentId, $sessionData) {
            $accessCheck = $this->studentExamService->checkExamAccess($examId, $studentId, $sessionData);
            if (!$accessCheck['can_access']) {
                throw new InvalidArgumentException('غير مصرح لك بدخول هذا الامتحان');
            }

            $exam = Exam::findOrFail($examId);
            $student = Student::findOrFail($studentId);

            // Cancel any existing sessions
            ExamSession::where('student_id', $studentId)
                ->whereIn('session_status', ['not_started', 'in_progress'])
                ->where('school_id', $student->school_id)
                ->update(['session_status' => 'cancelled']);

            // Create a new session
            $session = ExamSession::create([
                'exam_id' => $examId,
                'student_id' => $studentId,
                'school_id' => $student->school_id,
                'session_token' => Str::uuid(),
                'started_at' => Carbon::now(),
                'ip_address' => request()->ip(),
                'device_info' => json_encode($sessionData['device_info'] ?? []),
                'browser_info' => json_encode($sessionData['browser_info'] ?? []),
                'session_status' => 'not_started',
                'battery_level_at_start' => $sessionData['battery_level'] ?? 100,
                'video_recorded' => $exam->require_video_recording
            ]);

            $this->logSessionEvent($session, 'session_started', [
                'exam_id' => $examId,
                'student_id' => $studentId,
                'start_time' => Carbon::now(),
                'device_info' => $sessionData['device_info'] ?? []
            ]);

            Cache::put("exam_session_{$session->id}", [
                'session_id' => $session->id,
                'exam_id' => $examId,
                'student_id' => $studentId,
                'started_at' => $session->started_at,
                'duration_minutes' => $exam->duration_minutes,
                'last_heartbeat' => Carbon::now()
            ], $exam->duration_minutes * 60 + 300);

            return [
                'status' => true,
                'message' => "تم السماح للطالب بالدخول للامتحان {$exam->title}",
            ];
        });
    }

    public function getSession(string $sessionId): ExamSession
    {
        $session = ExamSession::with(['exam', 'student'])->find($sessionId);

        if (!$session) {
            throw new InvalidArgumentException('غير مسموح لك بدخول الامتحان حتى يسمح لك المراقب.');
        }

        if ($session->session_status === 'expired') {
            throw new InvalidArgumentException('انتهت صلاحية الجلسة');
        }

        return $session;
    }

    public function getSessionByStudentId(string $studentId): ExamSession
    {
        $session = ExamSession::with(['exam.subject', 'exam.questions'])
            ->where('session_status', 'not_started')
            ->where('student_id', $studentId)
            ->first();

        if (!$session) {
            throw new InvalidArgumentException('غير مسموح لك بدخول الامتحان حتى يسمح لك المراقب.');
        }

        if ($session->session_status === 'expired') {
            throw new InvalidArgumentException('انتهت صلاحية الجلسة');
        }

        return $session;
    }

    public function getSessionQuestions(ExamSession $session): Collection
    {
        $cacheKey = "exam_questions_{$session->exam_id}_{$session->student_id}";

        return Cache::remember($cacheKey, 3600, function () use ($session) {
            $questions = ExamQuestion::where('exam_id', $session->exam_id)
                ->get();

            return $questions->map(function ($question) use ($session) {
                $answer = StudentAnswer::where('session_id', $session->id)
                    ->where('question_id', $question->id)
                    ->first();

                return [
                    'id' => $question->id,
                    'question_text' => $question->question_text,
                    'question_image' => $question->question_image,
                    'question_type' => $question->question_type,
                    'options' => $question->options,
                    'points' => $question->points,
                    'is_required' => $question->is_required,
                    'help_text' => $question->help_text,
                    'current_answer' => $answer ? [
                        'answer_text' => $answer->answer_text,
                        'answer_image' => $answer->answer_image,
                        'answer_data' => $answer->answer_data,
                        'answered_at' => $answer->answered_at,
                        'time_spent_seconds' => $answer->time_spent_seconds
                    ] : null
                ];
            });
        });
    }

    public function saveAnswer(ExamSession $session, int $questionId, array $answerData): StudentAnswer
    {
        if ($session->session_status !== 'in_progress') {
            throw new InvalidArgumentException('الجلسة غير نشطة');
        }

        if ($this->isSessionExpired($session)) {
            $this->expireSession($session);
            throw new InvalidArgumentException('انتهى وقت الامتحان');
        }

        $question = ExamQuestion::where('exam_id', $session->exam_id)
            ->where('id', $questionId)
            ->firstOrFail();

        return DB::transaction(function () use ($session, $question, $answerData) {
            $answer = StudentAnswer::updateOrCreate(
                [
                    'session_id' => $session->id,
                    'question_id' => $question->id
                ],
                [
                    'answer_text' => $answerData['answer_text'] ?? null,
                    'answer_image' => $answerData['answer_image'] ?? null,
                    'answer_data' => json_encode($answerData['answer_data'] ?? []),
                    'answered_at' => Carbon::now(),
                    'time_spent_seconds' => $answerData['time_spent_seconds'] ?? 0,
                    'is_flagged' => false,
                    'needs_review' => false
                ]
            );

            $this->logSessionEvent($session, 'answer_saved', [
                'question_id' => $question->id,
                'question_type' => $question->question_type,
                'answer_length' => strlen($answerData['answer_text'] ?? ''),
                'time_spent' => $answerData['time_spent_seconds'] ?? 0
            ]);

            $session->touch();

            return $answer;
        });
    }

    public function saveAllAnswers(ExamSession $session, array $answers)
    {
        return DB::transaction(function () use ($session, $answers) {
            StudentAnswer::where('session_id', $session->id)->delete();

            $now = Carbon::now();
            $insertData = [];

            foreach ($answers as $answerData) {
                $insertData[] = [
                    'session_id'         => $session->id,
                    'question_id'        => $answerData['question_id'],
                    'answer_text'        => $answerData['answer_text'] ?? null,
                    'answer_image'       => $answerData['answer_image'] ?? null,
                    'answer_data'        => isset($answerData['answer_data']) ? json_encode($answerData['answer_data']) : null,
                    'time_spent_seconds' => $answerData['time_spent_seconds'] ?? 0,
                    'is_flagged'         => false,
                    'needs_review'       => false,
                    'answered_at'        => $now,
                    'created_at'         => $now,
                    'updated_at'         => $now,
                ];
            }

            // bulk insert
            StudentAnswer::insert($insertData);

            // log
            $this->logSessionEvent($session, 'bulk_answers_saved', [
                'answers_count' => count($insertData)
            ]);

            return collect($insertData);
        });
    }

    /**
     * Teacher creates session for student after QR scan
     */
    public function createSessionByTeacher(
        int $examId,
        int $studentId,
        int $teacherId,
        array $sessionData
    ): ExamSession {
        return DB::transaction(function () use ($examId, $studentId, $teacherId, $sessionData) {

            // Verify teacher has permission
            $this->verifyTeacherPermission($teacherId, $studentId);

            // Check exam access for student
            $accessCheck = $this->studentExamService->checkExamAccess($examId, $studentId, $sessionData);
            if (! $accessCheck['can_access']) {
                $failedMessages = collect($accessCheck['checks'])
                    ->filter(fn($check) => ! $check['status'])
                    ->pluck('message')
                    ->values()
                    ->toArray();

                throw new ExamAccessDeniedException($failedMessages);
            }

            $exam = Exam::findOrFail($examId);
            $student = Student::findOrFail($studentId);

            // Cancel any existing sessions for this student
            ExamSession::where('student_id', $studentId)
                ->whereIn('session_status', ['not_started', 'in_progress'])
                ->where('school_id', $student->school_id)
                ->update(['session_status' => 'cancelled']);

            // Create new session
            $session = ExamSession::create([
                'exam_id' => $examId,
                'student_id' => $studentId,
                'school_id' => $student->school_id,
                'session_token' => Str::uuid(),
                'created_at' => Carbon::now(),
                'ip_address' => request()->ip(),
                'device_info' => json_encode($sessionData['device_info'] ?? []),
                'browser_info' => json_encode($sessionData['browser_info'] ?? []),
                'session_status' => 'not_started',
                'battery_level_at_start' => $sessionData['battery_level'] ?? 100,
                'video_recorded' => $exam->require_video_recording,
                'teacher_id' => $teacherId
            ]);

            // Log session creation by teacher
            $this->logSessionEvent($session, 'session_created_by_teacher', [
                'teacher_id' => $teacherId,
                'exam_id' => $examId,
                'student_id' => $studentId,
                'creation_time' => Carbon::now(),
                'device_info' => $sessionData['device_info'] ?? []
            ]);

            return $session;
        });
    }

    /**
     * Verify teacher has permission to create session for student
     */
    private function verifyTeacherPermission(int $teacherId, int $studentId): void
    {
        $teacher = Teacher::findOrFail($teacherId);
        $student = Student::findOrFail($studentId);

        // Check if teacher is assigned to the same school
        $hasPermission = $teacher->schoolAssignments()
            ->where('school_id', $student->school_id)
            ->where('assignment_type', 'supervision')
            ->exists();

        if (!$hasPermission) {
            throw new UnauthorizedException('غير مصرح لك بفتح الامتحان لهذا الطالب');
        }
    }

    public function submitSession(ExamSession $session, array $submitData = []): array
    {
        return DB::transaction(function () use ($session, $submitData) {
            if ($session->session_status !== 'in_progress') {
                throw new InvalidArgumentException('الجلسة غير نشطة أو تم إرسالها مسبقاً');
            }

            // Save answers
            $this->saveAllAnswers($session, $submitData['answers'] ?? []);

            // Update session
            $session->update([
                'submitted_at'   => Carbon::now(),
                'session_status' => 'submitted',
                'session_notes'  => $submitData['notes'] ?? null
            ]);

            $totalQuestions = ExamQuestion::where('exam_id', $session->exam_id)->count();

            $preliminaryScore = $this->calculatePreliminaryScore($session);

            $needsManualCorrection = $this->needsManualCorrection($session);

            $result = $this->createExamResult($session, $preliminaryScore, $needsManualCorrection);

            $answersCount = count($submitData['answers'] ?? []);
            $this->logSessionEvent($session, 'session_submitted', [
                'total_questions'         => $totalQuestions,
                'answered_questions'      => $answersCount,
                'preliminary_score'       => $preliminaryScore,
                'needs_manual_correction' => $needsManualCorrection,
                'submission_time'         => Carbon::now()
            ]);

            Cache::forget("exam_session_{$session->id}");
            Cache::forget("exam_questions_{$session->exam_id}_{$session->student_id}");

            return [
                'session_id' => $session->id,
                'total_questions' => $totalQuestions,
                'answered_questions' => $answersCount,
                'preliminary_score' => $preliminaryScore,
                'needs_manual_correction' => $needsManualCorrection,
                'result_available_at' => $needsManualCorrection ? null : Carbon::now(),
                'result_id' => $result->id
            ];
        });
    }

    public function updateHeartbeat(ExamSession $session, array $statusData = []): void
    {
        $cacheKey = "exam_session_{$session->id}";
        $sessionCache = Cache::get($cacheKey);

        if ($sessionCache) {
            $sessionCache['last_heartbeat'] = Carbon::now();
            $sessionCache['battery_level'] = $statusData['battery_level'] ?? null;
            $sessionCache['connection_status'] = $statusData['connection_status'] ?? 'stable';

            Cache::put($cacheKey, $sessionCache, $session->exam->duration_minutes * 60);
        }

        if (isset($statusData['battery_level']) && $statusData['battery_level'] < $session->exam->minimum_battery_percentage) {
            $this->logSessionEvent($session, 'low_battery_warning', [
                'battery_level' => $statusData['battery_level'],
                'minimum_required' => $session->exam->minimum_battery_percentage
            ], 'warning');
        }

        if (isset($statusData['active_apps']) && !empty($statusData['active_apps'])) {
            $suspiciousApps = $this->detectSuspiciousApps($statusData['active_apps']);
            if (!empty($suspiciousApps)) {
                $this->logSessionEvent($session, 'suspicious_apps_detected', [
                    'suspicious_apps' => $suspiciousApps,
                    'all_apps' => $statusData['active_apps']
                ], 'critical');
            }
        }

        $session->touch();
    }

    public function getTimeRemaining(ExamSession $session): array
    {
        $exam = $session->exam;
        $now = Carbon::now();

        $sessionEndTime = $session->started_at->addMinutes($exam->duration_minutes);
        $examEndTime = Carbon::parse($exam->end_time);

        $actualEndTime = $sessionEndTime->min($examEndTime);

        $timeRemainingMinutes = $now < $actualEndTime ? $now->diffInMinutes($actualEndTime) : 0;
        $timeRemainingSeconds = $now < $actualEndTime ? $now->diffInSeconds($actualEndTime) : 0;

        if ($timeRemainingSeconds <= 0 && $session->session_status === 'in_progress') {
            $this->expireSession($session);
        }

        return [
            'time_remaining_minutes' => $timeRemainingMinutes,
            'time_remaining_seconds' => $timeRemainingSeconds,
            'session_duration_minutes' => $exam->duration_minutes,
            'time_elapsed_minutes' => $session->started_at->diffInMinutes($now),
            'session_end_time' => $actualEndTime,
            'is_expired' => $timeRemainingSeconds <= 0,
            'warning_threshold' => $timeRemainingMinutes <= 5
        ];
    }

    public function pauseSession(ExamSession $session): ExamSession
    {
        if (!$session->exam->allow_pause) {
            throw new InvalidArgumentException('غير مسموح بإيقاف هذا الامتحان مؤقتاً');
        }

        if ($session->session_status !== 'in_progress') {
            throw new InvalidArgumentException('لا يمكن إيقاف الجلسة في حالتها الحالية');
        }

        $session->update([
            'session_status' => 'paused',
            'paused_at' => Carbon::now()
        ]);

        $this->logSessionEvent($session, 'session_paused', [
            'paused_at' => Carbon::now(),
            'time_elapsed' => $session->started_at->diffInMinutes(Carbon::now())
        ]);

        return $session;
    }

    public function resumeSession(ExamSession $session): ExamSession
    {
        if ($session->session_status !== 'paused') {
            throw new InvalidArgumentException('الجلسة غير متوقفة مؤقتاً');
        }

        if ($this->isSessionExpired($session)) {
            $this->expireSession($session);
            throw new InvalidArgumentException('انتهى وقت الامتحان');
        }

        $session->update([
            'session_status' => 'in_progress',
            'resumed_at' => Carbon::now()
        ]);

        $this->logSessionEvent($session, 'session_resumed', [
            'resumed_at' => Carbon::now(),
            'pause_duration_minutes' => $session->paused_at->diffInMinutes(Carbon::now())
        ]);

        return $session;
    }

    public function expireSession(ExamSession $session): ExamSession
    {
        if ($session->session_status === 'submitted') {
            return $session;
        }

        return DB::transaction(function () use ($session) {
            $session->update([
                'session_status' => 'expired',
                'submitted_at' => Carbon::now(),
                'session_notes' => 'انتهى الوقت تلقائياً'
            ]);

            $preliminaryScore = $this->calculatePreliminaryScore($session);
            $needsManualCorrection = $this->needsManualCorrection($session);

            $this->createExamResult($session, $preliminaryScore, $needsManualCorrection);

            $this->logSessionEvent($session, 'session_expired', [
                'expired_at' => Carbon::now(),
                'auto_submitted' => true,
                'preliminary_score' => $preliminaryScore
            ], 'warning');

            return $session;
        });
    }

    public function reportIssue(ExamSession $session, array $issueData): void
    {
        $this->logSessionEvent($session, 'issue_reported', [
            'issue_type' => $issueData['type'] ?? 'technical',
            'description' => $issueData['description'] ?? '',
            'screenshot' => $issueData['screenshot'] ?? null,
            'browser_info' => $issueData['browser_info'] ?? [],
            'timestamp' => Carbon::now()
        ], 'critical');
    }

    // ============================================
    // Private Helper Methods
    // ============================================
    private function isSessionExpired(ExamSession $session): bool
    {
        $exam = $session->exam;
        $now = Carbon::now();

        if ($now > $exam->end_time) {
            return true;
        }

        $sessionEndTime = $session->started_at->addMinutes($exam->duration_minutes);
        if ($now > $sessionEndTime) {
            return true;
        }

        return false;
    }

    private function calculatePreliminaryScore(ExamSession $session): int
    {
        $score = 0;

        $answers = StudentAnswer::where('session_id', $session->id)
            ->with('question')
            ->get();

        foreach ($answers as $answer) {
            $question = $answer->question;

            if (in_array($question->question_type, ['multiple_choice', 'true_false'])) {
                if ($this->isAnswerCorrect($question, $answer)) {
                    $score += $question->points;
                }
            }
        }

        return $score;
    }

    private function isAnswerCorrect(ExamQuestion $question, StudentAnswer $answer): bool
    {
        $correctAnswer = $question->correct_answer;
        $studentAnswer = $answer->answer_text;

        switch ($question->question_type) {
            case 'multiple_choice':
                return trim(strtolower($correctAnswer)) === trim(strtolower($studentAnswer));

            case 'true_false':
                return trim(strtolower($correctAnswer)) === trim(strtolower($studentAnswer));

            default:
                return false;
        }
    }

    private function needsManualCorrection(ExamSession $session): bool
    {
        $essayQuestions = ExamQuestion::where('exam_id', $session->exam_id)
            ->whereIn('question_type', ['essay', 'fill_blank'])
            ->exists();

        return $essayQuestions;
    }

    private function createExamResult(ExamSession $session, int $preliminaryScore, bool $needsManualCorrection): ExamResult
    {
        $exam = $session->exam;
        $maxScore = ExamQuestion::where('exam_id', $exam->id)->sum('points');
        $percentage = $maxScore > 0 ? round(($preliminaryScore / $maxScore) * 100, 2) : 0;

        return ExamResult::create([
            'session_id'          => $session->id,
            'student_id'          => $session->student_id,
            'exam_id'             => $session->exam_id,
            'total_score'         => $needsManualCorrection ? null : $preliminaryScore,
            'max_possible_score'  => $maxScore,
            'percentage'          => $needsManualCorrection ? null : $percentage,
            'result_status'       => $needsManualCorrection ? 'pending' : 'published',
            'question_scores'     => $this->getQuestionScores($session),
            'result_published_at' => $needsManualCorrection ? null : Carbon::now()
        ]);
    }

    private function getQuestionScores(ExamSession $session): array
    {
        $scores = [];

        $answers = StudentAnswer::where('session_id', $session->id)
            ->with('question')
            ->get();

        foreach ($answers as $answer) {
            $question = $answer->question;
            $isCorrect = $this->isAnswerCorrect($question, $answer);

            $scores[$question->id] = [
                'question_id' => $question->id,
                'question_type' => $question->question_type,
                'max_points' => $question->points,
                'earned_points' => in_array($question->question_type, ['multiple_choice', 'true_false'])
                    ? ($isCorrect ? $question->points : 0)
                    : null,
                'is_correct' => in_array($question->question_type, ['multiple_choice', 'true_false'])
                    ? $isCorrect
                    : null,
                'needs_manual_review' => in_array($question->question_type, ['essay', 'fill_blank'])
            ];
        }

        return $scores;
    }

    private function logSessionEvent(ExamSession $session, string $eventType, array $eventData, string $severity = 'info'): void
    {
        ExamMonitoring::create([
            'session_id' => $session->id,
            'event_type' => $eventType,
            'event_data' => json_encode($eventData),
            'ip_address' => request()->ip(),
            'event_timestamp' => Carbon::now(),
            'severity_level' => $severity,
            'requires_action' => in_array($severity, ['warning', 'critical'])
        ]);
    }

    private function detectSuspiciousApps(array $activeApps): array
    {
        $suspiciousPatterns = [
            'screen.*record',
            'team.*viewer',
            'chrome.*remote',
            'anydesk',
            'whatsapp',
            'telegram',
            'calculator',
            'notepad',
            'browser.*dev',
            'inspect.*element'
        ];

        $suspicious = [];

        foreach ($activeApps as $app) {
            $appName = strtolower($app);
            foreach ($suspiciousPatterns as $pattern) {
                if (preg_match("/$pattern/i", $appName)) {
                    $suspicious[] = $app;
                    break;
                }
            }
        }

        return array_unique($suspicious);
    }

    public function getSessionStatistics(ExamSession $session): array
    {
        $answers = StudentAnswer::where('session_id', $session->id)->get();
        $questions = ExamQuestion::where('exam_id', $session->exam_id)->get();

        return [
            'session_info' => [
                'id' => $session->id,
                'status' => $session->session_status,
                'started_at' => $session->started_at,
                'submitted_at' => $session->submitted_at,
                'duration_minutes' => $session->started_at && $session->submitted_at
                    ? $session->started_at->diffInMinutes($session->submitted_at)
                    : null
            ],
            'progress' => [
                'total_questions' => $questions->count(),
                'answered_questions' => $answers->count(),
                'completion_percentage' => $questions->count() > 0
                    ? round(($answers->count() / $questions->count()) * 100, 1)
                    : 0
            ],
            'question_types' => [
                'multiple_choice' => $questions->where('question_type', 'multiple_choice')->count(),
                'essay' => $questions->where('question_type', 'essay')->count(),
                'true_false' => $questions->where('question_type', 'true_false')->count(),
                'fill_blank' => $questions->where('question_type', 'fill_blank')->count()
            ],
            'timing' => [
                'average_time_per_question' => $answers->count() > 0
                    ? round($answers->avg('time_spent_seconds') / 60, 1)
                    : 0,
                'total_time_spent_minutes' => round($answers->sum('time_spent_seconds') / 60, 1)
            ]
        ];
    }

    public function getAnswers(ExamSession $session): Collection
    {
        return StudentAnswer::where('session_id', $session->id)
            ->with(['question:id,question_text,question_type,points,order_number'])
            ->orderBy('created_at')
            ->get()
            ->map(function ($answer) {
                return [
                    'id' => $answer->id,
                    'question_id' => $answer->question_id,
                    'question' => [
                        'id' => $answer->question->id,
                        'text' => Str::limit($answer->question->question_text, 100),
                        'type' => $answer->question->question_type,
                        'points' => $answer->question->points,
                        'order' => $answer->question->order_number
                    ],
                    'answer_text' => $answer->answer_text,
                    'answered_at' => $answer->answered_at,
                    'time_spent_seconds' => $answer->time_spent_seconds,
                    'is_flagged' => $answer->is_flagged
                ];
            });
    }

    public function flagQuestionForReview(ExamSession $session, int $questionId, bool $flag = true): void
    {
        StudentAnswer::where('session_id', $session->id)
            ->where('question_id', $questionId)
            ->update(['is_flagged' => $flag]);

        $this->logSessionEvent($session, $flag ? 'question_flagged' : 'question_unflagged', [
            'question_id' => $questionId,
            'flagged' => $flag
        ]);
    }

    public function getFlaggedQuestions(ExamSession $session): Collection
    {
        return StudentAnswer::where('session_id', $session->id)
            ->where('is_flagged', true)
            ->with('question:id,question_text,order_number')
            ->get();
    }
}
