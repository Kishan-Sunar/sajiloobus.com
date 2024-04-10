<?php

namespace App\Enums;

enum RouteType: string
{
    case DROP = 'drop';
    case BOARD = 'board';

    public static function getValues(): array
    {
        return [
            self::DROP->value,
            self::BOARD->value
        ];
    }
}
