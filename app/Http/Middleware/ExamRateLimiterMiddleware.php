<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;

class ExamRateLimiterMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        $user = $request->user();
        $limits = match ($user->user_type) {
            'student' => ['exam_submission' => '5,1'], // 5 attempts per minute
            'teacher' => ['exam_creation' => '20,1'],   // 20 per minute  
            'ministry_admin' => ['any' => '100,1'],     // 100 per minute
        };

        foreach ($limits as $key => $limit) {
            RateLimiter::for($key, function () use ($limit, $user) {
                return Limit::perMinute(explode(',', $limit)[0])
                    ->by($user->id)
                    ->response(function () {
                        return response()->json([
                            'message' => 'Rate limit exceeded'
                        ], 429);
                    });
            });
        }

        return $next($request);
    }
}
