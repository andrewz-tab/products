@extends('layout')

@section('content')
    <h1 class="text-2xl font-bold text-gray-800 mb-6">Просмотр заказа</h1>

    <div class="bg-white shadow rounded-lg overflow-hidden">
        <div class="p-6">
            <h2 class="text-xl font-semibold text-gray-800 mb-2">Заказ №{{ $order->id }}</h2>

            <div class="mb-4">
                <span class="text-sm font-medium text-gray-600">ФИО:</span>
                <span class="ml-2 text-gray-800">{{ $order->full_name }}</span>
            </div>

            <div class="mb-6">
                <span class="text-sm font-medium text-gray-600">Дата создания:</span>
                <span class="mt-1 text-gray-800">{{ $order->created_at->toDateString() }}</span>
            </div>

            <div class="mb-4">
                <span class="text-sm font-medium text-gray-600">Статус заказа:</span>
                <span class="ml-2 text-gray-800">{{ $order->status->getLabel() }}</span>
            </div>

            <div class="mb-4">
                <span class="text-sm font-medium text-gray-600">Итого: </span>
                <span class="ml-2 text-gray-800">{{ $order->total_price }}</span>
            </div>

            <div class="mb-4">
                <span class="text-sm font-medium text-gray-600">Комментарий:</span>
                <p class="ml-2 text-gray-800">{{ $order->comment }}</p>
            </div>

            <div class="flex space-x-3">
                @if($order->status != \App\Enums\OrderStatus::Completed)
                    <form action="{{ route('orders.complete', $order->id) }}" method="POST">
                        @csrf
                        <button type="submit"
                                class="px-4 py-2 bg-green-500 text-white rounded hover:bg-green-600 transition"
                               >
                            Завершить
                        </button>
                    </form>
                @endif
                <a href="{{ route('orders.index') }}"
                   class="px-4 py-2 bg-gray-300 text-gray-700 rounded hover:bg-gray-400 transition">
                    Назад к списку
                </a>
            </div>
        </div>
    </div>

    <div class="bg-white shadow rounded-lg p-4 mt-4">
        <div class="mb-4">
            <span class="text-sm font-medium text-gray-600">Товар:</span>
            <span class="ml-2 text-gray-800">{{ $order->product_name }}</span>
        </div>

        <div class="mb-4">
            <span class="text-sm font-medium text-gray-600">Категория:</span>
            <span class="ml-2 text-gray-800">{{ $order->product_category }}</span>
        </div>

        <div class="mb-4">
            <span class="text-sm font-medium text-gray-600">Цена:</span>
            <span class="ml-2 text-gray-800">{{ $order->product_price }}</span>
        </div>

        @if($order->product_id)
            <a href="{{ route('products.show', $order->product_id) }}"
               class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600 transition">
                Открыть продукт
            </a>
        @else
            <span class="text-xs text-gray-600">Товар отсутсует</span>
        @endif
    </div>
@endsection
