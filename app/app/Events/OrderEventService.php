<?php

namespace App\Events;

use App\Models\Order;
use App\Models\Product;

class OrderEventService
{
    public function __construct(
        private Order $order
    ) {
        //
    }

    public function setFieldsFromProduct(): void
    {
        $product = Product::query()->findOrFail($this->order->product_id);

        $this->order->product_category = $product->category->name;
        $this->order->product_name = $product->name;
        $this->order->product_price = $product->price;

        $this->order->total_price = $product->price * $this->order->amount;
    }
}
