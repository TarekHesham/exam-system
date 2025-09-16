<?php

namespace App\Modules\ExamManagement\Models;

use App\Core\Models\BaseModel;

class ExamQuestion extends BaseModel
{
    protected $fillable = [
        'exam_id',
        'question_text',
        'question_image',
        'question_type',
        'options',
        'correct_answer',
        'points',
        'order_number',
        'is_required',
        'help_text'
    ];

    public function exam()
    {
        return $this->belongsTo(Exam::class);
    }

    public function answers()
    {
        return $this->hasMany(StudentAnswer::class, 'question_id');
    }
}
