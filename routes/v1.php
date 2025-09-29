<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes v1
|--------------------------------------------------------------------------
*/
use App\Http\Controllers\Api\V1\Admin\{
    ExamController,
    ExamQuestionController,
    ExamSectionController,
    SchoolAdminController,
    SchoolController,
    SubjectController,
    TeacherController,
    TeacherSchoolAssignmentController
};
use App\Http\Controllers\Api\V1\SchoolAdmin\{StudentController};
use App\Http\Controllers\Api\V1\Shared\{AuthController, GovernorateController};
use App\Http\Controllers\Api\V1\Student\{StudentExamController};
use App\Http\Controllers\Api\V1\Teacher\{
    SchoolController as TeacherSchoolController,
    TeacherExamController
};

// Authentication
Route::post('auth/login', [AuthController::class, 'login'])->withoutMiddleware('auth:sanctum');

// Authenticated routes
Route::middleware('roles:student')->prefix('student')->group(function () {
    // ============================================
    // Exam Session Management
    // ============================================
    Route::get('available-exam', [StudentExamController::class, 'getAvailableExam']);
    Route::post('exam/submit', [StudentExamController::class, 'submitExam']);
    Route::get('exam/results', [StudentExamController::class, 'myExamResults']);
});

Route::middleware('roles:teacher')->prefix('teacher')->group(function () {
    // Students
    Route::post('scan-qr-create-session', [TeacherExamController::class, 'scanQRAndCreateSession']);
    Route::get('my-schools', TeacherSchoolController::class);
});

Route::middleware('roles:school_admin')->prefix('admin')->group(function () {
    // Account creation routes
    Route::apiResource('students', StudentController::class);
});

Route::middleware('roles:ministry_admin|teacher')->prefix('admin')->group(function () {
    // ============================================
    // Teachers Management
    // ============================================
    Route::apiResource('teachers', TeacherController::class);
    Route::post('teachers/{teacherId}/assign-schools', [TeacherSchoolAssignmentController::class, 'assignToSchools']);
    Route::get('teachers/by-school/{schoolId}', [TeacherSchoolAssignmentController::class, 'getBySchool']);
    Route::apiResource('teacher-school-assignments', TeacherSchoolAssignmentController::class);

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
    Route::get('exams/{id}/questions', [ExamQuestionController::class, 'getExamQuestions']);

    // ============================================
    // Exam Sections Management
    // ============================================
    Route::apiResource('exam-sections', ExamSectionController::class);

    // =============================================
    // School Admin Management
    // =============================================
    Route::apiResource('school-admins', SchoolAdminController::class);

    // =============================================
    // School Management
    // =============================================
    Route::apiResource('schools', SchoolController::class);
});

// Protected routes
Route::get('me', [AuthController::class, 'me']);
Route::post('logout', [AuthController::class, 'logout']);
Route::apiResource('governorates', GovernorateController::class)->only('index', 'show');
