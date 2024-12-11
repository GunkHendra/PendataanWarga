@extends('layouts/layout')

@section('content')
    <div class="m-6 p-10 bg-gray-700 rounded-lg">
        @if (session()->has('success'))
            <div class="bg-blue-400 text-white font-bold text-xl w-full rounded-lg shadow-lg p-6 mb-6">
                {{ session('success') }}
            </div>
        @endif
        <form action="/admin/pendataan_warga" method="POST">
            @csrf
            <div class="mb-6">
                <label for="NIK" class="text-white">Nomor Induk Kependudukan</label><br>
                <input type="number" id="NIK" name="NIK" placeholder="Ex. 123456789" class="w-full bg-gray-200 rounded p-2" required>
                @error('NIK')
                    <small class="text-red-400">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-6">
                <label for="Nama" class="text-white">Nama Lengkap</label><br>
                <input type="text" id="nama_lengkap" name="nama_lengkap" placeholder="Ex. Ardi Suprianto" class="w-full bg-gray-200 rounded p-2" value="{{ old('nama_lengkap') }}" required>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div class="mb-6">
                    <label for="Alamat" class="text-white">Alamat Sesuai KTP</label><br>
                    <input type="text" id="alamat" name="alamat" placeholder="Ex. Jalan Gedung Kiri No. 2" class="w-full bg-gray-200 rounded p-2" value="{{ old('alamat') }}" required>
                </div>

                <div class="mb-6">
                    <label for="nomor" class="text-white">Nomor Telepon</label><br>
                    <input type="number" id="nomor_telepon" name="nomor_telepon" placeholder="Ex. 0812345678" class="w-full bg-gray-200 rounded p-2" value="{{ old('nomor_telepon') }}" required>
                </div>
            </div>

            <div class="grid grid-cols-3 gap-4">
                <div class="mb-6">
                    <label for="tanggal_lahir" class="text-white">Tanggal Lahir</label><br>
                    <input type="date" id="tanggal_lahir" name="tanggal_lahir" class="w-full bg-gray-200 rounded p-2" value="{{ old('tanggal_lahir') }}" required>
                </div>
                <div class="mb-6">
                    <label for="tempat_lahir" class="text-white">Tempat Lahir</label><br>
                    <input type="text" id="tempat_lahir" name="tempat_lahir" placeholder="Ex. Denpasar" class="w-full bg-gray-200 rounded p-2" value="{{ old('tempat_lahir') }}" required>
                </div>
                <div>
                    <label for="status" class="text-white">Status (Menikah/Belum Menikah)</label><br>
                    <div class="relative">
                        <select name="status_menikah" id="status_menikah" class="w-full bg-gray-200 rounded p-2 appearance-none" required>
                            <option value="" disabled selected>Pilih</option>
                            <option value="1">Menikah</option>
                            <option value="0">Belum Menikah</option>
                        </select>
                        <img src="/assets/dashboard-icon/dropDown.png" alt="dropDownIcon" class="w-5 h-5 absolute right-2 top-3 pointer-events-none">
                    </div>
                </div>
            </div>

        <div class="grid grid-cols-3 gap-4 class="mb-6">
            <div class="mb-6">
                <label for="pekerjaan" class="text-white">Jenis Pekerjaan</label><br>
                <div class="relative">
                    <select name="jenis_pekerjaan" id="jenis_pekerjaan" class="appearance-none w-full bg-gray-200 border border-gray-300 rounded p-2" required>
                        <option value="" disabled selected>Pilih</option>
                        <option value="Wiraswasta">Wiraswasta</option>
                        <option value="Wirausaha">Wirausaha</option>
                        <option value="PNS">PNS</option>
                        <option value="Lainnya">Lainnya</option>
                    </select>
                    <img src="/assets/dashboard-icon/dropDown.png" alt="dropDownIcon" class="w-5 h-5 absolute right-2 top-3 pointer-events-none">
                </div>
            </div>

            <div class="mb-6">
                <label for="agama" class="text-white">Agama</label><br>
                <div class="relative">
                    <select name="agama" id="agama" class="w-full bg-gray-200 rounded p-2 appearance-none" required>
                        <option value="" disabled selected>Pilih</option>
                        <option value="Hindu">Hindu</option>
                        <option value="Islam">Islam</option>
                        <option value="Konghucu">Konghucu</option>
                        <option value="Kristen">Kristen</option>
                        <option value="Protestan">Protestan</option>
                        <option value="Budhha">Buddha</option>
                    </select>
                    <img src="/assets/dashboard-icon/dropDown.png" alt="dropDownIcon" class="w-5 h-5 absolute right-2 top-3 pointer-events-none">
                </div>
            </div>
            <div>
                <label for="pendidikan" class="text-white">Pendidikan</label><br>
                <div class="relative">
                    <select name="pendidikan" id="pendidikan" class="w-full bg-gray-200 rounded p-2 appearance-none" required>
                        <option value="" disabled selected>Pilih</option>
                        <option value="Sarjana/D4">Sarjana/D4</option>
                        <option value="Lainnya">Lainnya</option>
                    </select>
                    <img src="/assets/dashboard-icon/dropDown.png" alt="dropDownIcon" class="w-5 h-5 absolute right-2 top-3 pointer-events-none">
                </div>
            </div>
        </div>

        <div class="grid grid-cols-3 gap-4">
            <div>
                <label for="password" class="text-white">Kata Sandi</label><br>
                <input type="password" id="password" name="password" class="w-full bg-gray-200 rounded p-2" required>
            </div>

            <div>
                <label for="nominal_iuran" class="text-white">Nominal Iuran</label><br>
                <input type="text" id="nominal_iuran" name="nominal_iuran" placeholder="Ex. 10000000" class="w-full bg-gray-200 rounded p-2" value="{{ old('nominal_iuran') }}"  oninput="formatCurrency(this)">
            </div>

            <div>
                <label for="tanggal" class="text-white">Tanggal Iuran</label><br>
                <input type="date" id="tanggal_iuran" name="tanggal_iuran" class="bg-gray-200 rounded p-2 w-full" value="{{ old('tanggal_iuran') }}">
            </div>

            <div class="flex col-start-3">
                <button type="submit" class="bg-blue-400 hover:bg-blue-600 transition duration-300 text-white p-4 rounded w-full text-2xl">Daftarkan</button>
            </div>
        </div>
    </form>
    </div>

    <script>
        function formatCurrency(input) {
            let value = input.value.replace(/\D/g, '');
            if (value) {
                value = new Intl.NumberFormat('id-ID').format(value);
            }
            input.value = value;
        }
    </script>
@endsection
