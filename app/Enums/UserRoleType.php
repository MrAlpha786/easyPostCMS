<?php

namespace App\Enums;

enum UserRoleType: int
{
    case ADMIN = 1;
    case MANAGER = 2;
    case CLERK = 3;

    public function toString(): string
    {
        return match ($this) {
            UserRoleType::ADMIN => "admin",
            UserRoleType::MANAGER => "manager",
            UserRoleType::CLERK => "clerk",
        };
    }
}
