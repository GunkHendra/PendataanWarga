@extends('layouts/layout')

@section('content')
<div class="p-10">
    <div class="overflow-x-auto">
        <div class="flex justify-between print:hidden">
            <button 
                onclick="window.print()" 
                class="bg-blue-600 text-white px-4 py-2 rounded shadow hover:bg-blue-700 transition duration-300">
                Cetak Laporan
            </button>
            <div class="flex justify-end">
                <div class="relative">
                    <select name="data-pelaporan" id="data-pelaporan" class="w-full bg-gray-700 rounded px-4 py-2 pr-10 appearance-none print:hidden text-white focus:border-blue-500 focus:ring-2 focus:ring-blue-500" required>
                        <option value="1" {{ $filter == 1 ? 'selected' : '' }}>Total Warga Pendatang</option>
                        <option value="2" {{ $filter == 2 ? 'selected' : '' }}>Total Penambahan Pendatang</option>
                        <option value="3" {{ $filter == 3 ? 'selected' : '' }}>Total Pelunasan Iuran</option>
                        <option value="4" {{ $filter == 4 ? 'selected' : '' }}>Total Iuran Belum Lunas</option>
                        <option value="5" {{ $filter == 5 ? 'selected' : '' }}>Total Warga yang Sudah Lunas</option>
                        <option value="6" {{ $filter == 6 ? 'selected' : '' }}>Total Warga Belum Lunas</option>
                    </select>
                    <img src="/assets/dashboard-icon/dropDown.png" alt="dropDownIcon" class="w-5 h-5 absolute right-2 top-2.5 pointer-events-none">
                </div>
            </div>
        </div>

        {{-- header --}}
        <div class="text-white print:text-black relative flex flex-col gap-2">
            <div class="absolute bottom-0 right-0">
                <h2 class="text-1xl">{{ $desa->desa }}, {{ $tanggal_sekarang }}</h2>
            </div>

            <div class="flex flex-col justify-center items-center gap-2 mb-12">
                <h1 class="text-4xl font-bold uppercase" id="laporan-header">PELAPORAN DESA {{ $desa->desa }}</h1>
                <h2 class="text-3xl uppercase" id="data-header"></h2>
            </div>
            
            {{-- data --}}
            <span id="data-info"></span>
        </div>


        <div class="overflow-y-auto" style="max-height: 580px;">
            <table class="min-w-full w-full mx-auto bg-gray-700 border-none text-white print:text-black rounded-lg mt-1">
                <thead id="table-head"></thead>
                <tbody id="table-body"></tbody>
            </table>
        </div>
    </div>
</div>

