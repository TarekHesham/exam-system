<?php

namespace App\Http\Controllers\Api\V1;

use App\Core\Services\{AuthService, UserService};
use App\Http\Controllers\Controller;
use App\Http\Requests\{
    LoginRequest,
    CreateTeacherRequest,
    CreateStudentRequest,
    CreateSchoolAdminRequest
};
use App\Http\Resources\UserResource;
use App\Core\DTOs\UserDTO;
use Illuminate\Http\{Request, JsonResponse};
use Illuminate\Support\Facades\{Auth, DB, Hash, Log};
use Illuminate\Validation\UnauthorizedException;

class AuthController extends Controller
{
    public function __construct(
        protected AuthService $authService,
        protected UserService $userService
    ) {
        //
    }

    /**
     * Authenticate user and return access token
     * @param Request $request
     */
    public function login(LoginRequest $request): JsonResponse
    {
        try {
            $credentials = $request->only('phone', 'email', 'national_id', 'password');

            // Check if user exists and is active
            $identifier = $credentials['phone'] ?? $credentials['email'] ?? $credentials['national_id'];
            $user = $this->authService->findUserByIdentifier($identifier);

            if (!$user || !$user->is_active) {
                return $this->errorResponse('حساب غير نشط أو غير موجود', 401);
            }

            // Verify password
            if (!Hash::check($credentials['password'], $user->password)) {
                return $this->errorResponse('بيانات الدخول غير صحيحة', 401);
            }

            // Generate access token
            $tokenResult = $this->authService->createToken($user, [$user->user_type]);

            // Log successful login
            $this->authService->logActivity($user->id, 'login', [
                'ip_address' => $request->ip(),
                'user_agent' => $request->userAgent()
            ]);

            return $this->successResponse([
                'user'         => new UserResource($user),
                'access_token' => $tokenResult['token'],
                'token_type'   => 'Bearer',
                'expires_at'   => $tokenResult['expires_at']
            ], 'تم تسجيل الدخول بنجاح');
        } catch (\Exception $e) {
            Log::error('Login error: ' . $e->getMessage(), [
                'email' => $request->email,
                'ip'    => $request->ip()
            ]);

            return $this->errorResponse('حدث خطأ أثناء تسجيل الدخول', 500);
        }
    }

    /**
     * Create teacher account (Ministry Admin only)
     * @param Request $request
     */
    public function createTeacher(CreateTeacherRequest $request): JsonResponse
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
                'subject_specialization' => $request->subject_specialization,
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
     * Create student account (School Admin only)
     * @param Request $request
     */
    public function createStudent(CreateStudentRequest $request): JsonResponse
    {
        $user = Auth::user();

        if ($user->user_type !== 'school_admin') {
            throw new UnauthorizedException('غير مصرح لك بإنشاء حسابات الطلاب');
        }

        // Get school admin record to find associated school
        $schoolAdmin = $user->schoolAdmin()->active()->first();
        if (!$schoolAdmin) {
            return response()->json([
                'success' => false,
                'message' => 'لم يتم العثور على بيانات مدير المدرسة أو الحساب غير نشط',
                'errors' => ['school_admin' => ['بيانات مدير المدرسة غير موجودة']]
            ], 400);
        }

        // Check if school admin has permission to create students
        if (!$schoolAdmin->hasPermission('manage_students')) {
            return response()->json([
                'success' => false,
                'message' => 'ليس لديك صلاحية لإنشاء حسابات الطلاب',
                'errors' => ['permission' => ['صلاحية غير كافية']]
            ], 403);
        }

        DB::beginTransaction();

        try {
            $userData = UserDTO::fromArray([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'national_id' => $request->national_id,
                'user_type' => 'student',
                'password' => Hash::make($request->password),
                'is_active' => true
            ]);

            // Create user
            $newUser = $this->userService->createUser($userData);

            // Create student profile
            $student = $this->userService->createStudentProfile($newUser->id, [
                'school_id' => $schoolAdmin->school_id,
                'student_code' => $this->generateStudentCode($schoolAdmin->school_id),
                'seat_number' => $request->seat_number,
                'academic_year' => $request->academic_year,
                'section' => $request->section,
                'birth_date' => $request->birth_date,
                'gender' => $request->gender,
                'guardian_phone' => $request->guardian_phone,
                'is_banned' => false
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
                'success' => true,
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
                'request_data' => $request->all(),
                'created_by' => Auth::id(),
                'school_admin_id' => $schoolAdmin->id ?? null,
                'school_id' => $schoolAdmin->school_id ?? null
            ]);

            return response()->json([
                'success' => false,
                'message' => 'حدث خطأ أثناء إنشاء حساب الطالب',
                'errors' => ['server' => ['خطأ في الخادم']]
            ], 500);
        }
    }

