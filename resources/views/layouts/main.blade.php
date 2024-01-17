<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title}} - Balen</title>

    <link rel="shortcut icon" href="{{asset('img/logo_without_text.png')}}" type="image/x-icon">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased">
<x-navbar/>

<div class="px-16 md:px-32 pb-32">
    @yield('content')
</div>
</body>
</html>
