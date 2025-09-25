<?php

namespace App\Modules\ExamManagement\Models;

use App\Core\Models\BaseModel;

class ExamSection extends BaseModel
{
    protected $fillable = [
        'exam_id',
        'code',
        'name',
        'order_number',
    ];

    protected $casts = [
        'order_number' => 'integer',
    ];

    public function exam()
    {
        return $this->belongsTo(Exam::class);
    }

    public function questions()
    {
        return $this->hasMany(ExamQuestion::class, 'section_id');
    }
}
