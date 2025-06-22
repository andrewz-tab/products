<?php

namespace App\Helpers;

class SeedHelper
{
    public static function makeId(int $id): int
    {
        return $id + 1000000000;
    }
}
