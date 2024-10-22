@extends('layouts/layout')

@section('content')
<div class="overflow-x-auto p-10 bg-white rounded-lg">
    <table class="table-auto w-full border border-gray-400">
        <thead class="bg-gray-100 text-black">
            <tr>
                <th class="px-4 py-4 text-center border-b border-gray-400">No</th>
                <th class="px-4 py-4 text-center border-b border-gray-400">Status Warga</th>
                <th class="px-4 py-2 text-center border-b border-gray-400">Tanggal Iuran</th>
                <th class="px-4 py-2 text-center border-b border-gray-400">Nominal Iuran</th>
                <th class="px-4 py-2 text-center border-b border-gray-400">Status Iuran</th>
            </tr>
        </thead>
        <tbody class="bg-white">
            <tr class="hover:bg-white">
                <td class="px-4 py-5 text-center border-b border-gray-400">1</td>
                <td class="px-4 py-5 text-center border-b border-gray-400"><span class="px-4 py-2 bg-green-500 text-white rounded">Aktif</span></td>
                <td class="px-4 py-5 text-center border-b border-gray-400">02-04-2024</td>
                <td class="px-4 py-5 text-center border-b border-gray-400">Rp1.000.000,00</td>
                <td class="px-4 py-5 text-center border-b border-gray-400">
                    <span class="px-4 py-2 bg-green-500 text-white rounded">Sudah Lunas</span>
                </td>
            </tr>
            <tr class="hover:bg-white">
                <td class="px-4 py-5 text-center border-b border-gray-400">2</td>
                <td class="px-4 py-5 text-center border-b border-gray-400"><span class="px-4 py-2 bg-green-500 text-white rounded">Aktif</span></td>
                <td class="px-4 py-5 text-center border-b border-gray-400">02-05-2024</td>
                <td class="px-4 py-5 text-center border-b border-gray-400">Rp1.000.000,00</td>
                <td class="px-4 py-5 text-center border-b border-gray-400">
                    <span class="px-4 py-2 bg-red-500 text-white rounded">Belum Dibayar</span>
                </td>
            </tr>
        </tbody>
    </table>
</div>
@endsection