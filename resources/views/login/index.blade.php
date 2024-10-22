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
    <body class="bg-white font-poppins w-full h-full flex min-h-screen">
        <div class="bg-emerald-400 basis-1/2 flex justify-center items-center">
            <img src="/assets/dashboard-illustrasi/Asset 1.png" alt="Illustrasi" class="w-1/2 h-1/2">
        </div>
        <div class="basis-1/2 flex flex-col space-y-4 items-center justify-center">
            @if (session()->has('success'))
              <div class="bg-white w-full max-w-sm rounded-lg shadow-lg p-6">
                {{ session('success') }}
              </div>
            @endif
        
          <div class="w-full max-w-sm space-y-8">
            <div class="flex flex-col justify-center items-center space-y-3">
                <img class="h-32 w-32 border-4 border-emerald-400 rounded-full" src="/assets/dashboard-illustrasi/profil.jpg" alt="">
                <h2 class="text-4xl font-bold text-center text-gray-700 mb-6">WELCOME</h2>
            </div>
            <form action="/login" method="POST">
              @csrf
              <div class="mb-4">
                <input name="nik" type="text" id="nik" class="w-full py-2 border-b-2 border-emerald-400 focus:outline-none" placeholder="Nomor Induk Kependudukan" required>
                @error('nik')
                    <small class="text-red-400">{{ $message }}</small>
                @enderror
                    </div>
              <div class="mb-6">
                <input name="password" type="password" id="password" class="w-full py-2 border-b-2 border-emerald-400 focus:outline-none" placeholder="Password" required>
                @error('password')
                    <small class="text-red-400">{{ $message }}</small>
                @enderror
            </div>
            <input type="submit" class="w-full bg-emerald-400 hover:bg-emerald-500 text-white font-semibold py-2 px-4 rounded-lg" value="Login"></input>
            <div class="flex justify-end">
                <a href="/lupa_sandi" class="text-blue-500">Lupa kata sandi?</a>
            </div>
            </form>
          </div>
        </div>
    </body>
</html>