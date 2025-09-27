<?php

namespace App\Http\Controllers\Api\V1\Shared;

use App\Core\Services\{AuthService, UserService};
use App\Http\Controllers\Controller;
use App\Http\Requests\{
    LoginRequest,
    StoreTeacherRequest,
    StoreStudentRequest,
    StoreSchoolAdminRequest
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
                return $this->errorResponse('حساب غير نشط أو غير موجود', 403);
            }

            // Verify password
            if (!Hash::check($credentials['password'], $user->password)) {
                return $this->errorResponse('بيانات الدخول غير صحيحة', 403);
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
     * Create school admin account (Ministry Admin only)
     * @param Request $request
     */
    public function createSchoolAdmin(StoreSchoolAdminRequest $request): JsonResponse
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
    public function me(): JsonResponse
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

            return $this->successResponse(UserResource::make($user));
        } catch (\Exception $e) {
            Log::error('Get user profile error: ' . $e->getMessage(), [
                'user_id' => Auth::id()
            ]);

            return response()->json([
                'status'  => false,
                'message' => 'حدث خطأ أثناء جلب بيانات المستخدم',
                'errors'  => ['server' => ['خطأ في الخادم']]
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
            $user->tokens()->delete();

            // Log activity
            $this->authService->logActivity($user->id, 'logout', [
                'ip_address' => $request->ip()
            ]);

            return response()->json([
                'status' => true,
                'message' => 'تم تسجيل الخروج بنجاح'
            ]);
        } catch (\Exception $e) {
            Log::error('Logout error: ' . $e->getMessage(), [
                'user_id' => Auth::id()
            ]);

            return response()->json([
                'status' => false,
                'message' => 'حدث خطأ أثناء تسجيل الخروج'
            ], 500);
        }
    }
}
