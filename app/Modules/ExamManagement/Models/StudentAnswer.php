<?php

namespace App\Modules\ExamManagement\Models;

use App\Core\Models\BaseModel;
use App\Modules\Results\Models\EssayCorrection;

class StudentAnswer extends BaseModel
{
    protected $fillable = [
        'session_id',
        'question_id',
        'answer_text',
        'answer_image',
        'answer_data',
        'is_flagged',
        'answered_at',
        'time_spent_seconds',
        'needs_review'
    ];

    protected $casts = [
        'is_flagged'   => 'boolean',
        'needs_review' => 'boolean',
        'answer_data'  => 'array',
        'answered_at'  => 'datetime',
        'time_spent_seconds' => 'integer'
    ];

    public function session()
    {
        return $this->belongsTo(ExamSession::class, 'session_id');
    }

    public function question()
    {
        return $this->belongsTo(ExamQuestion::class, 'question_id');
    }

    public function essayCorrections()
    {
        return $this->hasMany(EssayCorrection::class, 'answer_id');
    }
}
