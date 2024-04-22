<?php

namespace App\Enums;

enum PaymentStatus: string
{
    case PENDING = 'PENDING';
    case PAID = 'PAID';
    case UNPAID = 'UNPAID';
    case REFUNDED = 'REFUNDED';

    public static function getValues(): array
    {
        return [
            self::PENDING->value,
            self::PAID->value,
            self::UNPAID->value,
            self::REFUNDED->value
        ];
    }
}
