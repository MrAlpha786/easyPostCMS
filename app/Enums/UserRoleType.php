<?php

namespace App\Enums;

enum UserRoleType: int
{
    // Enumeration values representing user roles
    case ADMIN = 1;     
    case CLERK = 3;   

    // Convert the enumeration value to a string representation
    public function toString(): string
    {
        return match ($this) {
            UserRoleType::ADMIN => "admin", 
            UserRoleType::CLERK => "clerk",   
        };
    }
}

