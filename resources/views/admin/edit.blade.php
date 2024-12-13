@extends('layouts/layout')

@section('content')
    <div class="m-6 p-10 bg-gray-700 rounded-lg">
        @if (session()->has('success'))
            <div class="bg-blue-400 text-white font-bold text-xl w-full rounded-lg shadow-lg p-6 mb-6">
                {{ session('success') }}
            </div>
        @endif
        <form action="/admin/edit_data_warga" method="POST">
            @csrf
            <div class="mb-6">
                <label for="NIK" class="text-white">Nomor Induk Kependudukan</label><br>
                <input type="number" id="NIK" name="NIK" placeholder="Ex. 123456789" class="w-full bg-gray-200 rounded p-2" value="{{ $user->first()->NIK }}">
                @error('NIK')
                    <small class="text-red-400">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-6">
                <label for="Nama" class="text-white">Nama Lengkap</label><br>
                <input type="text" id="nama_lengkap" name="nama_lengkap" placeholder="Ex. Ardi Suprianto" class="w-full bg-gray-200 rounded p-2" value="{{ $user->first()->nama_lengkap }}"" required>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div class="mb-6">
                    <label for="Alamat" class="text-white">Alamat Sesuai KTP</label><br>
                    <input type="text" id="alamat" name="alamat" placeholder="Ex. Jalan Gedung Kiri No. 2" class="w-full bg-gray-200 rounded p-2" value="{{ $user->first()->alamat }}"" required>
                </div>

                <div class="mb-6">
                    <label for="nomor" class="text-white">Nomor Telepon</label><br>
                    <input type="number" id="nomor_telepon" name="nomor_telepon" placeholder="Ex. 0812345678" class="w-full bg-gray-200 rounded p-2" value="{{ $user->first()->nomor_telepon }}"" required>
                </div>
            </div>

            <div class="grid grid-cols-3 gap-4">
                <div class="mb-6">
                    <label for="tanggal_lahir" class="text-white">Tanggal Lahir</label><br>
                    <input type="date" id="tanggal_lahir" name="tanggal_lahir" class="w-full bg-gray-200 rounded p-2" value="{{ $user->first()->tanggal_lahir }}"" required>
                </div>
                <div class="mb-6">
                    <label for="tempat_lahir" class="text-white">Tempat Lahir</label><br>
                    <input type="text" id="tempat_lahir" name="tempat_lahir" placeholder="Ex. Denpasar" class="w-full bg-gray-200 rounded p-2" value="{{ $user->first()->tempat_lahir }}" required>
                </div>
                <div>
                    <label for="status" class="text-white">Status (Menikah/Belum Menikah)</label><br>
                    <div class="relative">
                        <select name="status_menikah" id="status_menikah" class="w-full bg-gray-200 rounded p-2 appearance-none" required>
                            <option value="" disabled>Pilih</option>
                            @if ($user->first()->status_menikah)
                                <option value="1">Menikah</option>
                            @else
                                <option value="0">Belum Menikah</option>
                            @endif
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
                        <option value="" disabled>Pilih</option>
                        <option value="Wiraswasta" {{ $user->first()->jenis_pekerjaan == 'Wiraswasta' ? 'selected' : '' }}>Wiraswasta</option>
                        <option value="Wirausaha" {{ $user->first()->jenis_pekerjaan == 'Wirausaha' ? 'selected' : '' }}>Wirausaha</option>
                        <option value="PNS" {{ $user->first()->jenis_pekerjaan == 'PNS' ? 'selected' : '' }}>PNS</option>
                        <option value="Lainnya" {{ $user->first()->jenis_pekerjaan == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                    </select>
                    <img src="/assets/dashboard-icon/dropDown.png" alt="dropDownIcon" class="w-5 h-5 absolute right-2 top-3 pointer-events-none">
                </div>
            </div>

            <div class="mb-6">
                <label for="agama" class="text-white">Agama</label><br>
                <div class="relative">
                    <select name="agama" id="agama" class="w-full bg-gray-200 rounded p-2 appearance-none" required>
                        <option value="" disabled>Pilih</option>
                        <option value="Hindu" {{ $user->first()->agama == 'Hindu' ? 'selected' : '' }}>Hindu</option>
                        <option value="Islam" {{ $user->first()->agama == 'Islam' ? 'selected' : '' }}>Islam</option>
                        <option value="Konghucu" {{ $user->first()->agama == 'Konghucu' ? 'selected' : '' }}>Konghucu</option>
                        <option value="Kristen" {{ $user->first()->agama == 'Kristen' ? 'selected' : '' }}>Kristen</option>
                        <option value="Protestan" {{ $user->first()->agama == 'Protestan' ? 'selected' : '' }}>Protestan</option>
                        <option value="Buddha" {{ $user->first()->agama == 'Buddha' ? 'selected' : '' }}>Buddha</option>
                    </select>
                    <img src="/assets/dashboard-icon/dropDown.png" alt="dropDownIcon" class="w-5 h-5 absolute right-2 top-3 pointer-events-none">
                </div>
            </div>
            <div>
                <label for="pendidikan" class="text-white">Pendidikan</label><br>
                <div class="relative">
                    <select name="pendidikan" id="pendidikan" class="w-full bg-gray-200 rounded p-2 appearance-none" required>
                        <option value="" disabled>Pilih</option>
                        <option value="Sarjana/D4" {{ $user->first()->pendidikan == 'Sarjana/D4' ? 'selected' : '' }}>Sarjana/D4</option>
                        <option value="Lainnya" {{ $user->first()->pendidikan == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                    </select>
                    <img src="/assets/dashboard-icon/dropDown.png" alt="dropDownIcon" class="w-5 h-5 absolute right-2 top-3 pointer-events-none">
                </div>
            </div>
        </div>

        <div class="grid grid-cols-3 gap-4">
            <div>
                <label for="nominal_iuran" class="text-white">Nominal Iuran</label><br>
                <input type="text" id="nominal_iuran" name="nominal_iuran" placeholder="Ex. 10000000" class="w-full bg-gray-200 rounded p-2" value="{{ number_format((int)$payment->first()->nominal_iuran, 0, ',', '.') }}"  oninput="formatCurrency(this)">
            </div>

            <div>
                <label for="tanggal" class="text-white">Tanggal Iuran</label><br>
                <input type="date" id="tanggal_iuran" name="tanggal_iuran" class="bg-gray-200 rounded p-2 w-full" value="{{ $payment->first()->tanggal_iuran }}">
            </div>

            <div class="flex col-start-3">
                <button type="submit" class="bg-blue-400 hover:bg-blue-600 transition duration-300 text-white p-4 rounded w-full text-2xl">Edit</button>
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