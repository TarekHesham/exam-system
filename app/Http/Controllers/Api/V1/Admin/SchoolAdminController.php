<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Core\DTOs\{SchoolAdminDTO, UserDTO};
use App\Core\Services\{AuthService, UserService};
use App\Core\Contracts\Services\SchoolAdminServiceInterface;
use App\Http\Requests\{StoreSchoolAdminRequest, UpdateSchoolAdminRequest};
use Illuminate\Support\Facades\{Auth, DB, Hash, Log};
use App\Http\Resources\UserResource;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

class SchoolAdminController extends Controller
{
    public function __construct(
        private SchoolAdminServiceInterface $service,
        private UserService $userService,
        private AuthService $authService
    ) {
        // 
    }

    /**
     * List paginated school admins
     */
    public function index(): JsonResponse
    {
        $admins = $this->service->paginate(10);
        return $this->successResponsePaginate(
            $admins->items(),
            $admins,
            'School admins list'
        );
    }

    /**
     * Create school admin: create user first then create school admin profile
     * @param Request $request
     */
    public function store(StoreSchoolAdminRequest $request): JsonResponse
    {
        if (Auth::user()->user_type !== 'ministry_admin') {
            return $this->errorResponse('غير مصرح لك بإنشاء حسابات مدراء المدارس', 403);
        }

        DB::beginTransaction();

        try {
            // Create user DTO and user record
            $userDto = UserDTO::fromArray([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'national_id' => $request->national_id,
                'user_type' => 'school_admin',
                'password' => Hash::make($request->password),
                'is_active' => $request->get('is_active', true),
            ]);

            $user = $this->userService->createUser($userDto);

            // Create school admin profile DTO and record
            $schoolAdminDto = SchoolAdminDTO::fromArray([
                'user_id' => $user->id,
                'school_id' => $request->school_id,
                'admin_permissions' => $request->get('admin_permissions', [
                    'manage_students'         => true,
                    'view_reports'            => true,
                    'manage_school_settings'  => false,
                    'manage_exams'            => false,
                ]),
                'is_active' => $request->get('is_active', true),
            ]);

            $schoolAdmin = $this->service->create($schoolAdminDto);

            // Log activity
            $this->authService->logActivity(Auth::id(), 'create_school_admin', [
                'school_admin_id' => $schoolAdmin->id,
                'school_id'       => $request->school_id,
                'created_user_id' => $user->id,
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
     * Show school admin details
     */
    public function show(int $id): JsonResponse
    {
        $admin = $this->service->find($id);
        if (!$admin) {
            return $this->errorResponse('School admin not found', 404);
        }
        return $this->successResponse($admin->load(['user', 'school']), 'School admin details');
    }

    /**
     * Update school admin and optionally its user
     * @param Request $request
     */
    public function update(UpdateSchoolAdminRequest $request, int $id): JsonResponse
    {
        $admin = $this->service->find($id);
        if (!$admin) {
            return $this->errorResponse('School admin not found', 404);
        }

        DB::beginTransaction();

        try {
            // Update user fields if provided
            $userUpdates = [];

            if ($request->filled('name')) {
                $userUpdates['name'] = $request->name;
            }
            if ($request->filled('email')) {
                $userUpdates['email'] = $request->email;
            }
            if ($request->filled('phone')) {
                $userUpdates['phone'] = $request->phone;
            }
            if ($request->filled('national_id')) {
                $userUpdates['national_id'] = $request->national_id;
            }
            if ($request->filled('password')) {
                $userUpdates['password'] = Hash::make($request->password);
            }
            if ($request->has('is_active')) {
                $userUpdates['is_active'] = $request->is_active;
            }

            if (!empty($userUpdates) && $admin->user) {
                $admin->user->update($userUpdates);
            }

            // Update school admin profile
            $schoolAdminDto = SchoolAdminDTO::fromArray([
                'user_id' => $admin->user_id,
                'school_id' => $request->get('school_id', $admin->school_id),
                'admin_permissions' => $request->get('admin_permissions', $admin->admin_permissions ?? []),
                'is_active' => $request->get('is_active', $admin->is_active),
            ]);

            $updated = $this->service->update($id, $schoolAdminDto);

            if (!$updated) {
                DB::rollBack();
                return $this->errorResponse('Failed to update school admin', 500);
            }

            DB::commit();

            return $this->successResponse($this->service->find($id)->load(['user', 'school']), 'School admin updated successfully');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Update school admin error: ' . $e->getMessage(), [
                'id' => $id,
                'request' => $request->all(),
                'updated_by' => Auth::id()
            ]);

            return $this->errorResponse('حدث خطأ أثناء تحديث مدير المدرسة', 500);
        }
    }

    /**
     * Delete school admin and its user (soft delete user)
     */
    public function destroy(int $id): JsonResponse
    {
        $admin = $this->service->find($id);
        if (!$admin) {
            return $this->errorResponse('School admin not found', 404);
        }

        DB::beginTransaction();

        try {
            $this->service->delete($id);

            if ($admin->user) {
                $admin->user->delete();
            }

            DB::commit();

            return $this->successResponse([], 'School admin deleted successfully');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Delete school admin error: ' . $e->getMessage(), [
                'id' => $id,
                'deleted_by' => Auth::id()
            ]);

            return $this->errorResponse('Failed to delete school admin', 500);
        }
    }
}
