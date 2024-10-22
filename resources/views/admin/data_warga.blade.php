@extends('layouts/layout')

@section('content')
<div class="p-10 bg-white rounded-lg">
<div class="flex items-center justify-center w-full">
  <div class="relative w-full max-w-lg">
    <input
      type="text"
      class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
      placeholder="Mau Cari Data Siapa?"/>
      <img src="/assets/dashboard-icon/IconSearch.png" alt="searchIcon" class="w-10 h-10 right-2 absolute top-0.5">
    <button
      class="absolute right-2 top-1/2 transform -translate-y-1/2 text-gray-500 hover:text-gray-700 focus:outline-none"
      type="submit">
    </button>
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
    <tr>
    <td class="px-4 py-5 text-center border-b border-gray-400">3201010101230001</td>
    <td class="px-4 py-5 text-center border-b border-gray-400">Budi Michael Santoso</td>
    <td class="px-4 py-5 text-center border-b border-gray-400">Jl. Sunset Road No. 20, Bali</td>
    <td class="px-4 py-5 text-center border-b border-gray-400">081398765432</td>
    <td class="px-4 py-5 text-center text-white border-b border-gray-400">
      <span class="px-4 py-2 bg-green-500 text-white rounded">Aktif</span></td>
</tr>
<tr>
    <td class="px-4 py-5 text-center border-b border-gray-400">3201010101230002</td>
    <td class="px-4 py-5 text-center border-b border-gray-400">Kadek John Mahendra</td>
    <td class="px-4 py-5 text-center border-b border-gray-400">Jl. Pantai Kuta No. 45, Bali</td>
    <td class="px-4 py-5 text-center border-b border-gray-400">081234567890</td>
    <td class="px-4 py-5 text-center text-white border-b border-gray-400">
      <span class="px-4 py-2 bg-green-500 text-white rounded">Aktif</span></td>
</tr>
<tr>
    <td class="px-4 py-5 text-center border-b border-gray-400">3201010101230003</td>
    <td class="px-4 py-5 text-center border-b border-gray-400">Ayu Jessica Pratami</td>
    <td class="px-4 py-5 text-center border-b border-gray-400">Jl. Sanur Raya No. 17, Bali</td>
    <td class="px-4 py-5 text-center border-b border-gray-400">081345678901</td>
    <td class="px-4 py-5 text-center text-white border-b border-gray-400">
      <span class="px-4 py-2 bg-red-500 text-white rounded">Tidak Aktif</span></td>
</tr>

    </tbody>
  </table>
</div>
</div>




@endsection