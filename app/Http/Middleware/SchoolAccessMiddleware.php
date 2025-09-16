<?php

namespace App\Http\Middleware;

use App\Core\Services\AuthService;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SchoolAccessMiddleware
{

    public function __construct(
        protected AuthService $authService
    ) {
        //
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        $user = $request->user();
        $schoolId = $request->route('school') ?? $request->input('school_id');

        if (!$schoolId || !$this->authService->canAccessSchool($user, $schoolId)) {
            return response()->json([
                'success' => false,
                'message' => 'غير مصرح لك بالوصول إلى بيانات هذه المدرسة',
                'errors' => ['authorization' => ['وصول غير مسموح للمدرسة']]
            ], 403);
        }

        return $next($request);
    }
}
