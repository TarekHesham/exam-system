<?php

namespace App\Core\Repositories;

use App\Modules\Authentication\Models\User;
use App\Modules\ExamManagement\Models\Exam;
use App\Modules\ExamManagement\Models\ExamSession;
use App\Modules\UserManagement\Models\Student;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Str;

class ExamRepository
{
    public function getAllExams(): Collection
    {
        return Exam::with(['subject', 'questions'])->get();
    }

    public function getStudentExams(int $studentId): Collection
    {
        return Exam::query()
            ->where('is_active', true)
            ->where('start_time', '>', now())
            ->whereHas('eligibleStudents', fn($q) => $q->where('student_id', $studentId))
            ->with(['subject', 'questions'])
            ->get();
    }

    public function getTeacherExams(int $teacherId): Collection
    {
        return Exam::query()
            ->where('created_by', $teacherId)
            ->with(['subject', 'questions'])
            ->get();
    }

    public function createSession(Exam $exam, Student $student): ExamSession
    {
        return ExamSession::create([
            'exam_id'        => $exam->id,
            'student_id'     => $student->id,
            'session_token'  => Str::uuid(),
            'session_status' => 'in_progress',
            'started_at'     => now(),
            'ip_address'     => request()->ip()
        ]);
    }

    public function getExamsForDashboard(User $user): Collection
    {
        $baseQuery = Exam::query()
            ->select(['id', 'title', 'start_time', 'end_time', 'subject_id'])
            ->with(['subject:id,name']);

        return match ($user->user_type) {
            'student' => $baseQuery
                ->whereHas('eligibleStudents', fn($q) => $q->where('student_id', $user->student->id))
                ->with(['sessions' => fn($q) => $q->where('student_id', $user->student->id)])
                ->get(),

            'teacher' => $baseQuery
                ->where('created_by', $user->teacher->id)
                ->withCount(['sessions', 'completedSessions'])
                ->get(),

            'ministry_admin' => $baseQuery
                ->withCount(['sessions', 'appeals', 'cheatingReports'])
                ->get(),
        };
    }
}
