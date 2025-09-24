<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ExamWithQuestionsResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id'          => $this->id,
            'title'       => $this->title,
            'description' => $this->description,
            'exam_type'   => $this->exam_type,
            'academic_year' => $this->academic_year,
            'total_score' => $this->total_score,
            'sections'    => ExamSectionResource::collection($this->whenLoaded('sections')),
            'unsectioned_questions' => ExamQuestionResource::collection($this->whenLoaded('questions')),
            'timing' => [
                'start_time'       => $this->start_time,
                'end_time'         => $this->end_time,
                'duration_minutes' => $this->duration_minutes,
            ],
        ];
    }
}
