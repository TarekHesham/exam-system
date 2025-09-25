<?php


/*
|--------------------------------------------------------------------------
| API Routes v1
|--------------------------------------------------------------------------
*/

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\{
    AuthController,
    ExamController,
    ExamQuestionController,
    ExamSessionController,
    SchoolAdminController,
    StudentExamController,
    SubjectController,
    TeacherController,
    TeacherExamController
};

// Authentication
Route::withoutMiddleware('auth:sanctum')->prefix('auth')->group(function () {
    Route::post('login', [AuthController::class, 'login']);
});

// Protected routes
Route::get('me', [AuthController::class, 'me']);
Route::post('logout', [AuthController::class, 'logout']);

Route::middleware('roles:student')->prefix('student')->group(function () {
    // ============================================
    // Exam Session Management
    // ============================================
    Route::prefix('exam-sessions')->group(function () {
        Route::post('/{sessionId}/submit', [ExamSessionController::class, 'submitSession']);

        // Session Monitoring
        Route::post('/{sessionId}/heartbeat', [ExamSessionController::class, 'heartbeat']);
        Route::get('/{sessionId}/time-remaining', [ExamSessionController::class, 'timeRemaining']);
    });

    Route::get('available-exam', [StudentExamController::class, 'getAvailableExam']);

    // These routes remain from ExamSessionService for answer management
    Route::post('/exam/save-answer', [StudentExamController::class, 'saveAnswer']);
    Route::post('/exam/submit', [StudentExamController::class, 'submitExam']);
    Route::post('/exam/heartbeat', [StudentExamController::class, 'sendHeartbeat']);
});

Route::middleware('roles:teacher')->prefix('teacher')->group(function () {
    // Students
    Route::post('/scan-qr-create-session', [TeacherExamController::class, 'scanQRAndCreateSession']);
});

Route::middleware('roles:school_admin')->prefix('admin')->group(function () {
    // Account creation routes
    Route::post('create-student', [AuthController::class, 'createStudent']);
});

Route::middleware('roles:ministry_admin|teacher')->prefix('admin')->group(function () {
    // Account creation routes
    Route::post('create-teacher', [AuthController::class, 'createTeacher']);
    // Route::post('create-school-admin', [AuthController::class, 'createSchoolAdmin']);

    // ============================================
    // Teachers Management
    // ============================================
    Route::apiResource('teachers', TeacherController::class)->except('store');
    Route::patch('teachers/{id}/toggle-status', [TeacherController::class, 'toggleStatus']);

    // ============================================
    // Exam Management
    // ============================================
    Route::prefix('exams')->group(function () {
        // CRUD
        Route::get('/', [ExamController::class, 'index']);
        Route::post('/', [ExamController::class, 'store']);
        Route::get('/{id}', [ExamController::class, 'show']);
        Route::put('/{exam}', [ExamController::class, 'update']);
        Route::delete('/{id}', [ExamController::class, 'destroy']);

        // Advanced Features
        Route::post('/{id}/duplicate', [ExamController::class, 'duplicate']);
        Route::get('/{id}/statistics', [ExamController::class, 'statistics']);
    });

    // ============================================
    // Subject Management
    // ============================================
    Route::apiResource('subjects', SubjectController::class);

    // ============================================
    // Exam Questions Management
    // ============================================
    Route::apiResource('exam-questions', ExamQuestionController::class);
    Route::apiResource('exam-sections', ExamQuestionController::class);
    Route::get('exams/{id}/questions', [ExamQuestionController::class, 'getExamQuestions']);

    // =============================================
    // School Admin Management
    // =============================================
    Route::apiResource('school-admins', SchoolAdminController::class);
});
