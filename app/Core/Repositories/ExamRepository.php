<?php

namespace App\Core\Repositories;

use App\Core\Contracts\Repositories\ExamRepositoryInterface;
use App\Modules\ExamManagement\Models\{Exam, ExamSession};
use App\Modules\UserManagement\Models\Student;
use App\Modules\Authentication\Models\User;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\{Builder, Collection};
use App\Core\DTOs\ExamFilterDTO;
use Illuminate\Support\Str;
use Carbon\Carbon;

class ExamRepository implements ExamRepositoryInterface
{
    public function create(array $data): Exam
    {
        return Exam::create($data);
    }

    public function update(Exam $exam, array $data): bool
    {
        return $exam->update($data);
    }

    public function delete(Exam $exam): bool
    {
        return $exam->delete();
    }

    public function findById(int $id): ?Exam
    {
        return Exam::find($id);
    }

    public function findByIdWithRelations(int $id, array $relations = []): ?Exam
    {
        $defaultRelations = ['subject', 'creator', 'questions', 'sessions'];
        $relations = empty($relations) ? $defaultRelations : $relations;

        return Exam::with($relations)->find($id);
    }

    public function paginate(ExamFilterDTO $filters): LengthAwarePaginator
    {
        return $this->buildQuery($filters)
            ->with(['subject:id,name', 'creator'])
            ->paginate($filters->perPage, ['*'], 'page', $filters->page);
    }

    public function getActiveExams(): Collection
    {
        return Exam::where('is_active', true)
            ->with(['subject', 'creator'])
            ->orderBy('start_time', 'asc')
            ->get();
    }

    public function getPublishedExams(): Collection
    {
        return Exam::where('is_published', true)
            ->where('is_active', true)
            ->with(['subject', 'creator'])
            ->orderBy('start_time', 'asc')
            ->get();
    }

    public function getExamsBySubject(int $subjectId): Collection
    {
        return Exam::where('subject_id', $subjectId)
            ->where('is_active', true)
            ->with(['creator'])
            ->orderBy('start_time', 'desc')
            ->get();
    }

    public function getExamsByCreator(int $creatorId): Collection
    {
        return Exam::where('created_by', $creatorId)
            ->with(['subject'])
            ->orderBy('created_at', 'desc')
            ->get();
    }

    public function getUpcomingExams(): Collection
    {
        return Exam::where('start_time', '>', Carbon::now())
            ->where('is_published', true)
            ->where('is_active', true)
            ->with(['subject', 'creator'])
            ->orderBy('start_time', 'asc')
            ->get();
    }

    public function getOngoingExams(): Collection
    {
        $now = Carbon::now();
        return Exam::where('start_time', '<=', $now)
            ->where('end_time', '>=', $now)
            ->where('is_published', true)
            ->where('is_active', true)
            ->with(['subject', 'creator'])
            ->get();
    }

    public function getCompletedExams(): Collection
    {
        return Exam::where('end_time', '<', Carbon::now())
            ->where('is_published', true)
            ->with(['subject', 'creator'])
            ->orderBy('end_time', 'desc')
            ->get();
    }

    public function togglePublishStatus(Exam $exam): bool
    {
        return $exam->update(['is_published' => !$exam->is_published]);
    }

    public function toggleActiveStatus(Exam $exam): bool
    {
        return $exam->update(['is_active' => !$exam->is_active]);
    }

    private function buildQuery(ExamFilterDTO $filters): Builder
    {
        $query = Exam::query();

        if ($filters->subjectId) {
            $query->where('subject_id', $filters->subjectId);
        }

        if ($filters->createdBy) {
            $query->where('created_by', $filters->createdBy);
        }

        if ($filters->examType) {
            $query->where('exam_type', $filters->examType);
        }

        if ($filters->academicYear) {
            $query->where('academic_year', $filters->academicYear);
        }

        if ($filters->isPublished !== null) {
            $query->where('is_published', $filters->isPublished);
        }

        if ($filters->isActive !== null) {
            $query->where('is_active', $filters->isActive);
        }

        if ($filters->startDate) {
            $query->where('start_time', '>=', $filters->startDate);
        }

        if ($filters->endDate) {
            $query->where('end_time', '<=', $filters->endDate);
        }

        if ($filters->search) {
            $query->where(function ($q) use ($filters) {
                $q->where('title', 'LIKE', "%{$filters->search}%")
                    ->orWhere('description', 'LIKE', "%{$filters->search}%");
            });
        }

        return $query->orderBy('created_at', 'desc');
    }

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

            default => collect()
        };
    }
}
