<?php

namespace App\Services\Models;

use App\Enums\OrderStatus;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Pagination\LengthAwarePaginator;

class OrderService
{
    /**
     * @return Order[]
     */
    public function getPaginate(int $perPage = 10): LengthAwarePaginator
    {
        return Order::query()
            ->paginate($perPage);
    }

    public function store(int $productId, array $attributes): Order
    {
        $amount = $attributes['amount'];

        /** @var Product $product */
        $product = Product::query()->findOrFail($productId);
        $totalPrice = $product->price * $amount;

        $order = new Order();
        $order->fill($attributes);
        $order->product_id = $productId;
        $order->total_price = $totalPrice;
        $order->status = OrderStatus::New;

        $order->save();
        return $order;
    }

    public function complete(Order $order): Order
    {
        $order->status = OrderStatus::Completed;
        $order->save();

        return $order;
    }
}
