<?php

namespace App\Modules\ExamManagement\Models;

use App\Core\Models\BaseModel;

class Subject extends BaseModel
{
    protected $fillable = [
        'name',
        'code',
        'section',
        'duration_minutes',
        'max_score',
        'has_essay_questions',
        'is_active'
    ];

    protected $casts = [
        'has_essay_questions' => 'boolean',
        'is_active'           => 'boolean',
        'duration_minutes'    => 'integer',
        'max_score'           => 'integer'
    ];

    public function exams()
    {
        return $this->hasMany(Exam::class);
    }
}
