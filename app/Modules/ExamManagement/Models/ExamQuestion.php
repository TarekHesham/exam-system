<?php

namespace App\Modules\ExamManagement\Models;

use App\Core\Models\BaseModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

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
        'is_required',
        'help_text',
        'section_id',
    ];

    public function exam(): BelongsTo
    {
        return $this->belongsTo(Exam::class);
    }

    public function answers(): HasMany
    {
        return $this->hasMany(StudentAnswer::class, 'question_id');
    }

    public function section(): BelongsTo
    {
        return $this->belongsTo(ExamSection::class, 'section_id');
    }
}
