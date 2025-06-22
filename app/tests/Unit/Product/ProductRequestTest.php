<?php

namespace Tests\Unit\Product;

use App\Http\Requests\Product\ProductRequest;
use Tests\RequestTest;

class ProductRequestTest extends RequestTest
{
    protected function getRequestClass(): string
    {
        return ProductRequest::class;
    }

    public function test_all_fields_ok(): void
    {
        $payload = [
            'name' => 'test product name',
            'description' => 'test product description',
            'category_id' => 1,
            'price' => 2,
        ];

        $result = $this->validate($payload);
        $this->assertEquals('', $result);
    }

    public function test_name_is_not_set(): void
    {
        $payload = [
            'description' => 'test product description',
            'category_id' => 1,
            'price' => 2,
        ];

        $result = $this->validate($payload);
        $this->assertEquals('The name field is required.', $result);
    }

    public function test_description_is_not_set(): void
    {
        $payload = [
            'name' => 'test product name',
            'category_id' => 1,
            'price' => 2,
        ];

        $result = $this->validate($payload);
        $this->assertEquals('The description field is required.', $result);
    }

    public function test_price_is_not_set(): void
    {
        $payload = [
            'name' => 'test product name',
            'description' => 'test product description',
            'category_id' => 1,
        ];

        $result = $this->validate($payload);
        $this->assertEquals('The price field is required.', $result);
    }

    public function test_price_is_not_decimal(): void
    {
        $payload = [
            'name' => 'test product name',
            'description' => 'test product description',
            'category_id' => 1,
            'price' => 'not decimal',
        ];

        $result = $this->validate($payload);
        $this->assertEquals('The price field must have 0-2 decimal places.', $result);
    }

    public function test_price_is_less_than_zero(): void
    {
        $payload = [
            'name' => 'test product name',
            'description' => 'test product description',
            'category_id' => 1,
            'price' => -2,
        ];

        $result = $this->validate($payload);
        $this->assertEquals('The price field must be at least 0.', $result);
    }

    public function test_price_has_more_two_decimal_places(): void
    {
        $payload = [
            'name' => 'test product name',
            'description' => 'test product description',
            'category_id' => 1,
            'price' => 3.001,
        ];

        $result = $this->validate($payload);
        $this->assertEquals('The price field must have 0-2 decimal places.', $result);
    }
}
