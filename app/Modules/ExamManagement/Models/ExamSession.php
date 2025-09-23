<?php

namespace App\Modules\ExamManagement\Models;

use App\Core\Models\BaseModel;
use App\Modules\Monitoring\Models\CheatingReport;
use App\Modules\Monitoring\Models\ExamMonitoring;
use App\Modules\Results\Models\ExamResult;
use App\Modules\UserManagement\Models\School;
use App\Modules\UserManagement\Models\Student;

class ExamSession extends BaseModel
{
    protected $fillable = [
        'exam_id',
        'student_id',
        'school_id',
        'session_token',
        'started_at',
        'submitted_at',
        'ip_address',
        'device_info',
        'browser_info',
        'session_status', // 'not_started', 'in_progress', 'submitted', 'cancelled', 'expired'
        'battery_level_at_start',
        'video_recorded',
        'video_file_path',
        'session_notes'
    ];

    protected $casts = [
        'started_at' => 'datetime',
        'submitted_at' => 'datetime',
        'video_recorded' => 'boolean',
        'battery_level_at_start' => 'integer',
    ];

    public function exam()
    {
        return $this->belongsTo(Exam::class);
    }

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function school()
    {
        return $this->belongsTo(School::class);
    }

    public function answers()
    {
        return $this->hasMany(StudentAnswer::class, 'session_id');
    }

    public function monitoring()
    {
        return $this->hasMany(ExamMonitoring::class, 'session_id');
    }

    public function cheatingReports()
    {
        return $this->hasMany(CheatingReport::class, 'session_id');
    }

    public function result()
    {
        return $this->hasOne(ExamResult::class, 'session_id');
    }
}
