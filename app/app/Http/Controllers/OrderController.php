<?php

namespace App\Http\Controllers;

use App\Http\Requests\Order\OrderRequest;
use App\Models\Order;
use App\Models\Product;
use App\Services\Models\OrderService;

class OrderController extends Controller
{
    public function __construct(
        private OrderService $service
    ) {
        //
    }

    public function index()
    {
        return view('orders.index', ['orders' => $this->service->getPaginate()]);
    }

    public function create(Product $product)
    {
        return view('orders.create', ['product' => $product]);
    }

    public function store(int $product, OrderRequest $request)
    {
        $data = $request->validated();
        $order = $this->service->store($product, $data);

        return redirect(route('orders.show', $order));
    }

    public function show(Order $order)
    {
        return view('orders.show', ['order' => $order]);
    }

    public function complete(Order $order)
    {
        $this->service->complete($order);
        return view('orders.show', ['order' => $order]);
    }
}
