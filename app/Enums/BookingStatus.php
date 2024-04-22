<?php

namespace App\Enums;

enum BookingStatus: string
{
    case CANCELLED_BY_CUSTOMER = 'CANCELLED_BY_CUSTOMER';
    case CANCELLED_BY_OPERATOR = 'CANCELLED_BY_OPERATOR';
    case PENDING = 'PENDING';
    case DECLINED = 'DECLINED';
    case BOOKED = 'BOOKED';

    public static function getValues(): array
    {
        return [
            self::CANCELLED_BY_CUSTOMER->value,
            self::CANCELLED_BY_OPERATOR->value,
            self::PENDING->value,
            self::DECLINED->value,
            self::BOOKED->value
        ];
    }
}
