<?php

namespace App\Enums;

enum FeedbackType: int
{
    // Enumeration members with associated integer values
    case INTERNAL = 1;
    case EXTERNAL = 2;

    // Method to return a string representation of the enumeration member
    public function toString(): string
    {
        return match ($this) {
            FeedbackType::INTERNAL => "Internal",
            FeedbackType::EXTERNAL => "External",
        };
    }
}
