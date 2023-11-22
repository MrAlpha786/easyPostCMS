<?php

namespace App\Enums;

enum FeedbackType: int
{
    case INTERNAL = 1;
    case EXTERNAL = 2;

    public function toString(): string
    {
        return match ($this) {
            FeedbackType::INTERNAL => "Internal",
            FeedbackType::EXTERNAL => "External",
        };
    }
}
