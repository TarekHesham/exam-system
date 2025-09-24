<?php

namespace App\Core\DTOs;

use App\Http\Requests\UpdateExamRequest;

class UpdateExamDTO
{
    public function __construct(
        public readonly ?string $title = null,
        public readonly ?string $description = null,
        public readonly ?string $startTime = null,
        public readonly ?string $endTime = null,
        public readonly ?int $durationMinutes = null,
        public readonly ?int $totalScore = null,
        public readonly ?int $minimumBatteryPercentage = null,
        public readonly ?bool $requireVideoRecording = null,
        public readonly ?bool $isPublished = null,
        public readonly ?bool $isActive = null
    ) {}

    public static function fromRequest(UpdateExamRequest $request): self
    {
        $validated = $request->validated();

        return new self(
            title: $validated['title'] ?? null,
            description: $validated['description'] ?? null,
            startTime: $validated['start_time'] ?? null,
            endTime: $validated['end_time'] ?? null,
            durationMinutes: $validated['duration_minutes'] ?? null,
            totalScore: $validated['total_score'] ?? null,
            minimumBatteryPercentage: $validated['minimum_battery_percentage'] ?? null,
            requireVideoRecording: $validated['require_video_recording'] ?? null,
            isPublished: $validated['is_published'] ?? null,
            isActive: $validated['is_active'] ?? null
        );
    }

    public function toArray(): array
    {
        return array_filter([
            'title' => $this->title,
            'description' => $this->description,
            'start_time' => $this->startTime,
            'end_time' => $this->endTime,
            'duration_minutes' => $this->durationMinutes,
            'total_score' => $this->totalScore,
            'minimum_battery_percentage' => $this->minimumBatteryPercentage,
            'require_video_recording' => $this->requireVideoRecording,
            'is_published' => $this->isPublished,
            'is_active' => $this->isActive
        ], fn($value) => $value !== null);
    }
}
