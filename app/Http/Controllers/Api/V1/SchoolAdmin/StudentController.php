<?php

namespace App\Http\Controllers\Api\V1\SchoolAdmin;

use App\Core\DTOs\UserDTO;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modules\UserManagement\Models\Student;
use App\Core\Services\{StudentService, AuthService, UserService};
use App\Http\Requests\{StoreStudentRequest, UpdateStudentRequest};
use App\Http\Resources\{UserResource, StudentResource};

use Illuminate\Http\JsonResponse;
use Illuminate\Validation\UnauthorizedException;
use Illuminate\Support\Facades\{Auth, DB, Hash, Log};

class StudentController extends Controller
{
    public function __construct(
        protected UserService $userService,
        protected StudentService $studentService,
        protected AuthService $authService,
    ) {
        // 
    }

    /**
     * List students with filters and pagination.
     * - School Admin: only students in their school
     * - Ministry Admin: all students
     */
    public function index(Request $request): JsonResponse
    {
        $user = Auth::user();

        if (!in_array($user->user_type, ['school_admin', 'ministry_admin'])) {
            return $this->errorResponse('Unauthorized', 403);
        }

        $filters = $request->only(['academic_year', 'section', 'search']);

        if ($user->user_type === 'school_admin') {
            $schoolAdmin = $user->schoolAdmin()->active()->first();

            if (! $schoolAdmin) {
                return $this->errorResponse('School admin data not found or inactive', 400);
            }

            $filters['school_id'] = $schoolAdmin->school_id;
        }

        $perPage = (int) $request->get('per_page', 15);
        $paginate = $this->studentService->list($filters, $perPage);

        return $this->successResponsePaginate(
            StudentResource::collection($paginate),
            $paginate,
            'Students retrieved successfully'
        );
    }

    /**
     * Create student account (School Admin only)
     * @param Request $request
     */
    public function store(StoreStudentRequest $request): JsonResponse
    {
        $user = Auth::user();

        if ($user->user_type !== 'school_admin') {
            throw new UnauthorizedException('غير مصرح لك بإنشاء حسابات الطلاب');
        }

        // Get school admin record to find associated school
        $schoolAdmin = $user->schoolAdmin()->active()->first();
        if (! $schoolAdmin) {
            return response()->json([
                'status' => false,
                'message' => 'لم يتم العثور على بيانات مدير المدرسة أو الحساب غير نشط',
                'errors'  => ['school_admin' => ['بيانات مدير المدرسة غير موجودة']]
            ], 400);
        }

        // Check if school admin has permission to create students
        if (! $schoolAdmin->hasPermission('manage_students')) {
            return response()->json([
                'status' => false,
                'message' => 'ليس لديك صلاحية لإنشاء حسابات الطلاب',
                'errors'  => ['permission' => ['صلاحية غير كافية']]
            ], 403);
        }

        DB::beginTransaction();

        try {
            $userData = UserDTO::fromArray([
                'name'        => $request->name,
                'email'       => $request->email,
                'phone'       => $request->phone,
                'national_id' => $request->national_id,
                'user_type'   => 'student',
                'password'    => Hash::make($request->password),
                'is_active'   => true
            ]);

            // Create user
            $newUser = $this->userService->createUser($userData);

            // Create student profile
            $student = $this->userService->createStudentProfile($newUser->id, [
                'school_id'      => $schoolAdmin->school_id,
                'student_code'   => $this->generateStudentCode($schoolAdmin->school_id),
                'seat_number'    => $request->seat_number,
                'academic_year'  => $request->academic_year,
                'section'        => $request->section,
                'birth_date'     => $request->birth_date,
                'gender'         => $request->gender,
                'guardian_phone' => $request->guardian_phone,
                'is_banned'      => false
            ]);

            // Log activity
            $this->authService->logActivity(Auth::id(), 'create_student', [
                'student_id'   => $student->id,
                'student_code' => $student->student_code,
                'school_id'    => $schoolAdmin->school_id,
                'school_name'  => $schoolAdmin->school->name
            ]);

            DB::commit();

            return response()->json([
                'status' => true,
                'message' => 'تم إنشاء حساب الطالب بنجاح',
                'data' => [
                    'user' => new UserResource($newUser->load('student.school')),
                    'student_code' => $student->student_code,
                    'school' => [
                        'id'   => $schoolAdmin->school->id,
                        'name' => $schoolAdmin->school->name,
                        'code' => $schoolAdmin->school->code
                    ]
                ]
            ], 201);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Create student error: ' . $e->getMessage(), [
                'request_data'    => $request->all(),
                'created_by'      => Auth::id(),
                'school_admin_id' => $schoolAdmin->id ?? null,
                'school_id'       => $schoolAdmin->school_id ?? null
            ]);

