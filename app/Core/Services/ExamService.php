<?php

namespace App\Core\Services;

use App\Contracts\Repositories\ExamRepositoryInterface;
use App\Contracts\Services\ExamServiceInterface;
use App\Core\DTOs\{ExamFilterDTO, UpdateExamDTO, CreateExamDTO};
use App\Modules\Authentication\Models\User;
use App\Modules\ExamManagement\Models\{Exam, ExamSession};
use App\Modules\UserManagement\Models\Student;
use Illuminate\Database\Eloquent\{Collection, ModelNotFoundException};
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\{Auth, DB};
use InvalidArgumentException;
use Carbon\Carbon;

class ExamService implements ExamServiceInterface
{
    public function __construct(
        private ExamRepositoryInterface $examRepository
    ) {}

    public function createExam(CreateExamDTO $dto): Exam
    {
        $this->validateExamTimes($dto->startTime, $dto->endTime, $dto->durationMinutes);

        $examData = [
            'subject_id' => $dto->subjectId,
            'created_by' => $dto->createdBy,
            'title' => $dto->title,
            'description' => $dto->description,
            'exam_type' => $dto->examType,
            'academic_year' => $dto->academicYear,
            'start_time' => $dto->startTime,
            'end_time' => $dto->endTime,
            'duration_minutes' => $dto->durationMinutes,
            'total_score' => $dto->totalScore,
            'allow_late_entry' => $dto->allowLateEntry,
            'late_entry_limit_minutes' => $dto->lateEntryLimitMinutes,
            'minimum_battery_percentage' => $dto->minimumBatteryPercentage,
            'require_video_recording' => $dto->requireVideoRecording,
            'is_published' => false,
            'is_active' => true
        ];

        return DB::transaction(function () use ($examData) {
            return $this->examRepository->create($examData);
        });
    }

    public function updateExam(int $examId, UpdateExamDTO $dto): Exam
    {
        $exam = $this->getExam($examId);

        if ($dto->startTime && $dto->endTime) {
            $this->validateExamTimes($dto->startTime, $dto->endTime, $dto->durationMinutes ?? $exam->duration_minutes);
        }

        // Check if exam has started
        if ($exam->start_time <= Carbon::now() && $exam->is_published) {
            throw new InvalidArgumentException('لا يمكن تعديل الامتحان بعد بدءه');
        }

        $updateData = array_filter($dto->toArray(), fn($value) => $value !== null);

        DB::transaction(function () use ($exam, $updateData) {
            $this->examRepository->update($exam, $updateData);
        });

        return $this->getExam($examId);
    }

    public function deleteExam(int $examId): bool
    {
        $exam = $this->getExam($examId);

        // Check if exam has sessions
        if ($exam->sessions()->exists()) {
            throw new InvalidArgumentException('لا يمكن حذف الامتحان لوجود جلسات مرتبطة به');
        }

        return DB::transaction(function () use ($exam) {
            return $this->examRepository->delete($exam);
        });
    }

    public function getExam(int $examId): Exam
    {
        $exam = $this->examRepository->findById($examId);

        if (!$exam) {
            throw new ModelNotFoundException('الامتحان غير موجود');
        }

        return $exam;
    }

    public function getExamWithDetails(int $examId): Exam
    {
        $exam = $this->examRepository->findByIdWithRelations($examId, [
            'subject',
            'creator',
            'questions',
            'sessions.student.user',
            'results'
        ]);

        if (!$exam) {
            throw new ModelNotFoundException('الامتحان غير موجود');
        }

        return $exam;
    }

    public function getExams(ExamFilterDTO $filters): LengthAwarePaginator
    {
        return $this->examRepository->paginate($filters);
    }

    public function publishExam(int $examId): Exam
    {
        $exam = $this->getExam($examId);

        // Validate exam is ready for publishing
        $this->validateExamForPublishing($exam);

        DB::transaction(function () use ($exam) {
            $this->examRepository->update($exam, ['is_published' => true]);
        });

        return $this->getExam($examId);
    }

    public function unpublishExam(int $examId): Exam
    {
        $exam = $this->getExam($examId);

        // Check if exam has started
        if ($exam->start_time <= Carbon::now()) {
            throw new InvalidArgumentException('لا يمكن إلغاء نشر الامتحان بعد بدءه');
        }

        DB::transaction(function () use ($exam) {
            $this->examRepository->update($exam, ['is_published' => false]);
        });

        return $this->getExam($examId);
    }

    public function activateExam(int $examId): Exam
    {
        $exam = $this->getExam($examId);

        DB::transaction(function () use ($exam) {
            $this->examRepository->toggleActiveStatus($exam);
        });

        return $this->getExam($examId);
    }

    public function deactivateExam(int $examId): Exam
    {
        return $this->activateExam($examId); // Same method toggles status
    }

