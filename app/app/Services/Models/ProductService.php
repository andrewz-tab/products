<?php

namespace App\Services\Models;

use App\Models\Product;
use Illuminate\Pagination\LengthAwarePaginator;

class ProductService
{
    /**
     * @return Product[]
     */
    public function getPaginate(int $perPage = 10): LengthAwarePaginator
    {
        return Product::query()
            ->paginate($perPage);
    }

    public function getById(int $id): Product
    {
        /** @var Product $product */
        $product = Product::query()->find($id);

        return $product;
    }

    public function store(array $attributes): Product
    {
        $product = new Product;
        $product->fill($attributes);
        $product->save();

        return $product;
    }

    public function update(Product $product, array $attributes): Product
    {
        $product->fill($attributes);
        $product->save();

        return $product;
    }
}
