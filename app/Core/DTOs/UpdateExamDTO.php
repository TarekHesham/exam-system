<?php

namespace App\Core\DTOs;

class UpdateExamDTO
{
    public function __construct(
        public readonly ?string $title = null,
        public readonly ?string $description = null,
        public readonly ?string $startTime = null,
        public readonly ?string $endTime = null,
        public readonly ?int $durationMinutes = null,
        public readonly ?int $totalScore = null,
        public readonly ?bool $allowLateEntry = null,
        public readonly ?int $lateEntryLimitMinutes = null,
        public readonly ?int $minimumBatteryPercentage = null,
        public readonly ?bool $requireVideoRecording = null,
        public readonly ?bool $isPublished = null
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            title: $data['title'] ?? null,
            description: $data['description'] ?? null,
            startTime: $data['start_time'] ?? null,
            endTime: $data['end_time'] ?? null,
            durationMinutes: $data['duration_minutes'] ?? null,
            totalScore: $data['total_score'] ?? null,
            allowLateEntry: $data['allow_late_entry'] ?? null,
            lateEntryLimitMinutes: $data['late_entry_limit_minutes'] ?? null,
            minimumBatteryPercentage: $data['minimum_battery_percentage'] ?? null,
            requireVideoRecording: $data['require_video_recording'] ?? null,
            isPublished: $data['is_published'] ?? null
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
            'allow_late_entry' => $this->allowLateEntry,
            'late_entry_limit_minutes' => $this->lateEntryLimitMinutes,
            'minimum_battery_percentage' => $this->minimumBatteryPercentage,
            'require_video_recording' => $this->requireVideoRecording,
            'is_published' => $this->isPublished
        ], fn($value) => $value !== null);
    }
}
