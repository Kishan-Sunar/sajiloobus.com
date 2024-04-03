<?php

namespace App\Enums;

enum UserRole: string
{
    case ADMIN = 'admin';
    case OPERATOR = 'operator';
    case PASSENGER = 'passenger';
    public static function getValues(): array
    {
        return [
            self::ADMIN->value,
            self::OPERATOR->value,
            self::PASSENGER->value
        ];
    }
}
