<?php

namespace App\Exceptions;

use Exception;

class ExamAccessDeniedException extends Exception
{
    protected array $reasons;

    public function __construct(array $reasons, string $message = "غير مصرح للطالب بدخول هذا الامتحان")
    {
        parent::__construct($message, 403);
        $this->reasons = $reasons;
    }

    public function getReasons(): array
    {
        return $this->reasons;
    }
}
