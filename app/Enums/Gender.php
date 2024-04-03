<?php

namespace App\Enums;

enum Gender: string
{
    case MALE = 'male';
    case FEMALE = 'female';
    case OTHER = 'other';

    public static function getValues(): array
    {
        return [
            self::MALE->value,
            self::FEMALE->value,
            self::OTHER->value
        ];
    }
}
