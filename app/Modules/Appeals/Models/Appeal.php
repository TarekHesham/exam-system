<?php

namespace App\Modules\Appeals\Models;

use App\Core\Models\BaseModel;
use App\Modules\Results\Models\ExamResult;
use App\Modules\UserManagement\Models\Student;
use App\Modules\UserManagement\Models\Teacher;

class Appeal extends BaseModel
{
    protected $fillable = [
        'student_id',
        'exam_result_id',
        'appeal_reason',
        'supporting_evidence',
        'video_evidence_path',
        'appeal_fee_paid',
        'appeal_status',
        'reviewed_by',
        'review_notes',
        'submitted_at',
        'reviewed_at'
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function result()
    {
        return $this->belongsTo(ExamResult::class, 'exam_result_id');
    }

    public function reviewer()
    {
        return $this->belongsTo(Teacher::class, 'reviewed_by');
    }

    public function payments()
    {
        return $this->hasMany(AppealPayment::class);
    }
}
