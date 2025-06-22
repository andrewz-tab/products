<?php

namespace Database\Seeders;

use App\Helpers\SeedHelper;
use App\Models\Product;
use App\Services\Seeder\BaseSeeder;

class ProductSeeder extends BaseSeeder
{
    protected function getModel(): string
    {
        return Product::class;
    }

    protected function getData(): array
    {
        return [
            [
                'id' => SeedHelper::makeId(1),
                'category_id' => 1,
            ],
            [
                'id' => SeedHelper::makeId(2),
                'category_id' => 2,
            ],
            [
                'id' => SeedHelper::makeId(3),
                'category_id' => 3,
            ],
        ];
    }
}
