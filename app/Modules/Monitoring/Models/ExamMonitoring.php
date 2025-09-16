<?php

namespace App\Modules\Monitoring\Models;

use App\Core\Models\BaseModel;
use App\Modules\ExamManagement\Models\ExamSession;

class ExamMonitoring extends BaseModel
{
    protected $fillable = [
        'session_id',
        'event_type',
        'event_data',
        'ip_address',
        'event_timestamp',
        'severity_level',
        'requires_action'
    ];

    public function session()
    {
        return $this->belongsTo(ExamSession::class);
    }
}
