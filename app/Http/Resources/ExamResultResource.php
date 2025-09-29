<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ExamResultResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'result_id'           => $this->id,
            'exam_id'             => $this->exam_id,
            'student_id'          => $this->student_id,
            'total_score'         => $this->total_score,
            'max_possible_score'  => $this->max_possible_score,
            'percentage'          => $this->percentage,
            'result_status'       => $this->result_status,
            'result_published_at' => $this->result_published_at,
            'exam'                => new ExamResource($this->whenLoaded('exam')),
        ];
    }
}
