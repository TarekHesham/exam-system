<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Core\DTOs\UserDTO;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Core\Services\{UserService, AuthService};
use App\Http\Requests\{StoreTeacherRequest, UpdateTeacherRequest};
use App\Modules\UserManagement\Models\Teacher;
use Illuminate\Support\Facades\{Auth, DB, Hash};
use Illuminate\Http\JsonResponse;

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
        $teachers = Teacher::with(['user.teacher.schoolAssignments.school'])->paginate(10);

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
        $teacher = Teacher::with(['user.teacher.schoolAssignments.school'])->find($id);

        if (! $teacher) {
            return $this->errorResponse('Teacher not found');
        }

        return $this->successResponse(new UserResource($teacher->user), 'Teacher details');
    }

    /**
     * Create teacher account (Ministry Admin only)
     * @param Request $request
     */
    public function store(StoreTeacherRequest $request): JsonResponse
    {
        return DB::transaction(function () use ($request) {
            $userData = UserDTO::fromArray([
                'name'        => $request->name,
                'email'       => $request->email,
                'phone'       => $request->phone,
                'national_id' => $request->national_id,
                'user_type'   => 'teacher',
                'password'    => Hash::make($request->password),
                'is_active'   => $request->get('is_active', true),
            ]);

            // Create user
            $user = $this->userService->createUser($userData);

            // Create teacher profile
            $teacher = $this->userService->createTeacherProfile($user->id, [
                'teacher_code'           => $this->generateTeacherCode(),
                'subject_id'             => $request->subject_id,
                'teacher_type'           => $request->get('teacher_type', 'regular'),
                'can_create_exams'       => $request->get('can_create_exams', false),
                'can_correct_essays'     => $request->get('can_correct_essays', false),
            ]);

            // Assign to schools if provided
            if ($request->has('school_ids')) {
                $this->userService->assignTeacherToSchools(
                    $teacher->id,
                    $request->school_ids,
                    $request->get('assignment_type', 'teaching')
                );
            }

            // Log activity
            $this->authService->logActivity(Auth::id(), 'create_teacher', [
                'teacher_id'   => $teacher->id,
                'teacher_code' => $teacher->teacher_code,
            ]);

            return $this->successResponse([
                'user' => new UserResource($user->load('teacher')),
                'teacher_code' => $teacher->teacher_code,
            ], 'تم إنشاء حساب المعلم بنجاح', 201);
        });
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

    /**
     * Generate unique teacher code
     */
    private function generateTeacherCode(): string
    {
        do {
            $code = 'T' . date('Y') . str_pad(rand(1, 9999), 4, '0', STR_PAD_LEFT);
        } while ($this->userService->teacherCodeExists($code));

        return $code;
    }
}
