<?php

namespace Order;

use App\Http\Requests\Order\OrderRequest;
use Tests\RequestTest;

class OrderRequestTest extends RequestTest
{
    public function test_all_fields_ok(): void
    {
        $payload = [
            'full_name' => 'test fio',
            'comment' => 'test comment',
            'amount' => 2,
        ];

        $result = $this->validate($payload);
        $this->assertEquals('', $result);
    }

    public function test_fio_is_not_set(): void
    {
        $payload = [
            'full_name' => '',
            'comment' => 'test comment',
            'amount' => 2,
        ];

        $result = $this->validate($payload);
        $this->assertEquals('The full name field is required.', $result);
    }

    public function test_amount_is_not_set(): void
    {
        $payload = [
            'full_name' => 'test fio',
        ];

        $result = $this->validate($payload);
        $this->assertEquals('The amount field is required.', $result);
    }

    public function test_amount_is_less_than_1(): void
    {
        $payload = [
            'full_name' => 'test fio',
            'comment' => 'test comment',
            'amount' => 0,
        ];

        $result = $this->validate($payload);
        $this->assertEquals('The amount field must be at least 1.', $result);
    }

    public function test_amount_is_less_than_zero(): void
    {
        $payload = [
            'full_name' => 'test fio',
            'comment' => 'test comment',
            'amount' => -2,
        ];

        $result = $this->validate($payload);
        $this->assertEquals('The amount field must be at least 1.', $result);
    }

    protected function getRequestClass(): string
    {
        return OrderRequest::class;
    }
}