<script>
    function updateContent(selectedValue) {
        const header = document.getElementById('data-header');
        const info = document.getElementById('data-info');
        
        if (selectedValue === '1') {
            header.textContent = 'DATA SELURUH WARGA PENDATANG';
            info.textContent = 'Total Warga Pendatang: {{ $value }} Warga';
        } else if (selectedValue === '2') {
            header.textContent = 'DATA PENAMBAHAN PENDATANG BULAN {{ $month }}';
            info.textContent = 'Total Penambahan Pendatang: {{ $value }} Warga';
        } else if (selectedValue === '3') {
            header.textContent = 'DATA JUMLAH PELUNASAN IURAN BULAN {{ $month }}';
            info.textContent = 'Total Pelunasan Iuran: Rp. {{ number_format((int)$value, 0, ',', '.') }}';
        } else if (selectedValue === '4') {
            header.textContent = 'DATA IURAN BELUM LUNAS BULAN {{ $month }}';
            info.textContent = 'Total Iuran Belum Lunas: Rp. {{ number_format((int)$value, 0, ',', '.') }}';
        } else if (selectedValue === '5') {
            header.textContent = 'DATA WARGA SUDAH LUNAS BULAN {{ $month }}';
            info.textContent = 'Total Warga Sudah Lunas: {{ $value }} Warga';
        } else if (selectedValue === '6') {
            header.textContent = 'DATA WARGA BELUM LUNAS BULAN {{ $month }}';
            info.textContent = 'Total Warga Belum Lunas: {{ $value }} Warga';
        }
    }

    document.addEventListener('DOMContentLoaded', function () {
        const selectedValue = document.getElementById('data-pelaporan').value;
        updateContent(selectedValue);
        updateTable(selectedValue);
    });

    document.getElementById('data-pelaporan').addEventListener('change', function () {
        updateContent(this.value);
        updateFilter(this.value);
    });

    function updateFilter(value){
        const filterValue = value;
        const tableBody = document.getElementById('table-body');
        window.location.replace('/admin/pelaporan?filter=' + filterValue);
    }

    function updateTable(value){
        tableHead = document.getElementById('table-head');
        tableBody = document.getElementById('table-body');
        tableHead.innerHTML = '';
        tableBody.innerHTML = '';

        if (value === '1' || value === '2') {
            column = `
                <tr>
                    @if (!$data->isEmpty())
                        <th class="p-4 text-center text-lg font-medium border-b border-gray-400">NIK</th>
                        <th class="p-4 text-center text-lg font-medium border-b border-gray-400">Nama Lengkap</th>
                        <th class="p-4 text-center text-lg font-medium border-b border-gray-400">Nomor Telepon</th>
                        <th class="p-4 text-center text-lg font-medium border-b border-gray-400">Tanggal Kedatangan</th>
                        <th class="p-4 text-center text-lg font-medium border-b border-gray-400">Status Warga</th>
                    @endif
                </tr>
            `;

            row =  `
                @if ($data->isEmpty())
                    <tr class="flex justify-center">
                        <td class="px-2 py-4">
                            Tidak ada data.
                        </td>
                    </tr>
                @endif
                @foreach ($data as $item)
                    <tr>
                        <td class="px-4 py-5 text-center">{{ $item->NIK }}</td>
                        <td class="px-4 py-5 text-center">{{ $item->nama_lengkap }}</td>
                        <td class="px-4 py-5 text-center">{{ $item->nomor_telepon }}</td>
                        <td class="px-4 py-5 text-center">{{ $item->updated_at->format('Y-m-d') }}</td>
                        <td class="px-4 py-5 text-center">
                            @if ($item->status_warga)
                            <span class="px-4 py-2 bg-green-500 text-white rounded">
                            Aktif
                            </span>
                            @else
                            <span class="px-4 py-2 bg-red-500 text-white rounded">
                            Tidak Aktif
                            </span>
                            @endif
                        </td>
                    </tr>
                @endforeach
            `;
        }
        else if (value === '3' || value === '4') {
            column = `
                <tr>
                    @if (!$data->isEmpty())
                        <th class="p-4 text-center text-lg font-medium border-b border-gray-400">NIK</th>
                        <th class="p-4 text-center text-lg font-medium border-b border-gray-400">Nama Lengkap</th>
                        <th class="p-4 text-center text-lg font-medium border-b border-gray-400">Nomor Telepon</th>
                        <th class="p-4 text-center text-lg font-medium border-b border-gray-400">Nominal Iuran</th>
                        <th class="p-4 text-center text-lg font-medium border-b border-gray-400">Tanggal Iuran</th>
                        <th class="p-4 text-center text-lg font-medium border-b border-gray-400">Status Iuran</th>
                    @endif
                </tr>
            `;

            row =  `
                @if ($data->isEmpty())
                    <tr class="flex justify-center">
                        <td class="px-2 py-4">
                            Tidak ada data.
                        </td>
                    </tr>
                @endif
                @foreach ($data as $item)
                    <tr>
                        @if ($item->user)
                            <td class="px-4 py-5 text-center">{{ $item->user->NIK }}</td>
                            <td class="px-4 py-5 text-center">{{ $item->user->nama_lengkap }}</td>
                            <td class="px-4 py-5 text-center">{{ $item->user->nomor_telepon }}</td>
                            <td class="px-4 py-5 text-center">{{ number_format((int)$item->nominal_iuran, 0, ',', '.') }}</td>
                            <td class="px-4 py-5 text-center">{{ $item->tanggal_iuran }}</td>
                            <td class="px-4 py-5 text-center">
                                @if ($item->status_iuran)
                                <span class="px-4 py-2 bg-green-500 text-white rounded">
                                    Lunas
                                </span>
                                @else
                                <span class="px-4 py-2 bg-red-500 text-white rounded">
                                    Belum Lunas
                                </span>
                                @endif
                            </td>
                        @endif
                    </tr>
                @endforeach
            `;
        }
        else if (value === '5' || value === '6') {
            column = `
                <tr>
                    @if (!$data->isEmpty())
                        <th class="p-4 text-center text-lg font-medium border-b border-gray-400">NIK</th>
                        <th class="p-4 text-center text-lg font-medium border-b border-gray-400">Nama Lengkap</th>
                        <th class="p-4 text-center text-lg font-medium border-b border-gray-400">Nomor Telepon</th>
                        <th class="p-4 text-center text-lg font-medium border-b border-gray-400">Tanggal Iuran</th>
                        <th class="p-4 text-center text-lg font-medium border-b border-gray-400">Status Iuran</th>
                    @endif
                </tr>
            `;

            row =  `
                @if ($data->isEmpty())
                    <tr class="flex justify-center">
                        <td class="px-2 py-4">
                            Tidak ada data.
                        </td>
                    </tr>
                @endif
                @foreach ($data as $item)
                    <tr>
                        @if ($item->user)
                            <td class="px-4 py-5 text-center">{{ $item->user->NIK }}</td>
                            <td class="px-4 py-5 text-center">{{ $item->user->nama_lengkap }}</td>
                            <td class="px-4 py-5 text-center">{{ $item->user->nomor_telepon }}</td>
                            <td class="px-4 py-5 text-center">{{ $item->tanggal_iuran }}</td>
                            <td class="px-4 py-5 text-center">
                                @if ($item->status_iuran)
                                <span class="px-4 py-2 bg-green-500 text-white rounded">
                                    Lunas
                                </span>
                                @else
                                <span class="px-4 py-2 bg-red-500 text-white rounded">
                                    Belum Lunas
                                </span>
                                @endif
                            </td>
                        @endif
                    </tr>
                @endforeach
            `;
        }
        tableHead.innerHTML += column;
        tableBody.innerHTML += row;
    }