    public function duplicateExam(int $examId, array $modifications = []): Exam
    {
        $originalExam = $this->getExamWithDetails($examId);

        return DB::transaction(function () use ($originalExam, $modifications) {
            $examData = [
                'subject_id' => $originalExam->subject_id,
                'created_by' => Auth::id(),
                'title' => $modifications['title'] ?? $originalExam->title . ' (نسخة)',
                'description' => $modifications['description'] ?? $originalExam->description,
                'exam_type' => $modifications['exam_type'] ?? $originalExam->exam_type,
                'academic_year' => $modifications['academic_year'] ?? $originalExam->academic_year,
                'start_time' => $modifications['start_time'] ?? null,
                'end_time' => $modifications['end_time'] ?? null,
                'duration_minutes' => $originalExam->duration_minutes,
                'total_score' => $originalExam->total_score,
                'allow_late_entry' => $originalExam->allow_late_entry,
                'late_entry_limit_minutes' => $originalExam->late_entry_limit_minutes,
                'minimum_battery_percentage' => $originalExam->minimum_battery_percentage,
                'require_video_recording' => $originalExam->require_video_recording,
                'is_published' => false,
                'is_active' => true
            ];

            $newExam = $this->examRepository->create($examData);

            // Copy questions
            foreach ($originalExam->questions as $question) {
                $newExam->questions()->create([
                    'question_text' => $question->question_text,
                    'question_image' => $question->question_image,
                    'question_type' => $question->question_type,
                    'options' => $question->options,
                    'correct_answer' => $question->correct_answer,
                    'points' => $question->points,
                    'order_number' => $question->order_number,
                    'is_required' => $question->is_required,
                    'help_text' => $question->help_text
                ]);
            }

            return $newExam;
        });
    }

    public function getExamStatistics(int $examId): array
    {
        $exam = $this->getExamWithDetails($examId);

        $stats = [
            'total_sessions' => $exam->sessions->count(),
            'completed_sessions' => $exam->sessions->where('session_status', 'submitted')->count(),
            'in_progress_sessions' => $exam->sessions->where('session_status', 'in_progress')->count(),
            'cancelled_sessions' => $exam->sessions->where('session_status', 'cancelled')->count(),
            'average_score' => 0,
            'highest_score' => 0,
            'lowest_score' => 0,
            'total_questions' => $exam->questions->count(),
            'essay_questions' => $exam->questions->where('question_type', 'essay')->count(),
            'multiple_choice_questions' => $exam->questions->where('question_type', 'multiple_choice')->count()
        ];

        if ($exam->results->count() > 0) {
            $scores = $exam->results->pluck('total_score');
            $stats['average_score'] = round($scores->avg(), 2);
            $stats['highest_score'] = $scores->max();
            $stats['lowest_score'] = $scores->min();
        }

        return $stats;
    }

    public function getUpcomingExams(): Collection
    {
        return $this->examRepository->getUpcomingExams();
    }

    public function getOngoingExams(): Collection
    {
        return $this->examRepository->getOngoingExams();
    }

    public function getCompletedExams(): Collection
    {
        return $this->examRepository->getCompletedExams();
    }

    public function canStudentAccessExam(int $examId, int $studentId): bool
    {
        $exam = $this->getExam($examId);

        // Check if exam is published and active
        if (!$exam->is_published || !$exam->is_active) {
            return false;
        }

        // Check if exam time is valid
        $now = Carbon::now();
        $examStart = Carbon::parse($exam->start_time);
        $examEnd = Carbon::parse($exam->end_time);

        if ($now < $examStart) {
            return false;
        }

        if ($now > $examEnd) {
            return false;
        }

        // Check if student already has a session
        $existingSession = $exam->sessions()
            ->where('student_id', $studentId)
            ->whereIn('session_status', ['submitted', 'in_progress'])
            ->exists();

        return !$existingSession;
    }

    private function validateExamTimes(string $startTime, string $endTime, int $durationMinutes): void
    {
        $start = Carbon::parse($startTime);
        $end = Carbon::parse($endTime);

        if ($start >= $end) {
            throw new InvalidArgumentException('وقت بداية الامتحان يجب أن يكون قبل وقت النهاية');
        }

        $diffInMinutes = $start->diffInMinutes($end);
        if ($diffInMinutes < $durationMinutes) {
            throw new InvalidArgumentException('مدة الامتحان تتجاوز الوقت المحدد');
        }

        if ($start <= Carbon::now()) {
            throw new InvalidArgumentException('وقت بداية الامتحان يجب أن يكون في المستقبل');
        }
    }

    private function validateExamForPublishing(Exam $exam): void
    {
        if ($exam->questions()->count() === 0) {
            throw new InvalidArgumentException('لا يمكن نشر الامتحان بدون أسئلة');
        }

        if ($exam->total_score != $exam->questions()->sum('points')) {
            throw new InvalidArgumentException('مجموع درجات الأسئلة لا يساوي الدرجة الكلية للامتحان');
        }

        if (Carbon::parse($exam->start_time) <= Carbon::now()) {
            throw new InvalidArgumentException('لا يمكن نشر امتحان بوقت بداية في الماضي');
        }
    }

    /**
     * Get exams available for a user
     */
    public function getAvailableExams(User $user): Collection
    {
        return match ($user->user_type) {
            'student'        => $this->examRepository->getStudentExams($user->student->id),
            'teacher'        => $this->examRepository->getTeacherExams($user->teacher->id),
            'ministry_admin' => $this->examRepository->getAllExams(),
            default          => collect(),
        };
    }

    /**
     * Start exam session for a student
     */
    public function startExam(Exam $exam, Student $student): ExamSession
    {
        if (!$exam->canBeStartedBy($student)) {
            throw new \DomainException("This exam is not available for the student.");
        }

        return $this->examRepository->createSession($exam, $student);
    }
}
