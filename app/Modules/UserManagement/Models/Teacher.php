<?php

namespace App\Modules\UserManagement\Models;

use App\Core\Models\BaseModel;
use App\Modules\Appeals\Models\Appeal;
use App\Modules\Authentication\Models\User;
use App\Modules\ExamManagement\Models\Exam;
use App\Modules\Monitoring\Models\CheatingReport;
use App\Modules\Results\Models\EssayCorrection;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Teacher extends BaseModel
{
    protected $fillable = [
        'user_id',
        'teacher_code',
        'subject_id',
        'teacher_type', // 'regular', 'supervisor'
        'can_create_exams',
        'can_correct_essays'
    ];

    protected $casts = [
        'can_create_exams' => 'boolean',
        'can_correct_essays' => 'boolean',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function schoolAssignments(): HasMany
    {
        return $this->hasMany(TeacherSchoolAssignment::class);
    }

    public function createdExams(): HasMany
    {
        return $this->hasMany(Exam::class, 'created_by', 'user_id');
    }

    public function essayCorrections(): HasMany
    {
        return $this->hasMany(EssayCorrection::class, 'corrected_by', 'user_id');
    }

    public function appealsReviewed(): HasMany
    {
        return $this->hasMany(Appeal::class, 'reviewed_by');
    }

    public function cheatingReportsInvestigated()
    {
        return $this->hasMany(CheatingReport::class, 'investigated_by');
    }
}
