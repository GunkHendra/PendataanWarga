@extends('layouts/layout')

@section('content')
<div class="flex flex-col gap-4">
    <div class="grid grid-cols-3 grid-rows-2 gap-4">
        {{-- Total Warga Pendatang --}}
        <a href="/admin/pelaporan?filter=1" class="relative bg-gradient-to-r from-emerald-300 via-emerald-400 to-emerald-500 rounded-lg shadow-lg justify-start flex text-center items-center space-y-4 p-6">
            <div class="absolute top-0 right-0 bg-emerald-700 text-white py-2 px-4 rounded-bl-lg rounded-tr-md">
                Keseluruhan
            </div>
            <div class="flex justify-between items-start align-middle gap-2">
                <img src="/assets/dashboard-icon/person.png" alt="Profile Picture" class="w-20 h-20 object-cover">
                <div class="flex flex-col justify-between items-start gap-2">
                    <h2 class="text-xl text-white">Total Data Warga Pendatang</h2>
                    <h2 class="text-3xl font-bold text-white">{{ $total_warga }} Warga</h2>
                </div>
            </div>
        </a>

        {{-- Total Jumlah Pelunasan Iuran --}}
        <a href="/admin/pelaporan?filter=3" class="relative bg-gradient-to-r from-emerald-300 via-emerald-400 to-emerald-500 rounded-lg shadow-lg flex text-center items-center space-y-4 p-6">
            <div class="absolute top-0 right-0 bg-emerald-700 text-white py-2 px-4 rounded-bl-lg rounded-tr-md">
                {{ $month }}
            </div>
            <div class="flex justify-between items-start align-middle gap-2">
                <img src="/assets/dashboard-icon/notepad-dashboard.png" alt="Profile Picture" class="w-20 h-20 object-cover">
                <div class="flex flex-col justify-between items-start gap-2">
                    <h2 class="text-xl text-white">Total Pelunasan Iuran</h2>
                    <h2 class="text-3xl font-bold text-white">+ Rp. {{ number_format((int)$total_payment, 0, ',', '.') }}</h2>
                </div>
            </div>
        </a>

        {{-- Total Warga yang Sudah Lunas --}}
        <a href="/admin/pelaporan?filter=5" class="relative bg-gradient-to-r from-emerald-300 via-emerald-400 to-emerald-500 rounded-lg shadow-lg justify-start flex text-center items-center space-y-4 p-6">
            <div class="absolute top-0 right-0 bg-emerald-700 text-white py-2 px-4 rounded-bl-lg rounded-tr-md">
                {{ $month }}
            </div>
            <div class="flex justify-between items-start align-middle gap-2">
                <img src="/assets/dashboard-icon/money-dashboard.png" alt="Profile Picture" class="w-20 h-20 object-cover">
                <div class="flex flex-col justify-between items-start gap-2">
                    <h2 class="text-xl text-white">Total Warga yang Sudah Lunas</h2>
                    <h2 class="text-3xl font-bold text-white">{{ $total_warga_lunas }} Warga</h2>
                </div>
            </div>
        </a>

        {{-- Total Penambahan Pendatang Bulan ini --}}
        <a href="/admin/pelaporan?filter=2" class="relative bg-gradient-to-r from-emerald-300 via-emerald-400 to-emerald-500 rounded-lg shadow-lg justify-start flex text-center items-center space-y-4 p-6">
            <div class="absolute top-0 right-0 bg-emerald-700 text-white py-2 px-4 rounded-bl-lg rounded-tr-md">
                {{ $month }}
            </div>
            <div class="flex justify-between items-start align-middle gap-2">
                <img src="/assets/dashboard-icon/person-plus.png" alt="Profile Picture" class="w-20 h-20">
                <div class="flex flex-col justify-between items-start gap-2">
                    <h2 class="text-xl text-white">Total Penambahan Pendatang</h2>
                    <h2 class="text-3xl font-bold text-white">+{{ $total_warga_datang }} Warga</h2>
                </div>
            </div>
        </a>

        {{-- Total Iuran Belum Lunas --}}
        <a href="/admin/pelaporan?filter=4" class="relative bg-gradient-to-r from-emerald-300 via-emerald-400 to-emerald-500 rounded-lg shadow-lg justify-start flex text-center items-center space-y-4 p-6">
            <div class="absolute top-0 right-0 bg-emerald-700 text-white py-2 px-4 rounded-bl-lg rounded-tr-md">
                {{ $month }}
            </div>
            <div class="flex justify-between items-start align-middle gap-2">
                <img src="/assets/dashboard-icon/money-wings.png" alt="Profile Picture" class="w-20 h-20">
                <div class="flex flex-col justify-between items-start gap-2">
                    <h2 class="text-xl text-white">Total Iuran Belum Lunas</h2>
                    <h2 class="text-3xl font-bold text-white">- Rp. {{ number_format((int)$total_payment_belum, 0, ',', '.') }}</h2>
                </div>
            </div>
        </a>

        {{-- Total Warga Belum Lunas --}}
        <a href="/admin/pelaporan?filter=6" class="relative bg-gradient-to-r from-emerald-300 via-emerald-400 to-emerald-500 rounded-lg shadow-lg justify-start flex text-center items-center space-y-4 p-6">
            <div class="absolute top-0 right-0 bg-emerald-700 text-white py-2 px-4 rounded-bl-lg rounded-tr-md">
                {{ $month }}
            </div>
            <div class="flex justify-between items-start align-middle gap-2">
                <img src="/assets/dashboard-icon/unpaid.png" alt="Profile Picture" class="w-20 h-20">
                <div class="flex flex-col justify-between items-start gap-2">
                    <h2 class="text-xl text-white">Total Warga Belum Lunas</h2>
                    <h2 class="text-3xl font-bold text-white">{{ $total_warga_belum }} Warga</h2>
                </div>
            </div>
        </a>
    </div>
    
    <div class="rounded-lg shadow-lg border-2 bg-white h-[30rem] p-4">
        <canvas id="wargaChart" class="w-full h-full"></canvas>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('wargaChart').getContext('2d');
    const wargaChart = new Chart(ctx, {
        type: 'bar', // Choose chart type: bar, line, etc.
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'], // Months
            datasets: [{
                label: 'Jumlah Warga Pendatang',
                data: @json($chartData), // Pass data from the controller
                backgroundColor: 'rgba(16, 185, 129, 1)',
                borderColor: 'rgba(16, 185, 129, 1)',
                borderWidth: 1,
            }],
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                y: {
                    beginAtZero: true,
                },
            },
        },
    });
</script>
@endsection