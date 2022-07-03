<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'TrungThong - Mobile') }}</title>

    <!-- Logo -->
    <link rel="shortcut icon" href="{{ asset('images/logo.png') }}" type="image/x-icon">

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Charts -->
    <script src="{{ asset('js/Chart.js') }}"></script>
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">
        <!-- Page Heading -->
        <div class="bg-gray-200 shadow flex gap-20">
            <div class="max-w-7xl">
                @include('layouts.navigation')
            </div>
            <!-- Page Content -->
            <main class="mr-20 w-full">
                {{ $slot }}
            </main>
        </div>
    </div>
    @yield('js')
</body>

</html>
