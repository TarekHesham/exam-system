<?php

namespace App\Modules\ExamManagement\Models;

use App\Core\Models\BaseModel;
use App\Modules\UserManagement\Models\Teacher;

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
        'allow_late_entry',
        'late_entry_limit_minutes',
        'minimum_battery_percentage',
        'require_video_recording',
        'is_published',
        'is_active'
    ];

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

    public function teacher()
    {
        return $this->belongsTo(Teacher::class, 'created_by');
    }

    public function questions()
    {
        return $this->hasMany(ExamQuestion::class);
    }

    public function sessions()
    {
        return $this->hasMany(ExamSession::class);
    }

    public function qrCodes()
    {
        return $this->hasMany(StudentQrCode::class);
    }
}
