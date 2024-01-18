<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{$title}} - Balen</title>

        <link rel="shortcut icon" href="{{asset('img/logo_without_text.png')}}" type="image/x-icon">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="text-gray-100 antialiased" style="background: url('{{asset('img/background.png')}}') no-repeat fixed center">
        <div class="min-h-screen flex flex-col justify-center items-center sm:pt-0 px-10 md:px-20 py-10 md:py-20">
            <div class="w-full px-6 py-4 bg-white/25 shadow-md overflow-hidden rounded-[45px]">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
