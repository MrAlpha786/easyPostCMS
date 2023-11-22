<?php

namespace App\Enums;

enum UserRoleType: int
{
    case ADMIN = 1;
    case CLERK = 3;

    public function toString(): string
    {
        return match ($this) {
            UserRoleType::ADMIN => "admin",
            UserRoleType::CLERK => "clerk",
        };
    }
}
