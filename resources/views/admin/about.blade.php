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
    <body class="bg-gray-900 flex flex-col items-center justify-center min-h-screen px-6">
        <div class="w-full flex justify-start">
            @if ($user->is_admin === 1)
                <a href="/admin" class="bg-blue-600 text-white font-bold flex py-2 px-4 rounded hover:bg-blue-800 transition duration-300">Back</a>
            @else
                <a href="/user" class="bg-blue-600 text-white font-bold flex py-2 px-4 rounded hover:bg-blue-800 transition duration-300">Back</a>
            @endif
        </div>
        <div class="max-w-7xl mx-auto text-center flex flex-col items-center">
            <img src="{{ asset('/assets/logo.png') }}" alt="Logo" class="mb-3 h-1/3 w-1/3">
            <h2 class="text-3xl font-extrabold text-white sm:text-4xl">Tentang PendataanWarga</h2>
            <p class="mt-4 max-w-2xl text-lg text-white mx-auto">
                Selamat datang di Website Pendataan Warga, sebuah solusi modern untuk mengelola data kependudukan secara efisien dan akurat. Website kami dirancang khusus untuk membantu pemerintah atau komunitas dalam mencatat dan memonitor data warga pendatang serta data iuran dari warga pendatang itu sendiri.
            </p>
        </div>

        <div class="mt-12 grid gap-8 lg:grid-cols-2 w-full text-white">
            <div class="bg-gradient-to-r from-blue-800 to-blue-400 p-8 shadow-lg rounded-xl flex space-x-8 items-center">
                <img src="{{ asset('/assets/gunghen.png') }}" alt="Logo" class="w-36 h-36 mb-3 object-cover rounded-xl">
                <div>
                    <h3 class="text-3xl">Our Leader</h3>
                    <p class="text-3xl font-bold">
                        Anak Agung Made Krishna Mahendrayana
                        <br>
                        2305551018
                    </p>
                </div>
            </div>

            <div class="bg-gradient-to-r from-blue-800 to-blue-400 rounded-lg p-8 shadow-lg flex space-x-8 items-center">
                <img src="{{ asset('/assets/dektu.png') }}" alt="Logo" class="w-36 h-36 mb-3 object-cover rounded-xl">
                <div>
                    <h3 class="text-3xl">Our Member</h3>
                    <p class="text-3xl font-bold">
                        I Putu Arya Putra Raditya
                        <br>
                        2305551042
                    </p>
                </div>
            </div>

            <div class="bg-gradient-to-r from-blue-800 to-blue-400 rounded-lg p-8 shadow-lg flex space-x-8 items-center">
                <img src="{{ asset('/assets/guswin.png') }}" alt="Logo" class="w-36 h-36 mb-3 object-cover rounded-xl">
                <div>
                    <h3 class="text-3xl">Our Member</h3>
                    <p class="text-3xl font-bold">
                        Bagus Jagra Wicaksana
                        <br>
                        2305551005
                    </p>
                </div>
            </div>

            <div class="bg-gradient-to-r from-blue-800 to-blue-400 rounded-lg p-8 shadow-lg flex space-x-8 items-center">
                <img src="{{ asset('/assets/nolan.png') }}" alt="Logo" class="w-36 h-36 mb-3 object-cover rounded-xl">
                <div>
                    <h3 class="text-3xl">Our Member</h3>
                    <p class="text-3xl font-bold">
                        Nolan Mahotama Abipantara Urya Gotama
                        <br>
                        23055551111
                    </p>
                </div>
            </div>
        </div>
    </body>
</html>