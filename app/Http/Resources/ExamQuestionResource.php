<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ExamQuestionResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'exam_id' => $this->exam_id,
            'question_text' => $this->question_text,
            'question_image' => $this->question_image,
            'question_type' => $this->question_type,
            'options' => $this->options ? (is_string($this->options) ? json_decode($this->options, true) : $this->options) : null,
            'correct_answer' => $this->correct_answer,
            'points' => (int) $this->points,
            'is_required' => (bool) $this->is_required,
            'help_text' => $this->help_text,
            'section_id' => $this->section_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
