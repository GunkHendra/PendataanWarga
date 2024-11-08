@extends('layouts/layout')

@section('content')
<div class="p-10 bg-white rounded-lg">
    <div class="grid grid-cols-2 gap-6">
        <!-- NIK -->
        <div>
            <label for="nik" class="block text-gray-700">Nomor Induk Kependudukan</label>
            <span class="block w-full p-2 border border-gray-300 rounded bg-gray-200">{{ $user->NIK }}</span>
        </div>

        <!-- Nama -->
        <div>
            <label for="name" class="block text-gray-700">Nama Lengkap</label>
            <span class="block w-full p-2 border border-gray-300 rounded bg-gray-200">{{ $user->nama_lengkap }}</span>
        </div>

        <!-- Alamat -->
        <div class="col-span-2">
            <label for="address" class="block text-gray-700">Alamat Sesuai KTP</label>
            <span class="block w-full p-2 border border-gray-300 rounded bg-gray-200">{{ $user->alamat }}</span>
        </div>

        <!-- Status Menikah & Nomor Telepon -->
        <div>
            <label for="status" class="block text-gray-700">Status (Menikah/Belum Menikah)</label>
            <span class="block w-full p-2 border border-gray-300 rounded bg-gray-200">
                {{ $user->status_menikah ? 'Menikah' : 'Belum Menikah' }}
            </span>
        </div>


        <div>
            <label for="phone" class="block text-gray-700">Nomor Telepon</label>
            <span class="block w-full p-2 border border-gray-300 rounded bg-gray-200">{{ $user->nomor_telepon }}</span>
        </div>

        <!-- Pendidikan & Jenis Pekerjaan -->
        <div>
            <label for="education" class="block text-gray-700">Pendidikan</label>
            <span class="block w-full p-2 border border-gray-300 rounded bg-gray-200">{{ $user->pendidikan }}</span>
        </div>

        <div>
            <label for="work" class="block text-gray-700">Jenis Pekerjaan</label>
            <span class="block w-full p-2 border border-gray-300 rounded bg-gray-200">{{ $user->jenis_pekerjaan }}</span>
        </div>
    </div>

    <!-- Riwayat Iuran Table -->
    <div class="overflow-x-auto">
        <table class="table-auto w-full border border-collapse border-gray-400 mt-10 bg-white">
            <thead class="bg-gray-100">
                @if (!$payment->isEmpty())
                <tr>
                    <th class="px-4 py-4 text-center border-b border-gray-400">No</th>
                    <th class="px-4 py-2 text-center border-b border-gray-400">Nominal Iuran</th>
                    <th class="px-4 py-4 text-center border-b border-gray-400">Status Warga</th>
                    <th class="px-4 py-2 text-center border-b border-gray-400">Tanggal Iuran</th>
                    <th class="px-4 py-2 text-center border-b border-gray-400">Status Iuran</th>
                </tr>
                @endif
            </thead>
            <tbody>
                @if ($payment->first() === null)
                <tr class="flex justify-center">
                    <td class="px-2 py-4">
                        Anda masih belum memiliki data iuran.
                    </td>
                </tr>
                @else
                <tr>
                    <td class="px-4 py-2 text-center border-b border-gray-400">1</td>
                    <td class="px-4 py-2 text-center border-b border-gray-400">{{ $payment[0]->nominal_iuran }}</td>
                    {{-- {{ dd($payment) }} --}}
                    <td class="px-4 py-2 text-center border-b border-gray-400">
                        @if ($payment[0]->user->status_warga)
                        <span class="px-4 py-2 bg-green-500 text-white rounded">
                            Aktif
                        </span>
                        @else
                        <span class="px-4 py-2 bg-red-500 text-white rounded">
                            Tidak Aktif
                        </span>
                        @endif
                    </td>
                    <td class="px-4 py-2 text-center border-b border-gray-400">{{ $payment[0]->tanggal_iuran }}</td>
                    <td class="px-4 py-2 text-center border-b border-gray-400">
                    <div class="mt-2 mb-2">
                        @if ($payment[0]->status_iuran)
                        <span class="px-4 py-2 bg-green-500 text-white rounded">
                            Lunas
                        </span>
                        @else
                        <span class="px-4 py-2 bg-red-500 text-white rounded">
                            Belum Lunas
                        </span>
                        @endif
                    </div>
                    </td>
                </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>

@endsection
