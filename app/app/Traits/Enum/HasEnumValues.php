<?php

namespace App\Traits\Enum;

/**
 * @requires \BackedEnum
 */
trait HasEnumValues
{
    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
