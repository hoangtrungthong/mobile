<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Ticolo - Mobile') }}</title>

    <!-- Logo -->
    <link rel="shortcut icon" href="{{ asset('images/logo.png') }}" type="image/x-icon">

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script defer src="https://unpkg.com/alpinejs@3.2.4/dist/cdn.min.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">

    <script src="https://unpkg.com/swiper/swiper-bundle.js"></script>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <!-- Charts -->
    <script src="{{ asset('js/Chart.js') }}"></script>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script src="https://unpkg.com/flowbite@1.5.2/dist/datepicker.js"></script>
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-blueGray-50">
        <!-- Page Heading -->
        <div class="bg-blueGray-50 shadow flex">
            <div class="max-w-7xl">
                @include('layouts.navigation')
            </div>
            <!-- Page Content -->
            <main class="w-full">
                <div class="relative md:ml-64 bg-blueGray-50">
                    @include('layouts.navbar_admin')
                    <div class="pt-60">
                        {{ $slot }}
                    </div>
                </div>
            </main>
        </div>
    </div>
    <div class="px-4 md:ml-64 mx-auto -m-24 bg-blueGray-50">
        @include('layouts.footer')
    </div>
    @yield('js')
</body>
<script type='text/javascript'>
    window.translations = {!! $translations !!};
</script>

</html>
