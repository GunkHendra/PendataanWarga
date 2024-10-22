@extends('layouts/layout')

@section('content')
<div class="p-10 bg-white rounded-lg">
    <div class="grid grid-cols-2 gap-6">
        <!-- NIK -->
        <div>
            <label for="nik" class="block text-gray-700">Nomor Induk Kependudukan</label>
            <span class="block w-full p-2 border border-gray-300 rounded bg-gray-200">3201010101230001</span>
        </div>

        <!-- Nama -->
        <div>
            <label for="name" class="block text-gray-700">Nama Lengkap</label>
            <span class="block w-full p-2 border border-gray-300 rounded bg-gray-200">Budi Michael Santoso</span>
        </div>

        <!-- Alamat -->
        <div class="col-span-2">
            <label for="address" class="block text-gray-700">Alamat Sesuai KTP</label>
            <span class="block w-full p-2 border border-gray-300 rounded bg-gray-200">Jl. Sunset Road No. 20, Bali</span>
        </div>

        <!-- Status Menikah & Nomor Telepon -->
        <div>
            <label for="status" class="block text-gray-700">Status (Menikah/Belum Menikah)</label>
            <span class="block w-full p-2 border border-gray-300 rounded bg-gray-200">Belum Menikah</span>
        </div>

        <div>
            <label for="phone" class="block text-gray-700">Nomor Telepon</label>
            <span class="block w-full p-2 border border-gray-300 rounded bg-gray-200">081398765432</span>
        </div>

        <!-- Pendidikan & Jenis Pekerjaan -->
        <div>
            <label for="education" class="block text-gray-700">Pendidikan</label>
            <span class="block w-full p-2 border border-gray-300 rounded bg-gray-200">Sarjana</span>
        </div>

        <div>
            <label for="work" class="block text-gray-700">Jenis Pekerjaan</label>
            <span class="block w-full p-2 border border-gray-300 rounded bg-gray-200">Bos Muda</span>
        </div>
    </div>

    <!-- Riwayat Iuran Table -->
    <div class="overflow-x-auto">
    <table class="table-auto w-full border border-collapse border-gray-400 mt-10 bg-white">
        <thead class="bg-gray-100">
            <tr>
                <th class="px-4 py-4 text-center border-b border-gray-400">No</th>
                <th class="px-4 py-2 text-center border-b border-gray-400">Nominal Iuran</th>
                <th class="px-4 py-4 text-center border-b border-gray-400">Status Warga</th>
                <th class="px-4 py-2 text-center border-b border-gray-400">Tanggal Iuran</th>
                <th class="px-4 py-2 text-center border-b border-gray-400">Status Iuran</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="px-4 py-2 text-center border-b border-gray-400">1</td>
                <td class="px-4 py-2 text-center border-b border-gray-400">Rp1.000.000,00</td>
                <td class="px-4 py-2 text-center border-b border-gray-400"><span class="px-4 py-2 bg-green-500 text-white rounded">Aktif</span></td>
                <td class="px-4 py-2 text-center border-b border-gray-400">02-04-2024</td>
                <td class="px-4 py-2 text-center border-b border-gray-400">
                <div class="mt-2 mb-2">
                    <span class="px-4 py-2 bg-green-500 text-white rounded">Sudah Lunas</span>
                    </div>
                </td>
            </tr>
        </tbody>
        <tbody>
            <tr>
                <td class="px-4 py-2 text-center border-b border-gray-400">2</td>
                <td class="px-4 py-2 text-center border-b border-gray-400">Rp1.000.000,00</td>
                <td class="px-4 py-2 text-center border-b border-gray-400"><span class="px-4 py-2 bg-green-500 text-white rounded">Aktif</span></td>
                <td class="px-4 py-2 text-center border-b border-gray-400">02-05-2024</td>
                <td class="px-4 py-2 text-center border-b border-gray-400">
                <div class="mt-2 mb-2">
                    <span class="px-4 py-2 bg-red-500 text-white rounded">Belum Dibayar</span>
                </div>
                </td>
            </tr>
        </tbody>
    </table>
</div>

@endsection