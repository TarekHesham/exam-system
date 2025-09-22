<?php

namespace App\Core\Contracts\Repositories;

use App\Core\DTOs\ExamFilterDTO;
use App\Modules\ExamManagement\Models\Exam;
use App\Modules\ExamManagement\Models\ExamSession;
use App\Modules\UserManagement\Models\Student;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;

interface ExamRepositoryInterface
{
    public function create(array $data): Exam;
    public function update(Exam $exam, array $data): bool;
    public function delete(Exam $exam): bool;
    public function findById(int $id): ?Exam;
    public function findByIdWithRelations(int $id, array $relations = []): ?Exam;
    public function paginate(ExamFilterDTO $filters): LengthAwarePaginator;
    public function getActiveExams(): Collection;
    public function getPublishedExams(): Collection;
    public function getExamsBySubject(int $subjectId): Collection;
    public function getExamsByCreator(int $creatorId): Collection;
    public function getUpcomingExams(): Collection;
    public function getOngoingExams(): Collection;
    public function getCompletedExams(): Collection;
    public function togglePublishStatus(Exam $exam): bool;
    public function toggleActiveStatus(Exam $exam): bool;
    public function getStudentExams(int $studentId): Collection;
    public function getTeacherExams(int $teacherId): Collection;
    public function createSession(Exam $exam, Student $student): ExamSession;
    public function getAllExams(): Collection;
}