            return response()->json([
                'status' => false,
                'message' => 'حدث خطأ أثناء إنشاء حساب الطالب',
                'errors' => ['server' => ['خطأ في الخادم']]
            ], 500);
        }
    }

    /**
     * Update student (School Admin only)
     * @param Request $request
     */
    public function update(UpdateStudentRequest $request, int $id): JsonResponse
    {
        $user = Auth::user();

        if ($user->user_type !== 'school_admin') {
            return $this->errorResponse('Unauthorized', 403);
        }

        $schoolAdmin = $user->schoolAdmin()->active()->first();
        if (!$schoolAdmin) {
            return $this->errorResponse('School admin data not found or inactive', 400);
        }

        $student = Student::with('user')->find($id);
        if (!$student || $student->school_id !== $schoolAdmin->school_id) {
            return $this->errorResponse('Student not found', 404);
        }

        DB::beginTransaction();
        try {
            // Update user fields if present
            $userPayload = $request->only(['name', 'email', 'phone', 'national_id']);
            if ($request->filled('password')) {
                $userPayload['password'] = Hash::make($request->password);
            }

            if (!empty($userPayload)) {
                $student->user->fill($userPayload)->save();
            }

            // Update student profile fields
            $studentPayload = $request->only([
                'seat_number',
                'academic_year',
                'section',
                'birth_date',
                'gender',
                'guardian_phone',
            ]);

            // Handle banning/unbanning
            if ($request->has('is_banned')) {
                $studentPayload['is_banned']  = $request->boolean('is_banned');
                $studentPayload['ban_reason'] = $request->ban_reason;
                $studentPayload['ban_until']  = $request->ban_until;
            }

            if (!empty($studentPayload)) {
                $this->studentService->update($student->id, $studentPayload);
            }

            // Log activity
            $this->authService->logActivity(Auth::id(), 'update_student', [
                'student_id' => $student->id,
                'school_id'  => $schoolAdmin->school_id,
            ]);

            DB::commit();

            return $this->successResponse(
                new UserResource($student->user->fresh('student.school')),
                'Student updated successfully'
            );
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Update student error: ' . $e->getMessage(), [
                'student_id' => $student->id ?? null,
                'updated_by' => Auth::id(),
            ]);

            return $this->errorResponse('Failed to update student', 500);
        }
    }

    /**
     * Show a student's details.
     */
    public function show(int $id): JsonResponse
    {
        $user = Auth::user();
        if ($user->user_type !== 'school_admin') {
            return $this->errorResponse('Unauthorized', 403);
        }

        $schoolAdmin = $user->schoolAdmin()->active()->first();
        if (! $schoolAdmin) {
            return $this->errorResponse('School admin data not found or inactive', 400);
        }

        $student = Student::with(['user', 'school'])->find($id);
        if (! $student || $student->school_id !== $schoolAdmin->school_id) {
            return $this->errorResponse('Student not found', 404);
        }

        return $this->successResponse(new StudentResource($student), 'Student retrieved successfully');
    }

    /**
     * Remove a student (soft-delete) and associated user.
     */
    public function destroy(int $id): JsonResponse
    {
        $user = Auth::user();
        if ($user->user_type !== 'school_admin') {
            return $this->errorResponse('Unauthorized', 403);
        }

        $schoolAdmin = $user->schoolAdmin()->active()->first();
        if (!$schoolAdmin) {
            return $this->errorResponse('School admin data not found or inactive', 400);
        }

        $student = Student::find($id);
        if (!$student || $student->school_id !== $schoolAdmin->school_id) {
            return $this->errorResponse('Student not found', 404);
        }

        DB::beginTransaction();

        try {
            $this->studentService->delete($student->id);

            DB::commit();

            return $this->successResponse([], 'Student deleted successfully', 200);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Delete student error: ' . $e->getMessage(), [
                'student_id' => $student->id ?? null,
                'deleted_by' => Auth::id(),
            ]);

            return $this->errorResponse('Failed to delete student', 500);
        }
    }

    /**
     * Generate unique student code for school
     */
    private function generateStudentCode(int $schoolId): string
    {
        $school = $this->userService->findSchoolById($schoolId);
        $schoolCode = $school->code ?? str_pad($schoolId, 3, '0', STR_PAD_LEFT);

        do {
            $code = 'S' . $schoolCode . date('y') . str_pad(rand(1, 999), 3, '0', STR_PAD_LEFT);
        } while ($this->userService->studentCodeExists($code));

        return $code;
    }
}
