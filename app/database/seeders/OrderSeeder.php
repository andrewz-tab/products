<?php

namespace Database\Seeders;

use App\Helpers\SeedHelper;
use App\Models\Order;
use App\Services\Seeder\BaseSeeder;

class OrderSeeder extends BaseSeeder
{
    protected function getModel(): string
    {
        return Order::class;
    }

    protected function getData(): array
    {
        return [
            [
                'id' => SeedHelper::makeId(1),
                'product_id' => SeedHelper::makeId(1),
            ],
            [
                'id' => SeedHelper::makeId(2),
                'product_id' => SeedHelper::makeId(2),
            ],
            [
                'id' => SeedHelper::makeId(3),
                'product_id' => SeedHelper::makeId(3),
            ],
        ];
    }
}
