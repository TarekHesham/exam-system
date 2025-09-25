<?php

namespace App\Core\DTOs;

use App\Http\Requests\StoreExamRequest;
use Illuminate\Support\Facades\Auth;

class CreateExamDTO
{
    public function __construct(
        public readonly int $subjectId,
        public readonly ?int $createdBy,
        public readonly string $title,
        public readonly ?string $description,
        public readonly string $examType, // 'practice' | 'final'
        public readonly string $academicYear, // 'first' | 'second' | 'third'
        public readonly string $startTime,
        public readonly string $endTime,
        public readonly int $durationMinutes,
        public readonly int $totalScore,
        public readonly int $minimumBatteryPercentage = 20,
        public readonly bool $requireVideoRecording = false
    ) {}

    public static function fromRequest(StoreExamRequest $request): self
    {
        return new self(
            subjectId: $request->validated('subject_id'),
            createdBy: Auth::user()?->teacher()?->first()?->id,
            title: $request->validated('title'),
            description: $request->validated('description'),
            examType: $request->validated('exam_type'),
            academicYear: $request->validated('academic_year'),
            startTime: $request->validated('start_time'),
            endTime: $request->validated('end_time'),
            durationMinutes: $request->validated('duration_minutes'),
            totalScore: $request->validated('total_score'),
            minimumBatteryPercentage: $request->validated('minimum_battery_percentage') ?? 20,
            requireVideoRecording: $request->validated('require_video_recording') ?? false
        );
    }

    public static function fromArray(array $data): self
    {
        return new self(
            subjectId: $data['subject_id'],
            createdBy: Auth::user()?->teacher()?->first()?->id,
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

    public function toArray(): array
    {
        return [
            'subject_id' => $this->subjectId,
            'created_by' => $this->createdBy,
            'title' => $this->title,
            'description' => $this->description,
            'exam_type' => $this->examType,
            'academic_year' => $this->academicYear,
            'start_time' => $this->startTime,
            'end_time' => $this->endTime,
            'duration_minutes' => $this->durationMinutes,
            'total_score' => $this->totalScore,
            'minimum_battery_percentage' => $this->minimumBatteryPercentage,
            'require_video_recording' => $this->requireVideoRecording,
            'is_published' => false,
            'is_active' => true
        ];
    }
}
