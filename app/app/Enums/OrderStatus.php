<?php

namespace App\Enums;

use App\Traits\Enum\HasEnumValues;

enum OrderStatus: string
{
    use HasEnumValues;

    case New = 'new';
    case Completed = 'completed';

    public function getLabel(): string
    {
        return match ($this) {
            self::New => 'Новый',
            self::Completed => 'Завершен',
        };
    }
}
