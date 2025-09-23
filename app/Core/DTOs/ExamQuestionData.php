<?php

namespace App\Core\DTOs;

use Illuminate\Http\Request;

final class ExamQuestionData
{
    public int $exam_id;
    public ?string $question_text;
    public ?string $question_image;
    public string $question_type;
    public ?array $options;
    public $correct_answer;
    public int $points;
    public bool $is_required;
    public ?string $help_text;
    public ?int $section_id;

    private function __construct() {}

    /**
     * Create DTO from validated array
     *
     * @param array $data
     * @return self
     */
    public static function fromArray(array $data): self
    {
        $dto = new self();

        $dto->exam_id = (int) ($data['exam_id'] ?? 0);
        $dto->question_text = $data['question_text'] ?? null;
        $dto->question_image = $data['question_image'] ?? null;
        $dto->question_type = $data['question_type'] ?? 'multiple_choice';
        $dto->options = isset($data['options']) ? (is_array($data['options']) ? $data['options'] : json_decode($data['options'], true)) : null;
        $dto->correct_answer = $data['correct_answer'] ?? null;
        $dto->points = isset($data['points']) ? (int) $data['points'] : 0;
        $dto->is_required = isset($data['is_required']) ? (bool) $data['is_required'] : false;
        $dto->help_text = $data['help_text'] ?? null;
        $dto->section_id = isset($data['section_id']) ? (int) $data['section_id'] : null;

        return $dto;
    }

    /**
     * Create DTO from a Request instance (useful in controllers)
     */
    public static function fromRequest(Request $request): self
    {
        return self::fromArray($request->all());
    }

    /**
     * Convert to array suitable for repository
     */
    public function toArray(): array
    {
        return [
            'exam_id' => $this->exam_id,
            'question_text' => $this->question_text,
            'question_image' => $this->question_image,
            'question_type' => $this->question_type,
            'options' => $this->options,
            'correct_answer' => $this->correct_answer,
            'points' => $this->points,
            'is_required' => $this->is_required,
            'help_text' => $this->help_text,
            'section_id' => $this->section_id,
        ];
    }
}
