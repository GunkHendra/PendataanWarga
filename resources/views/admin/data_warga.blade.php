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
  <table class="min-w-full w-full mx-auto bg-white border border-gray-200">
    <thead class="bg-gray-100">
      <tr>
        <th class="px-4 py-2 border-b border-gray-200 text-left text-sm font-bold text-black">NIK</th>
        <th class="px-4 py-2 border-b border-gray-200 text-left text-sm font-bold text-black">Nama Lengkap</th>
        <th class="px-4 py-2 border-b border-gray-200 text-left text-sm font-bold text-black">Alamat</th>
        <th class="px-4 py-2 border-b border-gray-200 text-left text-sm font-bold text-black">Nomor Telp</th>
        <th class="px-4 py-2 border-b border-gray-200 text-left text-sm font-bold text-black">Status Warga</th>
      </tr>
    </thead>
    <tbody>
    <tr>
    <td class="px-4 py-2 text-left border-b border-gray-200">3201010101230001</td>
    <td class="px-4 py-2 text-left border-b border-gray-200">Budi Michael Santoso</td>
    <td class="px-4 py-2 text-left border-b border-gray-200">Jl. Sunset Road No. 20, Bali</td>
    <td class="px-4 py-2 text-left border-b border-gray-200">0813-9876-5432</td>
    <td class="px-4 py-2 bg-green-500 rounded-xl text-left text-white border-b border-gray-200">Aktif</td>
</tr>
<tr>
    <td class="px-4 py-2 text-left border-b border-gray-200">3201010101230002</td>
    <td class="px-4 py-2 text-left border-b border-gray-200">Kadek John Mahendra</td>
    <td class="px-4 py-2 text-left border-b border-gray-200">Jl. Pantai Kuta No. 45, Bali</td>
    <td class="px-4 py-2 text-left border-b border-gray-200">0812-3456-7890</td>
    <td class="px-4 py-2 bg-green-500 rounded-xl text-left text-white border-b border-gray-200">Aktif</td>
</tr>
<tr>
    <td class="px-4 py-2 text-left border-b border-gray-200">3201010101230003</td>
    <td class="px-4 py-2 text-left border-b border-gray-200">Ayu Jessica Pratami</td>
    <td class="px-4 py-2 text-left border-b border-gray-200">Jl. Sanur Raya No. 17, Bali</td>
    <td class="px-4 py-2 text-left border-b border-gray-200">0813-4567-8901</td>
    <td class="px-4 py-2 bg-red-500 rounded-xl text-left text-white border-b border-gray-200">Tidak Aktif</td>
</tr>
<tr>
    <td class="px-4 py-2 text-left border-b border-gray-200">3201010101230004</td>
    <td class="px-4 py-2 text-left border-b border-gray-200">Nyoman Emily Wulandari</td>
    <td class="px-4 py-2 text-left border-b border-gray-200">Jl. Petitenget No. 88, Bali</td>
    <td class="px-4 py-2 text-left border-b border-gray-200">0821-5678-1234</td>
    <td class="px-4 py-2 bg-green-500 rounded-xl text-left text-white border-b border-gray-200">Aktif</td>
</tr>
<tr>
    <td class="px-4 py-2 text-left border-b border-gray-200">3201010101230005</td>
    <td class="px-4 py-2 text-left border-b border-gray-200">Gede David Surya</td>
    <td class="px-4 py-2 text-left border-b border-gray-200">Jl. Uluwatu No. 12, Bali</td>
    <td class="px-4 py-2 text-left border-b border-gray-200">0812-1234-5678</td>
    <td class="px-4 py-2 bg-green-500 rounded-xl text-left text-white border-b border-gray-200">Aktif</td>
</tr>
<tr>
    <td class="px-4 py-2 text-left border-b border-gray-200">3201010101230006</td>
    <td class="px-4 py-2 text-left border-b border-gray-200">Made Sarah Johnson</td>
    <td class="px-4 py-2 text-left border-b border-gray-200">Jl. Dewi Sri No. 8, Bali</td>
    <td class="px-4 py-2 text-left border-b border-gray-200">0813-2345-6789</td>
    <td class="px-4 py-2 bg-red-500 rounded-xl text-left text-white border-b border-gray-200">Tidak Aktif</td>
</tr>
<tr>
    <td class="px-4 py-2 text-left border-b border-gray-200">3201010101230007</td>
    <td class="px-4 py-2 text-left border-b border-gray-200">Ketut Jennifer Smith</td>
    <td class="px-4 py-2 text-left border-b border-gray-200">Jl. Raya Legian No. 5, Bali</td>
    <td class="px-4 py-2 text-left border-b border-gray-200">0819-8765-4321</td>
    <td class="px-4 py-2 bg-green-500 rounded-xl text-left text-white border-b border-gray-200">Aktif</td>
</tr>
<tr>
    <td class="px-4 py-2 text-left border-b border-gray-200">3201010101230008</td>
    <td class="px-4 py-2 text-left border-b border-gray-200">Wayan Michael Brown</td>
    <td class="px-4 py-2 text-left border-b border-gray-200">Jl. Tanjung Benoa No. 3, Bali</td>
    <td class="px-4 py-2 text-left border-b border-gray-200">0821-9876-5432</td>
    <td class="px-4 py-2 bg-green-500 rounded-xl text-left text-white border-b border-gray-200">Aktif</td>
</tr>
<tr>
    <td class="px-4 py-2 text-left border-b border-gray-200">3201010101230009</td>
    <td class="px-4 py-2 text-left border-b border-gray-200">Putu Rachel Davis</td>
    <td class="px-4 py-2 text-left border-b border-gray-200">Jl. Seminyak No. 4, Bali</td>
    <td class="px-4 py-2 text-left border-b border-gray-200">0813-5432-1987</td>
    <td class="px-4 py-2 bg-red-500 rounded-xl text-left text-white border-b border-gray-200">Tidak Aktif</td>
</tr>
<tr>
    <td class="px-4 py-2 text-left border-b border-gray-200">3201010101230010</td>
    <td class="px-4 py-2 text-left border-b border-gray-200">Gita Ethan Lee</td>
    <td class="px-4 py-2 text-left border-b border-gray-200">Jl. Nusa Dua No. 10, Bali</td>
    <td class="px-4 py-2 text-left border-b border-gray-200">0812-6789-0123</td>
    <td class="px-4 py-2 bg-green-500 rounded-xl text-left text-white border-b border-gray-200">Aktif</td>
</tr>
<tr>
    <td class="px-4 py-2 text-left border-b border-gray-200">3201010101230011</td>
    <td class="px-4 py-2 text-left border-b border-gray-200">Kadek Ava Wilson</td>
    <td class="px-4 py-2 text-left border-b border-gray-200">Jl. Canggu No. 30, Bali</td>
    <td class="px-4 py-2 text-left border-b border-gray-200">0821-3456-7890</td>
    <td class="px-4 py-2 bg-red-500 rounded-xl text-left text-white border-b border-gray-200">Tidak Aktif</td>
</tr>
<tr>
    <td class="px-4 py-2 text-left border-b border-gray-200">3201010101230012</td>
    <td class="px-4 py-2 text-left border-b border-gray-200">Dewa Lily Martin</td>
    <td class="px-4 py-2 text-left border-b border-gray-200">Jl. Jembrana No. 15, Bali</td>
    <td class="px-4 py-2 text-left border-b border-gray-200">0813-4321-0987</td>
    <td class="px-4 py-2 bg-green-500 rounded-xl text-left text-white border-b border-gray-200">Aktif</td>
</tr>
    </tbody>
  </table>
</div>
</div>




@endsection