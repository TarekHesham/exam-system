<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ExamResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id'                         => $this->id,
            'title'                      => $this->title,
            'name'                       => $this->name,
            'description'                => $this->description,
            'exam_type'                  => $this->exam_type,
            'academic_year'              => $this->academic_year,
            'subject_id'                 => $this->subject_id,
            'subject_name'               => $this->whenLoaded('subject', fn($s) => $s->name),
            'total_score'                => $this->total_score,
            'duration_minutes'           => $this->duration_minutes,
            'start_time'                 => $this->start_time,
            'end_time'                   => $this->end_time,
            'time_remaining'             => $this->time_remaining,
            'status'                     => $this->status,
            'is_active'                  => $this->is_active,
            'is_published'               => $this->is_published,
            'can_enter'                  => $this->can_enter,
            'minimum_battery_percentage' => $this->minimum_battery_percentage,
            'require_video_recording'    => $this->require_video_recording,
            'created_at'                 => $this->created_at,
            'updated_at'                 => $this->updated_at,
            'created_by'                 => $this->created_by,
            'creator'                    => $this->whenLoaded('creator'),
        ];
    }
}
