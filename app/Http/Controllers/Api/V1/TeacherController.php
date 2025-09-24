<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateTeacherRequest;
use App\Http\Resources\UserResource;
use App\Core\Services\{UserService, AuthService};
use App\Modules\UserManagement\Models\Teacher;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\{Auth, DB};

class TeacherController extends Controller
{
    public function __construct(
        private UserService $userService,
        private AuthService $authService
    ) {
        //
    }

    /**
     * List all teachers
     */
    public function index(): JsonResponse
    {
        $teachers = Teacher::with(['user.teacher.schoolAssignments.school'])
            ->paginate(15);

        return $this->successResponsePaginate(
            UserResource::collection($teachers->pluck('user')),
            $teachers
        );
    }

    /**
     * Show teacher details
     */
    public function show(int $id): JsonResponse
    {
        $teacher = Teacher::with(['user.teacher.schoolAssignments.school'])->findOrFail($id);

        return $this->successResponse(new UserResource($teacher->user), 'Teacher details');
    }

    /**
     * Update teacher information
     * @param Request $request
     */
    public function update(UpdateTeacherRequest $request, int $id): JsonResponse
    {
        $teacher = Teacher::with('user')->findOrFail($id);

        DB::transaction(function () use ($request, $teacher) {
            // Update user info
            $teacher->user->update($request->only([
                'name',
                'email',
                'phone',
                'password',
                'national_id',
                'is_active'
            ]));

            // Update teacher profile
            $teacher->update($request->only([
                'subject_id',
                'teacher_type',
                'can_create_exams',
                'can_correct_essays'
            ]));

            // Sync assigned schools
            if ($request->has('school_ids')) {
                $this->userService->assignTeacherToSchools(
                    $teacher->id,
                    $request->school_ids,
                    $request->get('assignment_type', 'teaching')
                );
            }

            // Log activity
            $this->authService->logActivity(Auth::id(), 'update_teacher', [
                'teacher_id' => $teacher->id
            ]);
        });

        return $this->successResponse(
            new UserResource($teacher->user->load('teacher.schoolAssignments.school')),
            'Teacher updated successfully'
        );
    }

    /**
     * Toggle teacher active status
     */
    public function toggleStatus(int $id): JsonResponse
    {
        $teacher = Teacher::with('user')->findOrFail($id);

        $teacher->user->is_active = !$teacher->user->is_active;
        $teacher->user->save();

        $this->authService->logActivity(Auth::id(), 'toggle_teacher_status', [
            'teacher_id' => $teacher->id,
            'new_status' => $teacher->user->is_active
        ]);

        return $this->successResponse(
            new UserResource($teacher->user->load('teacher')),
            'Teacher status updated successfully'
        );
    }

    /**
     * Delete teacher
     */
    public function destroy(int $id): JsonResponse
    {
        $teacher = Teacher::with('user')->findOrFail($id);

        DB::transaction(function () use ($teacher) {
            $teacher->schoolAssignments()->delete();
            $teacher->user()->delete();
            $teacher->delete();

            $this->authService->logActivity(Auth::id(), 'delete_teacher', [
                'teacher_id' => $teacher->id
            ]);
        });

        return $this->successResponse([], 'Teacher deleted successfully');
    }
}
