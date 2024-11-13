@extends('layouts/layout')

@section('content')
<div class="flex flex-col gap-4 h-[87vh]">
    <div class="grid grid-cols-3 grid-rows-2 gap-4 basis-3/5">
        {{-- Total Warga Pendatang --}}
        <div class="relative bg-emerald-400 rounded-lg shadow-lg flex flex-col text-center items-center space-y-4 p-6">
            <div class="absolute top-0 right-0 bg-emerald-600 text-white p-2 rounded-bl-lg">
                Keseluruhan
            </div>
            <div class="w-24 h-24 rounded-full overflow-hidden">
                <img src="/assets/dashboard-icon/person.png" alt="Profile Picture" class="w-full h-full object-cover">
            </div>
            <div>
                <h2 class="text-3xl font-bold text-white">{{ $total_warga }}</h2>
                <h2 class="text-xl font-bold text-black">Total Data Warga Pendatang</h2>
            </div>
        </div>

        {{-- Total Jumlah Pelunasan Iuran --}}
        <div class="relative bg-emerald-400 rounded-lg shadow-lg flex flex-col text-center items-center space-y-4 p-6">
            <div class="absolute top-0 right-0 bg-emerald-800 text-white p-2 rounded-bl-lg">
                {{ $month }}
            </div>
            <div class="w-20 h-20 overflow-hidden">
                <img src="/assets/dashboard-icon/notepad-dashboard.png" alt="Profile Picture" class="w-full h-full object-cover">
            </div>
            <div>
                <h2 class="text-3xl font-bold text-white">+ Rp. {{ number_format((int)$total_payment, 0, ',', '.') }}</h2>
                <h2 class="text-xl font-bold text-black">Total Jumlah Pelunasan Iuran</h2>
            </div>
        </div>

        {{-- Total Warga yang Sudah Lunas --}}
        <div class="relative bg-emerald-400 rounded-lg shadow-lg flex flex-col text-center items-center space-y-4 p-6">
            <div class="absolute top-0 right-0 bg-emerald-800 text-white p-2 rounded-bl-lg">
                {{ $month }}
            </div>
            <div class="w-24 h-24 overflow-hidden col-start-2">
                <img src="/assets/dashboard-icon/money-dashboard.png" alt="Profile Picture" class="w-full h-full object-cover">
            </div>
            <div>
                <h2 class="text-3xl font-bold text-white">{{ $total_warga_lunas }}</h2>
                <h2 class="text-xl font-bold text-black">Total Warga yang Sudah Lunas </h2>
            </div>
        </div>

        {{-- Total Penambahan Pendatang Bulan ini --}}
        <div class="relative bg-emerald-400 rounded-lg shadow-lg flex flex-col text-center items-center space-y-4 p-6">
            <div class="absolute top-0 right-0 bg-emerald-800 text-white p-2 rounded-bl-lg">
                {{ $month }}
            </div>
            <div class="w-24 h-24 overflow-hidden">
                <img src="/assets/dashboard-icon/person-plus.png" alt="Profile Picture" class="w-full h-full">
            </div>
            <div>
                <h2 class="text-3xl font-bold text-white">+{{ $total_warga_datang }}</h2>
                <h2 class="text-xl font-bold text-black">Total Data Warga Pendatang</h2>
            </div>
        </div>

        {{-- Total Iuran Belum Lunas --}}
        <div class="relative bg-emerald-400 rounded-lg shadow-lg flex flex-col text-center items-center space-y-4 p-6">
            <div class="absolute top-0 right-0 bg-emerald-800 text-white p-2 rounded-bl-lg">
                {{ $month }}
            </div>
            <div class="w-24 h-24 overflow-hidden">
                <img src="/assets/dashboard-icon/money-wings.png" alt="Profile Picture" class="w-full h-full">
            </div>
            <div>
                <h2 class="text-3xl font-bold text-white">- Rp. {{ number_format((int)$total_payment_belum, 0, ',', '.') }}</h2>
                <h2 class="text-xl font-bold text-black">Total Iuran Belum Lunas</h2>
            </div>
        </div>

        {{-- Total Warga Belum Lunas --}}
        <div class="relative bg-emerald-400 rounded-lg shadow-lg flex flex-col text-center items-center space-y-4 p-6">
            <div class="absolute top-0 right-0 bg-emerald-800 text-white p-2 rounded-bl-lg">
                {{ $month }}
            </div>
            <div class="w-24 h-24 overflow-hidden">
                <img src="/assets/dashboard-icon/unpaid.png" alt="Profile Picture" class="w-full h-full object-cover">
            </div>
            <div>
                <h2 class="text-3xl font-bold text-white">{{ $total_warga_belum }}</h2>
                <h2 class="text-xl font-bold text-black">Total Warga Belum Lunas</h2>
            </div>
        </div>  
    </div>
    {{-- Illustrasi --}}
    <div class="overflow-hidden rounded-lg shadow-lg border-2">
        <img src="/assets/dashboard-illustrasi/infinity-838683.webp" alt="Profile Picture" class="rounded-lg shadow-lg w-full h-full object-cover">
    </div>
</div>
@endsection