<?php

namespace App\Modules\Results\Models;

use App\Core\Models\BaseModel;
use App\Modules\ExamManagement\Models\StudentAnswer;
use App\Modules\UserManagement\Models\Teacher;

class EssayCorrection extends BaseModel
{
    protected $fillable = [
        'answer_id',
        'corrected_by',
        'score_awarded',
        'correction_notes',
        'correction_criteria',
        'is_final',
        'corrected_at'
    ];

    public function answer()
    {
        return $this->belongsTo(StudentAnswer::class, 'answer_id');
    }

    public function teacher()
    {
        return $this->belongsTo(Teacher::class, 'corrected_by');
    }
}
