@extends('layouts/layout')

@section('content')
    <div class="m-6 p-10 bg-white rounded-lg">
        <form action="/admin/pendataan_iuran" method="POST" class="space-y-8">
            @csrf
            {{-- <div>
                <label for="NIK">Nomor Induk Kependudukan</label><br>
                <div class="relative">
                    <input type="search" id="NIK" name="NIK" placeholder="Cari NIK" class="w-full border border-black bg-gray-200 rounded p-2 pr-10">
                    <img src="/assets/dashboard-icon/IconSearch.png" alt="searchIcon" class="w-10 h-10 right-2 absolute top-0.5">
                </div>
            </div> --}}
            <div>
                <label for="Status">Nomor Induk Kependudukan</label><br>
                <div class="relative">
                    <select name="NIK" id="NIK" class="w-full bg-gray-200 rounded p-2 appearance-none" required>
                    <option disabled selected class="text-">Pilih Nomor Induk Kependudukan</option>
                        @foreach ($users as $user)
                            <option value="{{ $user->NIK }}">{{ $user->NIK }}</option>
                        @endforeach
                    </select>
                    <img src="/assets/dashboard-icon/dropDown.png" alt="dropDownIcon" class="w-5 h-5 absolute right-2 top-3 pointer-events-none">
                </div>
            </div>

            <div>
                <label for="Nama">Nama Lengkap</label><br>
                <input type="text" id="nama_lengkap" name="nama_lengkap" placeholder="Silahkan Cari NIK" class="w-full bg-gray-200 rounded p-2" disabled>
            </div>

            <div>
                <label for="Alamat">Nominal Iuran</label><br>
                <input type="text" id="nominal_iuran" name="nominal_iuran" placeholder="Ex. 10.000.000,00" class="w-full bg-gray-200 rounded p-2">
            </div>

            <div>
                <label for="Tanggal">Tanggal Iuran</label><br>
                <input type="date" id="tanggal_iuran" name="tanggal_iuran" class="bg-gray-200 rounded p-2">
            </div>

            <div class="flex justify-end">
                <button type="submit" class="bg-emerald-400 w-1/5 text-white p-4 rounded text-2xl">Tambahkan</button>
            </div>
        </form>
    </div>

    <script>
        const users = @json($users);

        document.getElementById('NIK').addEventListener('change', function() {
            const selectedNik = this.value;
            const user = users.find(user => user.NIK === selectedNik);

            if (user) {
                document.getElementById('nama_lengkap').value = user.nama_lengkap;
            }
        });
    </script>
@endsection