    /**
     * Create school admin account (Ministry Admin only)
     * @param Request $request
     */
    public function createSchoolAdmin(CreateSchoolAdminRequest $request): JsonResponse
    {
        if (Auth::user()->user_type !== 'ministry_admin') {
            throw new UnauthorizedException('غير مصرح لك بإنشاء حسابات مدراء المدارس');
        }

        DB::beginTransaction();

        try {
            $userData = UserDTO::fromArray([
                'name'        => $request->name,
                'email'       => $request->email,
                'phone'       => $request->phone,
                'national_id' => $request->national_id,
                'user_type'   => 'school_admin',
                'password'    => Hash::make($request->password),
                'is_active'   => $request->get('is_active', true)
            ]);

            // Create user
            $user = $this->userService->createUser($userData);

            // Create school admin profile
            $schoolAdmin = $this->userService->createSchoolAdminProfile($user->id, [
                'school_id' => $request->school_id,
                'admin_permissions' => $request->get('admin_permissions', [
                    'manage_students'         => true,
                    'view_reports'            => true,
                    'manage_school_settings'  => false,
                    'manage_exams'            => false,
                ])
            ]);

            // Log activity
            $this->authService->logActivity(Auth::id(), 'create_school_admin', [
                'school_admin_id' => $schoolAdmin->id,
                'school_id'       => $request->school_id
            ]);

            DB::commit();

            return $this->successResponse(new UserResource($user->load('schoolAdmin.school')), 'تم إنشاء حساب مدير المدرسة بنجاح', 201);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Create school admin error: ' . $e->getMessage(), [
                'request_data' => $request->all(),
                'created_by'   => Auth::id()
            ]);

            return $this->errorResponse('حدث خطأ أثناء إنشاء حساب مدير المدرسة', 500);
        }
    }

    /**
     * Get current authenticated user
     */
    public function me(Request $request): JsonResponse
    {
        try {
            $user = Auth::user();

            // Load appropriate relationships based on user type
            switch ($user->user_type) {
                case 'student':
                    $user->load(['student.school.governorate']);
                    break;
                case 'teacher':
                    $user->load(['teacher.schoolAssignments.school']);
                    break;
                case 'school_admin':
                    $user->load(['schoolAdmin.school.governorate']);
                    break;
            }

            return response()->json([
                'success' => true,
                'data' => new UserResource($user)
            ]);
        } catch (\Exception $e) {
            Log::error('Get user profile error: ' . $e->getMessage(), [
                'user_id' => Auth::id()
            ]);

            return response()->json([
                'success' => false,
                'message' => 'حدث خطأ أثناء جلب بيانات المستخدم',
                'errors' => ['server' => ['خطأ في الخادم']]
            ], 500);
        }
    }

    /**
     * Logout user and revoke token
     * @param Request $request
     */
    public function logout(Request $request): JsonResponse
    {
        try {
            $user = Auth::user();

            // Revoke current tokens
            $user->token()->delete();

            // Log activity
            $this->authService->logActivity($user->id, 'logout', [
                'ip_address' => $request->ip()
            ]);

            return response()->json([
                'success' => true,
                'message' => 'تم تسجيل الخروج بنجاح'
            ]);
        } catch (\Exception $e) {
            Log::error('Logout error: ' . $e->getMessage(), [
                'user_id' => Auth::id()
            ]);

            return response()->json([
                'success' => false,
                'message' => 'حدث خطأ أثناء تسجيل الخروج'
            ], 500);
        }
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
