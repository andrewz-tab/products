@extends('layout')

@section('content')
    <h1 class="text-2xl font-bold text-gray-800 mb-6">Просмотр товара</h1>

    <div class="bg-white shadow rounded-lg overflow-hidden">
        <div class="p-6">
            <h2 class="text-xl font-semibold text-gray-800 mb-2">{{ $product->name }}</h2>

            <div class="mb-4">
                <span class="text-sm font-medium text-gray-600">Категория:</span>
                <span class="ml-2 text-gray-800">{{ $product->category->name ?? 'Без категории' }}</span>
            </div>

            <div class="mb-4">
                <span class="text-sm font-medium text-gray-600">Цена:</span>
                <span class="ml-2 text-gray-800">{{ $product->price }}</span>
            </div>

            <div class="mb-6">
                <span class="text-sm font-medium text-gray-600">Описание:</span>
                <p class="mt-1 text-gray-800">{{ $product->description }}</p>
            </div>

            <div class="flex space-x-3">
                <a href="{{ route('products.edit', $product->id) }}"
                   class="px-4 py-2 bg-yellow-500 text-white rounded hover:bg-yellow-600 transition">
                    Редактировать
                </a>
                <a href="{{ route('products.orders.create', $product->id) }}"
                   class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600 transition">
                    Сделать заказ
                </a>
                <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                            class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600 transition"
                            onclick="return confirm('Удалить товар?')">
                        Удалить
                    </button>
                </form>
                <a href="{{ route('products.index') }}"
                   class="px-4 py-2 bg-gray-300 text-gray-700 rounded hover:bg-gray-400 transition">
                    Назад к списку
                </a>
            </div>
        </div>
    </div>
@endsection
