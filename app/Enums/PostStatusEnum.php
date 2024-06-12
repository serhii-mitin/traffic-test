<?php

namespace App\Enums;

enum PostStatusEnum: int
{
    case HIDDEN = 0;

    case ACTIVE = 1;

    static function getValues(): array
    {
        return array_map(fn($case) => $case->value, static::cases());
    }
}
