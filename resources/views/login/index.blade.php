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
    <body class="bg-gray-100 font-poppins w-full h-full flex flex-row min-h-screen">
        <div class="min-h-[80vh] flex flex-col space-y-4 items-center justify-center">
            @if (session()->has('success'))
              <div class="bg-white w-full max-w-sm rounded-lg shadow-lg p-6">
                {{ session('success') }}
              </div>
            @endif
        
          <div class="bg-white w-full max-w-sm rounded-lg shadow-lg p-6">
            <h2 class="text-2xl font-bold text-center text-gray-700 mb-6">Login</h2>
            <form action="/login" method="POST">
              @csrf
              <div class="mb-6">
                <label for="email" class="text-sm font-medium text-gray-700">Email</label>
                <input name="email" type="email" id="email" class="w-full px-4 py-2 border border-gray-300 rounded-lg" placeholder="Enter your email" value="{{ old('email') }}" autofocus required>
                @error('email')
                    <small class="text-red-400">{{ $message }}</small>
                @enderror
                    </div>
              <div class="mb-6">
                <label for="password" class="text-sm font-medium text-gray-700">Password</label>
                <input name="password" type="password" id="password" class="w-full px-4 py-2 border border-gray-300 rounded-lg" placeholder="Enter your password" required>
                @error('password')
                    <small class="text-red-400">{{ $message }}</small>
                @enderror
              </div>
              <input type="submit" class="w-full bg-slate-500 hover:bg-slate-600 text-white font-semibold py-2 px-4 rounded-lg" value="Login"></input>
            </form>
            <small>Not registered? <a href="/register" class="text-blue-500">Let's register!</a></small>
          </div>
        </div>
    </body>
</html>