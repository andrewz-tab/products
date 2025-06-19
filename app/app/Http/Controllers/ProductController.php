<?php

namespace App\Http\Controllers;

use App\Http\Requests\Product\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use App\Services\Models\ProductService;

class ProductController extends Controller
{
    public function __construct(
        private ProductService $service
    ) {
        //
    }

    public function index()
    {
        $list = $this->service->getPaginate();

        return view('products.index', ['products' => $list]);
    }

    public function create()
    {
        return view('products.create', ['categories' => Category::query()->get()]);
    }

    public function store(ProductRequest $request)
    {
        $data = $request->validated();

        $product = $this->service->store($data);

        return redirect(route('products.show', [
            'product' => $product,
        ]));
    }

    public function show(Product $product)
    {
        return view('products.show', ['product' => $product]);
    }

    public function edit(Product $product)
    {
        return view('products.edit', [
            'product' => $product,
            'categories' => Category::query()->get(),
        ]);
    }

    public function update(ProductRequest $request, Product $product)
    {
        $data = $request->validated();

        $product = $this->service->update($product, $data);

        return redirect(route('products.show', [
            'product' => $product,
        ]));
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return redirect(route('products.index'));
    }
}
