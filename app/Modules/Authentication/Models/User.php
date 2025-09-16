<?php

namespace App\Modules\Authentication\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Core\Models\ActivityLog;
use App\Modules\Appeals\Models\Appeal;
use App\Modules\ExamManagement\Models\Exam;
use App\Modules\Monitoring\Models\CheatingReport;
use App\Modules\Results\Models\EssayCorrection;
use App\Modules\UserManagement\Models\SchoolAdmin;
use App\Modules\UserManagement\Models\Student;
use App\Modules\UserManagement\Models\Teacher;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'phone',
        'national_id',
        'user_type',
        'password',
        'is_active'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function student(): HasOne
    {
        return $this->hasOne(Student::class);
    }

    public function teacher(): HasOne
    {
        return $this->hasOne(Teacher::class);
    }

    public function schoolAdmin(): HasOne
    {
        return $this->hasOne(SchoolAdmin::class);
    }

    public function schoolAdminAssignments(): HasMany
    {
        return $this->hasMany(SchoolAdmin::class);
    }

    public function activityLogs(): HasMany
    {
        return $this->hasMany(ActivityLog::class);
    }

    public function createdExams(): HasMany
    {
        return $this->hasMany(Exam::class, 'created_by');
    }

    public function essayCorrections(): HasMany
    {
        return $this->hasMany(EssayCorrection::class, 'corrected_by');
    }

    public function reviewedAppeals(): HasMany
    {
        return $this->hasMany(Appeal::class, 'reviewed_by');
    }

    public function investigatedReports(): HasMany
    {
        return $this->hasMany(CheatingReport::class, 'investigated_by');
    }

    // Scopes
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeByType($query, string $type)
    {
        return $query->where('user_type', $type);
    }

    // Helper methods
    public function isMinistryAdmin(): bool
    {
        return $this->user_type === 'ministry_admin';
    }

    public function isSchoolAdmin(): bool
    {
        return $this->user_type === 'school_admin';
    }

    public function isTeacher(): bool
    {
        return $this->user_type === 'teacher';
    }

    public function isStudent(): bool
    {
        return $this->user_type === 'student';
    }

    public function canCreateExams(): bool
    {
        return $this->isMinistryAdmin() ||
            ($this->isTeacher() && $this->teacher?->can_create_exams);
    }

    public function canCorrectEssays(): bool
    {
        return $this->isTeacher() && $this->teacher?->can_correct_essays;
    }
}
