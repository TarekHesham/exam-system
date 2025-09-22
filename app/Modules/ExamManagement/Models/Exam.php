<?php

namespace App\Modules\ExamManagement\Models;

use App\Core\Models\BaseModel;
use App\Modules\Authentication\Models\User;
use App\Modules\Results\Models\ExamResult;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Exam extends BaseModel
{
    protected $fillable = [
        'subject_id',
        'created_by',
        'title',
        'description',
        'exam_type',
        'academic_year',
        'start_time',
        'end_time',
        'duration_minutes',
        'total_score',
        'minimum_battery_percentage',
        'require_video_recording',
        'is_published',
        'is_active'
    ];

    protected $casts = [
        'start_time' => 'datetime',
        'end_time' => 'datetime',
        'require_video_recording' => 'boolean',
        'is_published' => 'boolean',
        'is_active' => 'boolean'
    ];

    protected $appends = [
        'status',
        'can_enter',
        'time_remaining'
    ];

    // Relationships
    public function subject(): BelongsTo
    {
        return $this->belongsTo(Subject::class);
    }

    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function questions(): HasMany
    {
        return $this->hasMany(ExamQuestion::class);
    }

    public function sessions(): HasMany
    {
        return $this->hasMany(ExamSession::class);
    }

    public function sections(): HasMany
    {
        return $this->hasMany(ExamSection::class);
    }

    public function results(): HasMany
    {
        return $this->hasMany(ExamResult::class);
    }

    // Accessors
    public function getStatusAttribute(): string
    {
        $now = Carbon::now();

        if (!$this->is_published || !$this->is_active) {
            return 'unpublished';
        }

        if ($now < $this->start_time) {
            return 'upcoming';
        }

        if ($now >= $this->start_time && $now <= $this->end_time) {
            return 'ongoing';
        }

        return 'completed';
    }

    public function getCanEnterAttribute(): bool
    {
        $now = Carbon::now();
        $status = $this->status;

        if ($status === 'ongoing') {
            return true;
        }

        if ($status === 'upcoming') {
            $lateEntryDeadline = $this->start_time;
            return $now <= $lateEntryDeadline;
        }

        return false;
    }

    public function getTimeRemainingAttribute(): ?int
    {
        if ($this->status !== 'ongoing') {
            return null;
        }

        $now = Carbon::now();
        $endTime = Carbon::parse($this->end_time);

        return $now < $endTime ? $now->diffInMinutes($endTime) : 0;
    }

    // Scopes
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopePublished($query)
    {
        return $query->where('is_published', true);
    }

    public function scopeUpcoming($query)
    {
        return $query->where('start_time', '>', Carbon::now())
            ->where('is_published', true)
            ->where('is_active', true);
    }

    public function scopeOngoing($query)
    {
        $now = Carbon::now();
        return $query->where('start_time', '<=', $now)
            ->where('end_time', '>=', $now)
            ->where('is_published', true)
            ->where('is_active', true);
    }

    public function scopeCompleted($query)
    {
        return $query->where('end_time', '<', Carbon::now())
            ->where('is_published', true);
    }

    public function scopeBySubject($query, int $subjectId)
    {
        return $query->where('subject_id', $subjectId);
    }

    public function scopeByCreator($query, int $creatorId)
    {
        return $query->where('created_by', $creatorId);
    }

    public function scopeByAcademicYear($query, string $academicYear)
    {
        return $query->where('academic_year', $academicYear);
    }

    public function scopeByExamType($query, string $examType)
    {
        return $query->where('exam_type', $examType);
    }

    // Methods
    public function canBeModified(): bool
    {
        return $this->start_time > Carbon::now() || !$this->is_published;
    }

    public function canBeDeleted(): bool
    {
        return !$this->sessions()->exists();
    }

    public function canBePublished(): bool
    {
        return $this->questions()->exists() &&
            $this->total_score === $this->questions()->sum('points') &&
            $this->start_time > Carbon::now();
    }

    public function hasStudent(int $studentId): bool
    {
        return $this->sessions()->where('student_id', $studentId)->exists();
    }

    public function getQuestionsCount(): int
    {
        return $this->questions()->count();
    }

    public function getParticipantsCount(): int
    {
        return $this->sessions()->distinct('student_id')->count();
    }

    public function getCompletedSessionsCount(): int
    {
        return $this->sessions()->where('session_status', 'submitted')->count();
    }

    public function getAverageScore(): float
    {
        return (float) $this->results()->avg('percentage') ?? 0;
    }
}
