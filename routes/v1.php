<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\AuthController;

/*
|--------------------------------------------------------------------------
| API Routes v1 - Authentication
|--------------------------------------------------------------------------
*/

// Authentication
Route::withoutMiddleware('auth:sanctum')->prefix('auth')->group(function () {
    Route::post('login', [AuthController::class, 'login']);
});

// Protected routes
Route::get('me', [AuthController::class, 'me']);
Route::post('logout', [AuthController::class, 'logout']);

Route::middleware('roles:student')->prefix('student')->group(function () {
    Route::get('dashboard', fn() => response()->json(['msg' => 'Welcome Student']));
});

Route::middleware('roles:teacher')->prefix('teacher')->group(function () {
    Route::get('dashboard', fn() => response()->json(['msg' => 'Welcome Teacher']));
});

Route::middleware('roles:school_admin')->prefix('admin')->group(function () {
    Route::post('create-student', [AuthController::class, 'createStudent']);
});

Route::middleware('roles:ministry_admin')->prefix('admin')->group(function () {
    // Account creation routes
    Route::post('create-teacher', [AuthController::class, 'createTeacher']);
    Route::post('create-school-admin', [AuthController::class, 'createSchoolAdmin']);
});