</script>
@endsection

    {{-- // Make an AJAX request
        fetch(`/admin/data_tabel_pelaporan?filter=${filterValue}`)
            // .then(response => response.json())
            .then(response => {
                if (!response.ok) {
                    throw new Error(`HTTP error! status: ${response.status}`);
                }
                return response.json();
            })
            .then(data => {
                // Clear the existing table rows
                tableBody.innerHTML = '';

                // Populate the table with new data
                data.forEach(item => {
                    console.log(item);
                    let row = '';
                    if (filterValue === '1') {
                        row = `
                            <tr>
                                <td class="px-4 py-5 text-center border-b border-gray-400">${item.NIK}</td>
                                <td class="px-4 py-5 text-center border-b border-gray-400">${item.nama_lengkap}</td>
                                <td class="px-4 py-5 text-center border-b border-gray-400">
                                    <span class="px-4 py-2 ${item.status_warga ? 'bg-green-500' : 'bg-red-500'} text-white rounded">
                                        ${item.status_warga ? 'Aktif' : 'Tidak Aktif'}
                                    </span>
                                </td>
                                <td class="px-4 py-5 text-center border-b border-gray-400">${new Date(item.updated_at).toLocaleDateString()}</td>
                            </tr>
                        `;
                    } else if (filterValue === '2') {
                        row = `
                            <tr>
                                <td class="px-4 py-5 text-center border-b border-gray-400">${item.NIK}</td>
                                <td class="px-4 py-5 text-center border-b border-gray-400">${item.nama_lengkap}</td>
                                <td class="px-4 py-5 text-center border-b border-gray-400">
                                    <span class="px-4 py-2 ${item.status_warga ? 'bg-green-500' : 'bg-red-500'} text-white rounded">
                                        ${item.status_warga ? 'Aktif' : 'Tidak Aktif'}
                                    </span>
                                </td>
                                <td class="px-4 py-5 text-center border-b border-gray-400">${new Date(item.updated_at).toLocaleDateString()}</td>
                            </tr>
                        `;
                    } else if (filterValue === '3') {
                        row = `
                            <tr>
                                <td class="px-4 py-5 text-center border-b border-gray-400">{{ number_format((int)${item.nominal_iuran}, 0, ',', '.') }}</td>
                                <td class="px-4 py-5 text-center border-b border-gray-400">${item.tanggal_iuran}</td>
                                <td class="px-4 py-5 text-center border-b border-gray-400">
                                    <span class="px-4 py-2 ${item.status_warga ? 'bg-green-500' : 'bg-red-500'} text-white rounded">
                                        ${item.status_warga ? 'Aktif' : 'Tidak Aktif'}
                                    </span>
                                </td>
                                <td class="px-4 py-5 text-center border-b border-gray-400">${new Date(item.updated_at).toLocaleDateString()}</td>
                            </tr>
                        `;
                    }

                    tableBody.innerHTML += row;
                });
            })
            .catch(error => console.error('Error fetching table data:', error)); --}}