<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ config('app.name', 'Pendataan Warga') }}</title>
        <link rel="icon" type="image/x-icon" href="/assets/Logo.png">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
        @vite('resources/css/app.css')
    </head>
    <body class="bg-gray-100 font-poppins w-full h-full flex flex-row min-h-screen overflow-hidden">
        <div class="h-screen">
            @if (request()->is('admin*'))
                @include('partials/sidebar_admin')
            @else
                @include('partials/sidebar_user')
            @endif
        </div>
        <div class="w-full">
            @include('partials/topbar')
            <div class="p-8">
                @yield('content')
            </div>
        </div>
    </body>
</html>
