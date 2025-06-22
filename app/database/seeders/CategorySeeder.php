<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Services\Seeder\BaseSeeder;

class CategorySeeder extends BaseSeeder
{
    protected function getModel(): string
    {
        return Category::class;
    }

    protected function getData(): array
    {
        return [
            [
                'id' => 1,
                'name' => 'Легкий',
            ],
            [
                'id' => 2,
                'name' => 'Хрупкий',
            ],
            [
                'id' => 3,
                'name' => 'Тяжелый',
            ],
        ];
    }
}
