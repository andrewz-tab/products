<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    private array $categories = [
        'Легкий',
        'Хрупкий',
        'Тяжелый',
    ];

    public function run(): void
    {
        foreach ($this->categories as $category) {
            Category::query()->firstOrCreate(['name' => $category]);
        }
    }
}
