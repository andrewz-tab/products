<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        $this->call(CategorySeeder::class);

        if (config('app.debug')) {
            $this->call(ProductSeeder::class);
            $this->call(OrderSeeder::class);
        }
    }
}
