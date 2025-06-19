@extends('layout')

@section('content')
    <h1 class="text-2xl font-bold text-gray-800 mb-6">Сделать заказ</h1>

    <div class="bg-white shadow rounded-lg p-4 mb-4">
        <div class="mb-4">
            <span class="text-sm font-medium text-gray-600">Товар:</span>
            <span class="ml-2 text-gray-800">{{ $product->name }}</span>
        </div>

        <div class="mb-4">
            <span class="text-sm font-medium text-gray-600">Категория:</span>
            <span class="ml-2 text-gray-800">{{ $product->category->name }}</span>
        </div>

        <div class="mb-4">
            <span class="text-sm font-medium text-gray-600">Цена:</span>
            <span class="ml-2 text-gray-800">{{ $product->price }}</span>
        </div>
    </div>

    <form action="{{ route('products.orders.store', $product->id) }}" method="POST" class="bg-white shadow rounded-lg p-6">
        @csrf

        <div class="mb-4">
            <label for="full_name" class="block text-sm font-medium text-gray-700 mb-1">ФИО</label>
            <input type="text" id="full_name" name="full_name" value="{{ old('full_name') }}"
                   class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 {{ $errors->has('full_name') ? 'border-red-500' : 'border-gray-300' }}">
            @error('full_name')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="amount" class="block text-sm font-medium text-gray-700 mb-1">Количество</label>
            <input type="text" id="amount" name="amount" value="{{ old('amount') }}"
                   class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 {{ $errors->has('amount') ? 'border-red-500' : 'border-gray-300' }}">
            @error('amount')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="comment" class="block text-sm font-medium text-gray-700 mb-1">Комментарий</label>
            <textarea id="comment" name="comment" rows="3"
                      class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 {{ $errors->has('comment') ? 'border-red-500' : 'border-gray-300' }}"
            >{{ old('comment') }}</textarea>
            @error('comment')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex items-center space-x-4">
            <button type="submit" class="px-4 py-2 bg-green-500 text-white rounded hover:bg-green-600 transition">
                Оформить
            </button>
            <a href="{{ redirect()->back() }}" class="px-4 py-2 bg-gray-300 text-gray-700 rounded hover:bg-gray-400 transition">
                Отмена
            </a>
        </div>
    </form>

@endsection
