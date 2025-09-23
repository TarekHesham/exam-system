<?php

use App\Http\Controllers\Api\V1\AppealController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\AuthController;
use App\Http\Controllers\Api\V1\ExamController;
use App\Http\Controllers\Api\V1\ExamQuestionController;
use App\Http\Controllers\Api\V1\ExamResultController;
use App\Http\Controllers\Api\V1\ExamSessionController;
use App\Http\Controllers\Api\V1\StudentExamController;
use App\Http\Controllers\Api\V1\SubjectController;
use App\Http\Controllers\Api\V1\TeacherController;
use App\Http\Controllers\Api\V1\TeacherExamController;

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
    // ============================================
    // Exam Session Management
    // ============================================
    Route::prefix('exam-sessions')->group(function () {
        // Session Creation and Management
        Route::post('/start', [ExamSessionController::class, 'startSession']);
        Route::get('/{sessionId}', [ExamSessionController::class, 'getSession']);
        Route::post('/{sessionId}/submit', [ExamSessionController::class, 'submitSession']);
        Route::post('/{sessionId}/pause', [ExamSessionController::class, 'pauseSession']);
        Route::post('/{sessionId}/resume', [ExamSessionController::class, 'resumeSession']);

        // Questions and Answers
        Route::get('/{sessionId}/questions', [ExamSessionController::class, 'getQuestions']);
        Route::post('/{sessionId}/questions/{questionId}/answer', [ExamSessionController::class, 'saveAnswer']);
        Route::get('/{sessionId}/answers', [ExamSessionController::class, 'getAnswers']);

        // Session Monitoring
        Route::post('/{sessionId}/heartbeat', [ExamSessionController::class, 'heartbeat']);
        Route::post('/{sessionId}/log-event', [ExamSessionController::class, 'logEvent']);
        Route::get('/{sessionId}/time-remaining', [ExamSessionController::class, 'timeRemaining']);

        // Session Status
        Route::get('/{sessionId}/status', [ExamSessionController::class, 'getStatus']);
        Route::post('/{sessionId}/report-issue', [ExamSessionController::class, 'reportIssue']);
    });

    Route::get('available-exam', [StudentExamController::class, 'getAvailableExam']);

    // These routes remain from ExamSessionService for answer management
    Route::post('/exam/save-answer', [StudentExamController::class, 'saveAnswer']);
    Route::post('/exam/submit', [StudentExamController::class, 'submitExam']);
    Route::post('/exam/heartbeat', [StudentExamController::class, 'sendHeartbeat']);

    // ============================================
    // Appeals System
    // ============================================
    Route::prefix('appeals')->group(function () {
        Route::post('/', [AppealController::class, 'store']);
        Route::get('/student/{studentId}', [AppealController::class, 'studentAppeals']);
        Route::get('/{appealId}', [AppealController::class, 'show']);
    });
});

Route::middleware('roles:teacher')->prefix('teacher')->group(function () {
    // Students
    Route::post('/scan-qr-create-session', [TeacherExamController::class, 'scanQRAndCreateSession']);
});

Route::middleware('roles:school_admin')->prefix('admin')->group(function () {
    // Account creation routes
    Route::post('create-student', [AuthController::class, 'createStudent']);
});

Route::middleware('roles:ministry_admin')->prefix('admin')->group(function () {
    // Account creation routes
    Route::post('create-teacher', [AuthController::class, 'createTeacher']);
    Route::post('create-school-admin', [AuthController::class, 'createSchoolAdmin']);

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
        Route::put('/{id}', [ExamController::class, 'update']);
        Route::delete('/{id}', [ExamController::class, 'destroy']);

        // Status Management
        Route::post('/{id}/publish', [ExamController::class, 'publish']);
        Route::post('/{id}/unpublish', [ExamController::class, 'unpublish']);
        Route::post('/{id}/activate', [ExamController::class, 'activate']);
        Route::post('/{id}/deactivate', [ExamController::class, 'deactivate']);

        // Advanced Features
        Route::post('/{id}/duplicate', [ExamController::class, 'duplicate']);
        Route::get('/{id}/statistics', [ExamController::class, 'statistics']);

        // Filter by Status
        Route::get('/status/upcoming', [ExamController::class, 'upcoming']);
        Route::get('/status/ongoing', [ExamController::class, 'ongoing']);
        Route::get('/status/completed', [ExamController::class, 'completed']);
    });

    // ============================================
    // Exam Questions Management
    // ============================================
    Route::prefix('exams/{examId}/questions')->group(function () {
        Route::get('/', [ExamQuestionController::class, 'index']);
        Route::post('/', [ExamQuestionController::class, 'store']);
        Route::get('/{questionId}', [ExamQuestionController::class, 'show']);
        Route::put('/{questionId}', [ExamQuestionController::class, 'update']);
        Route::delete('/{questionId}', [ExamQuestionController::class, 'destroy']);
        Route::post('/reorder', [ExamQuestionController::class, 'reorder']);
        Route::post('/import', [ExamQuestionController::class, 'import']);
    });

    // ============================================
    // Student Exam Access Routes
    // ============================================
    Route::prefix('student')->group(function () {
        // Available Exams for Student
        Route::get('/exams', [StudentExamController::class, 'availableExams']);
        Route::get('/exams/upcoming', [StudentExamController::class, 'upcomingExams']);
        Route::get('/exams/completed', [StudentExamController::class, 'completedExams']);

        // Exam Details and Access Check
        Route::get('/exams/{examId}', [StudentExamController::class, 'examDetails']);
        Route::post('/exams/{examId}/check-access', [StudentExamController::class, 'checkAccess']);
        Route::post('/exams/{examId}/validate-entry', [StudentExamController::class, 'validateEntry']);
    });

    // ============================================
    // Results Management
    // ============================================
    Route::prefix('results')->group(function () {
        // Student Results
        Route::get('/student/{studentId}', [ExamResultController::class, 'studentResults']);
        Route::get('/exam/{examId}/student/{studentId}', [ExamResultController::class, 'examResult']);

        // Teacher/Admin Results
        Route::get('/exam/{examId}', [ExamResultController::class, 'examResults']);
        Route::get('/exam/{examId}/statistics', [ExamResultController::class, 'examStatistics']);
        Route::post('/exam/{examId}/publish-results', [ExamResultController::class, 'publishResults']);

        // Export Results
        Route::get('/exam/{examId}/export', [ExamResultController::class, 'exportResults']);
    });

    // ============================================
    // Appeals Management
    // ============================================
    Route::post('appeals/{appealId}/review', [AppealController::class, 'review']);
    Route::post('appeals/{appealId}/approve', [AppealController::class, 'approve']);
    Route::post('appeals/{appealId}/reject', [AppealController::class, 'reject']);

    // ============================================
    // Subject Management
    // ============================================
    Route::apiResource('subjects', SubjectController::class);
});
