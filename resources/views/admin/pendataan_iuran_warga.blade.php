@extends('layouts/layout')

@section('content')
    <div class="m-6">
        <form class="space-y-8">
            <div>
                <label for="NIK">Nomor Induk Kependudukan</label><br>
                <div class="relative">
                    <input type="search" id="NIK" name="NIK" placeholder="Cari NIK" class="w-full border border-black bg-gray-200 rounded p-2 pr-10">
                    <img src="assets/dashboard-icon/IconSearch.png" alt="searchIcon" class="w-10 h-10 right-2 absolute top-0.5">
                </div>
            </div>

            <div>
                <label for="Nama">Nama Lengkap</label><br>
                <input type="text" id="Nama" name="Nama" placeholder="Silahkan Cari NIK" class="w-full bg-gray-200 rounded p-2">
            </div>

            <div>
                <label for="Alamat">Nominal Iuran</label><br>
                <input type="text" id="Alamat" name="Alamat" placeholder="Ex. 10.000.000,00" class="w-full bg-gray-200 rounded p-2">
            </div>

            <div>
                <label for="Tanggal">Tanggal Iuran</label><br>
                <input type="date" id="Tanggal" name="Tanggal" class="bg-gray-200 rounded p-2">
            </div>

            <div class="flex justify-end">
                <button type="submit" class="bg-emerald-400 w-1/5 text-white p-4 rounded text-2xl">Tambahkan</button>
            </div>
        </form>
    </div>
@endsection
