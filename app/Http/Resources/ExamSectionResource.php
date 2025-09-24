<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ExamSectionResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id'           => $this->id,
            'code'         => $this->code,
            'name'         => $this->name,
            'total_points' => $this->questions->sum('points'),
            'questions'    => ExamQuestionResource::collection($this->whenLoaded('questions')),
        ];
    }
}
