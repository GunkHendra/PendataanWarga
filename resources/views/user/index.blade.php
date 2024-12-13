@extends('layouts/layout')

@section('content')
<div class="p-10rounded-lg">
    <div class="grid grid-cols-2 grid-rows-4 gap-6">
        <!-- NIK -->
        <div class="border-b border-gray-200 col-span-2">
            <label for="nik" class="block text-gray-300">Nomor Induk Kependudukan</label>
            <span class="block w-full py-1 text-xl text-white">{{ $user->NIK }}</span>
        </div>

        <!-- Nama -->
        <div class="border-b border-gray-200 col-span-2">
            <label for="name" class="block text-gray-300">Nama Lengkap</label>
            <span class="block w-full py-1 text-xl text-white">{{ $user->nama_lengkap }}</span>
        </div>

        
        <!-- Status Menikah & Nomor Telepon -->
        <div class="border-b border-gray-200">
            <label for="status" class="block text-gray-300">Status (Menikah/Belum Menikah)</label>
            <span class="block w-full py-1 text-xl text-white">
                {{ $user->status_menikah ? 'Menikah' : 'Belum Menikah' }}
            </span>
        </div>
        

        <div class="border-b border-gray-200">
            <label for="phone" class="block text-gray-300">Nomor Telepon</label>
            <span class="block w-full py-1 text-xl text-white">{{ $user->nomor_telepon }}</span>
        </div>
        
        <!-- Pendidikan & Jenis Pekerjaan -->
        <div class="border-b border-gray-200">
            <label for="education" class="block text-white">Pendidikan</label>
            <span class="block w-full py-1 text-xl text-white">{{ $user->pendidikan }}</span>
        </div>

        <div class="border-b border-gray-200">
            <label for="work" class="block text-gray-300">Jenis Pekerjaan</label>
            <span class="block w-full py-1 text-xl text-white">{{ $user->jenis_pekerjaan }}</span>
        </div>
        
        <!-- Alamat -->
        <div class="border-b border-gray-200 col-span-2">
            <label for="address" class="block text-gray-300">Alamat Sesuai KTP</label>
            <span class="block w-full py-1 text-xl text-white">{{ $user->alamat }}</span>
        </div>
    </div>

    <!-- Riwayat Iuran Table -->
    <div class="overflow-x-auto space-y-2">
        <label for="tabel-iuran" class="block text-gray-300 mt-8">Data Iuran Tiga Bulan Terakhir</label>
        <table id="tabel-iuran" class="min-w-full w-full mx-auto bg-gray-700 border-none text-white rounded-lg">
            <thead>
                {{-- @if (!$payment->isEmpty()) --}}
                @if (!$payments->isEmpty())
                <tr>
                    <th class="p-4 text-center text-lg font-medium border-b border-gray-400">No</th>
                    <th class="p-4 text-center text-lg font-medium border-b border-gray-400">Nominal Iuran</th>
                    <th class="p-4 text-center text-lg font-medium border-b border-gray-400">Tanggal Iuran</th>
                    <th class="p-4 text-center text-lg font-medium border-b border-gray-400">Status Iuran</th>
                    {{-- <th class="p-4 text-center text-lg font-medium border-b border-gray-400">Status Warga</th> --}}
                </tr>
                @endif
            </thead>
            <tbody>
                {{-- @if ($payment->isEmpty()) --}}
                @if ($payments->isEmpty())
                <tr class="flex justify-center">
                    <td class="px-2 py-4">
                        Anda tidak memiliki iuran bulan ini.
                    </td>
                </tr>
                @else
                @php
                    $counter = 1;
                @endphp
                @foreach ($payments as $payment)
                    <tr>
                        <td class="px-4 py-3 text-center">{{ $counter }}</td>
                        {{-- <td class="px-4 py-3 text-center">{{ number_format((int)$payment[0]->nominal_iuran, 0, ',', '.') }}</td> --}}
                        <td class="px-4 py-3 text-center">{{ number_format((int)$payment->nominal_iuran, 0, ',', '.') }}</td>
                        {{-- <td class="px-4 py-3 text-center">{{ $payment[0]->tanggal_iuran }}</td> --}}
                        <td class="px-4 py-3 text-center">{{ $payment->tanggal_iuran }}</td>
                        <td class="px-4 py-3 text-center">
                            <div class="mt-2 mb-2">
                                {{-- @if ($payment[0]->status_iuran) --}}
                                @if ($payment->status_iuran)
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
                        {{-- @if ($payment[0]->user->status_warga) --}}
                        {{-- <td class="px-4 py-3 text-center">
                            @if ($payment->user->status_warga)
                            <span class="px-4 py-2 bg-green-500 text-white rounded">
                                Aktif
                            </span>
                            @else
                            <span class="px-4 py-2 bg-red-500 text-white rounded">
                                Tidak Aktif
                            </span>
                            @endif
                        </td> --}}
                    </tr>
                    @php
                        $counter++;
                    @endphp
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>
</div>

@endsection
