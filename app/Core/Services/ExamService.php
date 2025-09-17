<?php

namespace App\Core\Services;

use App\Core\Repositories\ExamRepository;
use App\Modules\Authentication\Models\User;
use App\Modules\ExamManagement\Models\Exam;
use App\Modules\ExamManagement\Models\ExamSession;
use App\Modules\UserManagement\Models\Student;
use Illuminate\Database\Eloquent\Collection;

class ExamService
{
    public function __construct(
        private ExamRepository $examRepository
    ) {}

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
