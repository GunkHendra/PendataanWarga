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
    <body class="bg-gray-900 flex items-center justify-center min-h-screen">
      <div class="w-full max-w-md bg-gray-800 shadow-lg rounded-lg p-8 space-y-4">
        <div class="flex flex-col justify-center items-center space-y-3">
          <img class="h-32 w-32 border-4 border-gray-900 rounded-full" src="/assets/dashboard-illustrasi/profil.jpg" alt="">
          <h2 class="text-2xl font-bold text-gray-100 text-center mb-6">Welcome!</h2>
        </div>
        <form action="/login" method="POST" class="space-y-6">
          @csrf
          <div>
            <label for="NIK" class="block text-sm font-medium text-gray-300">Nomor Induk Kependudukan (NIK)</label>
            <input 
              type="text" 
              id="NIK" 
              name="NIK" 
              required 
              class="mt-1 w-full px-4 py-2 border rounded-lg focus:ring-blue-500 focus:border-blue-500 border-gray-600 bg-gray-700 text-gray-200"
              placeholder="Ex. 517123456">
              @error('NIK')
                <small class="text-red-400">{{ $message }}</small>
              @enderror
          </div>
          <div>
            <label for="password" class="block text-sm font-medium text-gray-300">Kata Sandi</label>
            <input 
              type="password" 
              id="password" 
              name="password" 
              required 
              class="mt-1 w-full px-4 py-2 border rounded-lg focus:ring-blue-500 focus:border-blue-500 border-gray-600 bg-gray-700 text-gray-200"
              placeholder="••••••••">
              @error('password')
                <small class="text-red-400">{{ $message }}</small>
              @enderror
          </div>
          <button 
            type="submit" 
            class="w-full py-2 px-4 bg-blue-600 text-white rounded-lg shadow hover:bg-blue-700 focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
            Masuk
          </button>
        </form>
        </p>
      </div>
    </body>
    {{-- <body class="bg-zinc-800 font-poppins w-full h-full flex justify-center items-center align-middle min-h-screen">
        <div class="bg-zinc-700 flex flex-col space-y-4 items-center justify-center">
            @if (session()->has('success'))
              <div class="bg-white w-full max-w-sm rounded-lg shadow-lg p-6">
                {{ session('success') }}
              </div>
            @endif

          <div class="w-full max-w-sm space-y-8">
            <div class="flex flex-col justify-center items-center space-y-3">
                <img class="h-32 w-32 border-4 border-green-400 rounded-full" src="/assets/dashboard-illustrasi/profil.jpg" alt="">
                <h2 class="text-4xl font-bold text-center text-gray-700 mb-6">WELCOME</h2>
            </div>
            <form action="/login" method="POST">
              @csrf
              <div class="mb-4">
                <input name="NIK" type="text" id="nik" class="w-full py-2 border-b-2 border-emerald-400 focus:outline-none" placeholder="Nomor Induk Kependudukan" required>
                @error('NIK')
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
            </form>
          </div>
        </div>
    </body> --}}
</html>
