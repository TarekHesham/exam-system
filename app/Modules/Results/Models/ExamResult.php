<?php

namespace App\Modules\Results\Models;

use App\Core\Models\BaseModel;
use App\Modules\Appeals\Models\Appeal;
use App\Modules\ExamManagement\Models\Exam;
use App\Modules\ExamManagement\Models\ExamSession;
use App\Modules\UserManagement\Models\Student;

class ExamResult extends BaseModel
{
    protected $fillable = [
        'session_id',
        'student_id',
        'exam_id',
        'total_score',
        'max_possible_score',
        'percentage',
        'result_status',
        'question_scores',
        'result_published_at'
    ];

    public function session()
    {
        return $this->belongsTo(ExamSession::class, 'session_id');
    }

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function exam()
    {
        return $this->belongsTo(Exam::class);
    }

    public function appeals()
    {
        return $this->hasMany(Appeal::class);
    }
}
