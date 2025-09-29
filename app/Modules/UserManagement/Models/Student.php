<?php

namespace App\Modules\UserManagement\Models;

use App\Core\Models\BaseModel;
use App\Modules\Appeals\Models\Appeal;
use App\Modules\Authentication\Models\User;
use App\Modules\ExamManagement\Models\ExamSession;
use App\Modules\Results\Models\ExamResult;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Student extends BaseModel
{
    protected $fillable = [
        'user_id',
        'school_id',
        'student_code',
        'seat_number',
        'academic_year',
        'section',
        'birth_date',
        'gender',
        'guardian_phone',
        'is_banned',
        'ban_until',
        'ban_reason'
    ];

    protected $casts = [
        'birth_date' => 'date',
        'is_banned'  => 'boolean',
        'ban_until'  => 'datetime',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function school(): BelongsTo
    {
        return $this->belongsTo(School::class);
    }

    public function examSessions(): HasMany
    {
        return $this->hasMany(ExamSession::class);
    }

    public function examResults(): HasMany
    {
        return $this->hasMany(ExamResult::class);
    }

    public function appeals(): HasMany
    {
        return $this->hasMany(Appeal::class);
    }

    // Scope
    public function examsWithResultsThisYear()
    {
        return $this->examResults()
            ->with('exam.subject')
            ->whereHas('exam', function ($query) {
                $query->where('academic_year', $this->academic_year);
            });
    }
}
