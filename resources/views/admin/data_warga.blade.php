@extends('layouts/layout')

@section('content')
<div class="p-10 bg-white rounded-lg">
  <div class="flex items-center justify-center w-full">
    <div class="w-full max-w-lg">
      <form action="/admin/data_warga" method="GET" class="flex items-center justify-between gap-2">
        <input
          type="text"
          class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
          placeholder="Mau Cari Data Siapa?" name="search"/>
          <img src="/assets/dashboard-icon/IconSearch.png" alt="searchIcon" class="w-10 h-10 border border-gray-300 rounded-lg">
        <button
          class="absolute right-2 top-1/2 transform -translate-y-1/2 text-gray-500 hover:text-gray-700 focus:outline-none"
          type="submit">
        </button>
      </form>
    </div>
  </div>
  
  <br>

  <div class="flex justify-end">
  <a href="/admin/pendataan_warga" class="bg-emerald-400 border border-emerald-400 text-white font-bold py-2 px-4 rounded hover:bg-emerald-400 hover:text-white">
    Klik Untuk Menambah Data
  </a>
  </div>

  <br>

  <div class="overflow-x-auto">
    <table class="min-w-full w-full mx-auto bg-white border border-collapse border-gray-400">
      <thead class="bg-gray-100">
        <tr>
          <th class="px-4 py-2 border-b border-gray-400 text-center text-sm font-bold text-black">NIK</th>
          <th class="px-4 py-2 border-b border-gray-400 text-center text-sm font-bold text-black">Nama Lengkap</th>
          <th class="px-4 py-2 border-b border-gray-400 text-center text-sm font-bold text-black">Alamat</th>
          <th class="px-4 py-2 border-b border-gray-400 text-center text-sm font-bold text-black">Nomor Telp</th>
          <th class="px-4 py-2 border-b border-gray-400 text-center text-sm font-bold text-black">Status Warga</th>
        </tr>
      </thead>
      <tbody>
      @foreach ($users as $user)  
      <tr>
        <td class="px-4 py-5 text-center border-b border-gray-400">{{ $user->NIK }}</td>
        <td class="px-4 py-5 text-center border-b border-gray-400">{{ $user->nama_lengkap }}</td>
        <td class="px-4 py-5 text-center border-b border-gray-400">{{ $user->alamat }}</td>
        <td class="px-4 py-5 text-center border-b border-gray-400">{{ $user->nomor_telepon }}</td>
        <td class="px-4 py-5 text-center text-white border-b border-gray-400">
          @if ($user->status_warga)
          <span class="px-4 py-2 bg-green-500 text-white rounded">
            Aktif
          </span>
          @else
          <span class="px-4 py-2 bg-red-500 text-white rounded">
            Tidak Aktif
          </span>
          @endif
        </td>
      </tr>
      @endforeach

      </tbody>
    </table>

    <div class="mt-4">
      {{ $users->links('pagination::tailwind') }}
    </div>

  </div>
</div>
@endsection