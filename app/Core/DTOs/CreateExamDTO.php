<?php

namespace App\Core\DTOs;

class CreateExamDTO
{
    public function __construct(
        public readonly int $subjectId,
        public readonly int $createdBy,
        public readonly string $title,
        public readonly ?string $description,
        public readonly string $examType, // 'practice' | 'final'
        public readonly string $academicYear, // 'first' | 'second' | 'third'
        public readonly string $startTime,
        public readonly string $endTime,
        public readonly int $durationMinutes,
        public readonly int $totalScore,
        public readonly bool $allowLateEntry = false,
        public readonly int $lateEntryLimitMinutes = 0,
        public readonly int $minimumBatteryPercentage = 20,
        public readonly bool $requireVideoRecording = false
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            subjectId: $data['subject_id'],
            createdBy: $data['created_by'],
            title: $data['title'],
            description: $data['description'] ?? null,
            examType: $data['exam_type'],
            academicYear: $data['academic_year'],
            startTime: $data['start_time'],
            endTime: $data['end_time'],
            durationMinutes: $data['duration_minutes'],
            totalScore: $data['total_score'],
            minimumBatteryPercentage: $data['minimum_battery_percentage'] ?? 20,
            requireVideoRecording: $data['require_video_recording'] ?? false
        );
    }
}
