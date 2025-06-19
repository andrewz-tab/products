<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet"/>

    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="container mx-auto px-4 py-8">
<div class="bg-white py-4 px-6 border-b">
    <div class="flex space-x-6">
        <a href="{{ route('products.index') }}" class="text-gray-600 hover:text-black">
            Товары
        </a>
        <a href="#" class="text-gray-600 hover:text-black">
            Заказы
        </a>
    </div>
</div>

<div class="container mx-auto px-4 py-8">
    @yield('content')
</div>

</body>
</html>
