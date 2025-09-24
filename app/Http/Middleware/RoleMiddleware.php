<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        $user = $request->user();

        if (! $user) {
            return response()->json(['message' => 'غير مصرح لك بالوصول إلى هذه الصفحة'], 401);
        }

        if (! in_array($user->user_type, explode('|', $roles[0]))) {
            return response()->json([
                'status' => false,
                'message' => 'غير مصرح لك بالوصول إلى هذه الصفحة',
                'errors' => [
                    'authorization' => ['صلاحيات غير كافية']
                ]
            ], 403);
        }

        return $next($request);
    }
}
