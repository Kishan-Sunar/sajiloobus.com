<?php

namespace App\Enums;

enum SeatStatus: string
{
    case PENDING = 'PENDING';
    case DECLINED = 'DECLINED';
    case BOOKED = 'BOOKED';
    case AVAILABLE = 'AVAILABLE';

    public static function getValues(): array
    {
        return [
            self::PENDING->value,
            self::DECLINED->value,
            self::BOOKED->value,
            self::AVAILABLE->value
        ];
    }
}
