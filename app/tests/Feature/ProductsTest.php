<?php

use Tests\TestCase;

class ProductsTest extends TestCase
{
    private const DELETE_PRODUCT = 1000000001;
    private const UPDATE_PRODUCT = 1000000002;

    public function test_the_products_page_ok(): void
    {
        $response = $this->get('/products');

        $response->assertStatus(200);
    }

    public function test_the_product_page_ok(): void
    {
        $response = $this->get('/products/' . self::UPDATE_PRODUCT);

        $response->assertStatus(200);
    }

    public function test_the_product_store_ok(): void
    {
        $data = $this->getDefaultProductAttributes();

        $response = $this->post('/products', $data);

        $response->assertStatus(302);
        $this->assertDatabaseHas('products', $data);
    }

    public function test_the_product_store_has_invalid_fields(): void
    {
        $data = $this->getWrongProductAttributes();

        $response = $this->post('/products', $data);

        $response->assertStatus(302)
            ->assertSessionHasErrors(array_keys($data));
        $this->assertDatabaseMissing('products', $data);
    }

    public function test_the_product_delete_ok(): void
    {
        $data = ['id' => self::DELETE_PRODUCT];

        $this->assertDatabaseHas('products', $data);

        $response = $this->delete('/products/' . self::DELETE_PRODUCT);

        $response->assertStatus(302)
            ->assertRedirect('/products');
        $this->assertDatabaseMissing('products', $data);
    }

    public function test_the_product_update_ok(): void
    {
        $dataId = ['id' => self::UPDATE_PRODUCT];
        $data = $this->getDefaultProductAttributes();

        $this->assertDatabaseHas('products', $dataId);

        $response = $this->put('/products/' . self::UPDATE_PRODUCT, $data);

        $response->assertStatus(302)
            ->assertRedirect('/products/' . self::UPDATE_PRODUCT);
        $this->assertDatabaseHas('products', array_merge($dataId, $data));
    }

    private function getDefaultProductAttributes(): array
    {
        return [
            'category_id' => 1,
            'name' => 'test name',
            'price' => 100.02,
            'description' => 'test description',
        ];
    }

    private function getWrongProductAttributes(): array
    {
        return [
            'name' => '',
            'description' => '',
            'price' => -1,
        ];
    }
}
