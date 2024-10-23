@extends('layouts/layout')

@section('content')
<div class="grid grid-cols-3 grid-rows-2 gap-4">
    {{-- Total Warga Pendatang --}}
    <div class="bg-emerald-400 rounded-lg shadow-lg flex flex-col text-center items-center space-y-4 p-6">
        <div class="w-24 h-24 rounded-full overflow-hidden border-4 border-gray-300">
            <img src="https://via.placeholder.com/150" alt="Profile Picture" class="w-full h-full object-cover">
        </div>
        <div>
            <h2 class="text-3xl font-bold text-white">50</h2>
            <h2 class="text-xl font-bold text-black">Total Data Warga Pendatang</h2>
        </div>
    </div>

    {{-- Total Jumlah Pelunasan Iuran --}}
    <div class="bg-emerald-400 rounded-lg shadow-lg flex flex-col text-center items-center space-y-4 p-6">
        <div class="w-24 h-24 rounded-full overflow-hidden border-4 border-gray-300">
            <img src="https://via.placeholder.com/150" alt="Profile Picture" class="w-full h-full object-cover">
        </div>
        <div>
            <h2 class="text-3xl font-bold text-white">+ Rp. 2.000.000</h2>
            <h2 class="text-xl font-bold text-black">Total Jumlah Pelunasan Iuran</h2>
        </div>
    </div>

    {{-- Total Warga yang Sudah Lunas --}}
    <div class="bg-emerald-400 rounded-lg shadow-lg flex flex-col text-center items-center space-y-4 p-6">
        <div class="w-24 h-24 rounded-full overflow-hidden border-4 border-gray-300">
            <img src="https://via.placeholder.com/150" alt="Profile Picture" class="w-full h-full object-cover">
        </div>
        <div>
            <h2 class="text-3xl font-bold text-white">30</h2>
            <h2 class="text-xl font-bold text-black">Total Warga yang Sudah Lunas</h2>
        </div>
    </div>

    {{-- Total Penambahan Pendatang Bulan ini --}}
    <div class="bg-emerald-400 rounded-lg shadow-lg flex flex-col text-center items-center space-y-4 p-6">
        <div class="w-24 h-24 rounded-full overflow-hidden border-4 border-gray-300">
            <img src="https://via.placeholder.com/150" alt="Profile Picture" class="w-full h-full object-cover">
        </div>
        <div>
            <h2 class="text-3xl font-bold text-white">+3</h2>
            <h2 class="text-xl font-bold text-black">Total Pendatang Bulan Ini</h2>
        </div>
    </div>

    {{-- Total Iuran Belum Lunas --}}
    <div class="bg-emerald-400 rounded-lg shadow-lg flex flex-col text-center items-center space-y-4 p-6">
        <div class="w-24 h-24 rounded-full overflow-hidden border-4 border-gray-300">
            <img src="https://via.placeholder.com/150" alt="Profile Picture" class="w-full h-full object-cover">
        </div>
        <div>
            <h2 class="text-3xl font-bold text-white">- Rp. 2.000.000</h2>
            <h2 class="text-xl font-bold text-black">Total Iuran Belum Lunas</h2>
        </div>
    </div>

    {{-- Total Warga Belum Lunas --}}
    <div class="bg-emerald-400 rounded-lg shadow-lg flex flex-col text-center items-center space-y-4 p-6">
        <div class="w-24 h-24 rounded-full overflow-hidden border-4 border-gray-300">
            <img src="https://via.placeholder.com/150" alt="Profile Picture" class="w-full h-full object-cover">
        </div>
        <div>
            <h2 class="text-3xl font-bold text-white">20</h2>
            <h2 class="text-xl font-bold text-black">Total Warga Belum Lunas</h2>
        </div>
    </div>
    
    {{-- Illustrasi --}}
    <div class="col-span-3 rounded-lg shadow-lg border-2 h-1/3">
        <img src="/assets/dashboard-illustrasi/infinity-838683.webp" alt="Profile Picture" class="rounded-lg shadow-lg w-full h-full object-cover">
    </div>
</div>
@endsection