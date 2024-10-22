@extends('layouts/layout')

@section('content')
<div class="p-10 bg-white rounded-lg">
<div class="flex items-center justify-center w-full">
  <div class="relative w-full max-w-lg">
    <input
      type="text"
      class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
      placeholder="Mau Cari Data Iuran Siapa?"/>
      <img src="/assets/dashboard-icon/IconSearch.png" alt="searchIcon" class="w-10 h-10 right-2 absolute top-0.5">
    <button
      class="absolute right-2 top-1/2 transform -translate-y-1/2 text-gray-500 hover:text-gray-700 focus:outline-none"
      type="submit">
    </button>
  </div>
</div>

<br>

<div class="flex justify-end">
<a href="/admin/pendataan_iuran" class="bg-emerald-400 border border-emerald-400 text-white font-bold py-2 px-4 rounded hover:bg-emerald-400 hover:text-white">
  Klik Untuk Menambah Data
</a>
</div>

<br>

<div class="overflow-x-auto">
  <table class="min-w-full w-full mx-auto bg-white border border-gray-200">
    <thead>
      <tr>
        <th class="px-4 py-2 border-b border-gray-200 bg-white text-center text-sm font-bold text-black">NIK</th>
        <th class="px-4 py-2 border-b border-gray-200 bg-white text-center text-sm font-bold text-black">Status Warga</th>
        <th class="px-4 py-2 border-b border-gray-200 bg-white text-center text-sm font-bold text-black">Tanggal Iuran</th>
        <th class="px-4 py-2 border-b border-gray-200 bg-white text-center text-sm font-bold text-black">Nominal Iuran</th>
        <th class="px-4 py-2 border-b border-gray-200 bg-white text-center text-sm font-bold text-black">Status Iuran</th>
      </tr>
    </thead>
    <tbody>
    <tr>
    <td class="px-4 py-2 text-center border-b border-gray-200">3201010101230001</td>
    <td class="px-4 py-2 bg-green-500 rounded-xl text-center text-white border-b border-gray-200">Aktif</td>
    <td class="px-4 py-2 text-center border-b border-gray-200">20-10-2024</td>
    <td class="px-4 py-2 text-center border-b border-gray-200">Rp1.000.000,00</td>
    <td class="px-4 py-2 bg-green-500 rounded-xl text-center text-white border-b border-gray-200">Lunas</td>
</tr>
<tr>
    <td class="px-4 py-2 text-center border-b border-gray-200">3201010101230002</td>
    <td class="px-4 py-2 bg-green-500 rounded-xl text-center text-white border-b border-gray-200">Aktif</td>
    <td class="px-4 py-2 text-center border-b border-gray-200">15-10-2024</td>
    <td class="px-4 py-2 text-center border-b border-gray-200">Rp1.000.000,00</td>
    <td class="px-4 py-2 bg-red-500 rounded-xl text-center text-white border-b border-gray-200">Belum Dibayar</td>
</tr>

    </tbody>
  </table>
</div>
</div>


@endsection