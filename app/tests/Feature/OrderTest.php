<?php


use App\Enums\OrderStatus;
use App\Models\Product;
use Tests\TestCase;

class OrderTest extends TestCase
{
    private const DELETE_ORDER = 1000000001;
    private const UPDATE_ORDER = 1000000002;
    private const PRODUCT = 1000000003;

    public function test_the_orders_page_ok(): void
    {
        $response = $this->get('/orders');

        $response->assertStatus(200);
    }

    public function test_the_order_page_ok(): void
    {
        $response = $this->get('/orders/' . self::UPDATE_ORDER);

        $response->assertStatus(200);
    }

    public function test_the_order_store_ok(): void
    {
        $data = $this->getDefaultOrderAttributes();

        $response = $this->post('/products/' . self::PRODUCT . '/orders', $data);

        $data['status'] = OrderStatus::New->value;

        $response->assertStatus(302);
        $this->assertDatabaseHas('orders', $data);
    }

    public function test_the_order_store_has_invalid_fields(): void
    {
        $data = $this->getWrongOrderAttributes();

        $response = $this->post('/products/' . self::PRODUCT . '/orders', $data);

        $response->assertStatus(302)
            ->assertSessionHasErrors(array_keys($data));
        $this->assertDatabaseMissing('orders', $data);
    }

    public function test_the_order_delete_not_allowed_ok(): void
    {
        $data = ['id' => self::DELETE_ORDER];

        $this->assertDatabaseHas('orders', $data);

        $response = $this->delete('/orders/' . self::DELETE_ORDER);

        $response->assertStatus(405);
    }

    public function test_the_order_update_not_allowed_ok(): void
    {
        $dataId = ['id' => self::UPDATE_ORDER];
        $data = $this->getDefaultOrderAttributes();

        $this->assertDatabaseHas('orders', $dataId);

        $response = $this->put('/orders/' . self::UPDATE_ORDER, $data);

        $response->assertStatus(405);
    }

    private function getDefaultOrderAttributes(): array
    {
        return [
            'full_name' => 'test user name',
            'comment' => 'test comment',
            'amount' => 2,
        ];
    }

    private function getWrongOrderAttributes(): array
    {
        return [
            'full_name' => '',
            'amount' => 0.4,
        ];
    }
}
