@extends('layouts/layout')

@section('content')
<div class="flex flex-col gap-6">
    {{-- Dashboard cards --}}
    <div class="grid grid-cols-3 grid-rows-2 gap-6">
        {{-- Looping untuk setiap card --}}
        @php
            $cards = [
                ['url' => '/admin/pelaporan?filter=1', 'title' => 'Total Data Warga Pendatang', 'value' => "$total_warga Warga", 'image' => '/assets/dashboard-icon/person-putih.png', 'badge' => 'Keseluruhan'],
                ['url' => '/admin/pelaporan?filter=3', 'title' => 'Total Pelunasan Iuran', 'value' => "+ Rp. " . number_format((int)$total_payment, 0, ',', '.'), 'image' => '/assets/dashboard-icon/notepad-dashboard-putih.png', 'badge' => $month],
                ['url' => '/admin/pelaporan?filter=5', 'title' => 'Total Warga yang Sudah Lunas', 'value' => "$total_warga_lunas Warga", 'image' => '/assets/dashboard-icon/money-dashboard-putih.png', 'badge' => $month],
                ['url' => '/admin/pelaporan?filter=2', 'title' => 'Total Penambahan Pendatang', 'value' => "+$total_warga_datang Warga", 'image' => '/assets/dashboard-icon/person-plus-putih.png', 'badge' => $month],
                ['url' => '/admin/pelaporan?filter=4', 'title' => 'Total Iuran Belum Lunas', 'value' => "- Rp. " . number_format((int)$total_payment_belum, 0, ',', '.'), 'image' => '/assets/dashboard-icon/money-wings-putih.png', 'badge' => $month],
                ['url' => '/admin/pelaporan?filter=6', 'title' => 'Total Warga Belum Lunas', 'value' => "$total_warga_belum Warga", 'image' => '/assets/dashboard-icon/unpaid-putih.png', 'badge' => $month],
            ];
        @endphp

        @foreach ($cards as $card)
        <a href="{{ $card['url'] }}" class="relative bg-gray-700 hover:bg-gray-600 transition rounded-lg shadow-lg p-6 flex items-center gap-4">
            <div class="absolute top-0 right-0 bg-blue-700 text-white py-2 px-4 rounded-bl-lg rounded-tr-md">
                {{ $card['badge'] }}
            </div>
            <img src="{{ $card['image'] }}" alt="Icon" class="w-16 h-16">
            <div>
                <h2 class="text-lg font-medium text-gray-400">{{ $card['title'] }}</h2>
                <h3 class="text-2xl font-bold text-gray-200">{{ $card['value'] }}</h3>
            </div>
        </a>
        @endforeach
    </div>

    {{-- Chart --}}
    <div class="flex justify-between rounded-lg shadow-lg border border-gray-800 bg-gray-700 p-6 h-[58vh]">
        <canvas id="wargaChart" class="w-full h-full"></canvas>
        {{-- <canvas id="circleChart" class="w-full h-full"></canvas> --}}
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
                backgroundColor: 'rgba(29, 78, 216, 0.7)',
                borderColor: 'rgba(59, 130, 235, 1)',
                borderWidth: 2,
            }],
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    labels: {
                        color: 'rgba(229, 231, 235, 1)' // Light text color for legend
                    }
                }
            },
            scales: {
                x: {
                    ticks: { color: 'rgba(229, 231, 235, 1)' }, // Light text color for x-axis
                },
                y: {
                    ticks: { color: 'rgba(229, 231, 235, 1)' }, // Light text color for y-axis
                    beginAtZero : true,
                },
            },
        },
    });

    const circleCtx = document.getElementById('circleChart').getContext('2d');
    const circleChart = new Chart(circleCtx, {
        type: 'doughnut', // Use 'pie' for a pie chart
        data: {
            labels: ['Belum Lunas', 'Sudah Lunas'],
            datasets: [{
                label: 'Iuran Status',
                data: [{{ $total_warga_belum }}, {{ $total_warga_lunas }}], // Pass data dynamically
                backgroundColor: [
                    'rgba(220, 38, 38, 0.7)', // Red for "Belum Lunas"
                    'rgba(34, 197, 94, 0.7)'   // Green for "Sudah Lunas"
                ],
                borderColor: [
                    'rgba(220, 38, 38, 1)',
                    'rgba(34, 197, 94, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    labels: {
                        color: 'rgba(229, 231, 235, 1)' // Light text color
                    }
                }
            }
        }
    });
</script>
@endsection


{{-- @extends('layouts/layout')

@section('content')
<div class="flex flex-col gap-4">
    <div class="grid grid-cols-3 grid-rows-2 gap-4">
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
</div> --}}

{{-- <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
@endsection --}}