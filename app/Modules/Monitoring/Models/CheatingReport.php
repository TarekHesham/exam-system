<?php

namespace App\Modules\Monitoring\Models;

use App\Core\Models\BaseModel;
use App\Modules\ExamManagement\Models\ExamSession;
use App\Modules\UserManagement\Models\Teacher;

class CheatingReport extends BaseModel
{
    protected $fillable = [
        'session_id',
        'reported_by',
        'violation_type',
        'description',
        'evidence_data',
        'evidence_file_path',
        'report_status',
        'investigated_by',
        'investigation_notes',
        'reported_at',
        'investigated_at'
    ];

    public function session()
    {
        return $this->belongsTo(ExamSession::class);
    }

    public function reporter()
    {
        return $this->belongsTo(Teacher::class, 'reported_by');
    }

    public function investigator()
    {
        return $this->belongsTo(Teacher::class, 'investigated_by');
    }
}
