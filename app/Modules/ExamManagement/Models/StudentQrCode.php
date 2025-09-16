<?php

namespace App\Modules\ExamManagement\Models;

use App\Core\Models\BaseModel;
use App\Modules\UserManagement\Models\Student;

class StudentQrCode extends BaseModel
{
    protected $fillable = [
        'student_id',
        'exam_id',
        'qr_code',
        'qr_type',
        'is_used',
        'used_at',
        'used_by_device',
        'expires_at'
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function exam()
    {
        return $this->belongsTo(Exam::class);
    }
}
