<?php

namespace App\Enums;

enum UserStatus: string
{
    case ACTIVE = 'active';
    case INACTIVE = 'inactive';

    public static function getValues(): array
    {
        return [
            self::ACTIVE->value,
            self::INACTIVE->value
        ];
    }
}
