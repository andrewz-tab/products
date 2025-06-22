<?php

namespace Database\Factories;

use App\Enums\OrderStatus;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'product_id' => Product::factory(),
            'full_name' => $this->faker->name(),
            'comment' => $this->faker->text(),
            'status' => $this->faker->randomElement(OrderStatus::values()),
            'amount' => $this->faker->randomFloat(2, 10),
            'total_price' => $this->faker->randomFloat(2, 10),
            'product_name' => $this->faker->word(),
            'product_category' => $this->faker->word(),
            'product_price' => $this->faker->randomFloat(2, 10),
        ];
    }
}
