@extends('layouts/layout')

@section('content')
    <div class="m-6">
        <form class="space-y-8">
            <div>
                <label for="NIK">Nomor Induk Kependudukan</label><br>
                <input type="text" id="NIK" name="NIK" placeholder="Ex 123456789" class="w-full bg-gray-200 rounded p-2">
            </div>

            <div>
                <label for="Nama">Nama Lengkap</label><br>
                <input type="text" id="Nama" name="Nama" placeholder="Ex. Ardi Suprianto" class="w-full bg-gray-200 rounded p-2">
            </div>

            <div>
                <label for="Alamat">Alamat Sesuai KTP</label><br>
                <input type="text" id="Alamat" name="Alamat" placeholder="Ex. Jalan Gedung Kiri No. 2" class="w-full bg-gray-200 rounded p-2">
            </div>

            <div class="grid grid-cols-3 gap-4">
                <div>
                    <label for="Nomor">Nomor Telepon</label><br>
                    <input type="text" id="Nomor" name="Nomor" placeholder="Ex. 0812345678" class="w-full bg-gray-200 rounded p-2">
                </div>

                <div>
                    <label for="Tanggal">Tanggal Lahir</label><br>
                    <input type="date" id="Tanggal" name="Tanggal" class="w-full bg-gray-200 rounded p-2">
                </div>

                <div>
                    <label for="Tempat Lahir">Tempat Lahir</label><br>
                    <input type="text" id="Tempat Lahir" name="Tempat Lahir" placeholder="Ex. Denpasar" class="w-full bg-gray-200 rounded p-2">
                </div>
            </div>

        <div class="grid grid-cols-3 gap-4">
            <div>
                <label for="Status">Status (Menikah/Belum Menikah)</label><br>
                <select name="Status" id="Status" class="w-full bg-gray-200 rounded p-2">
                    <option value="" disabled selected>Pilih</option>
                    <option value="Menikah">Menikah</option>
                    <option value="Belum Menikan">Belum Menikah</option>
                </select><br>
            </div>

            <div>
                <label for="Pekerjaan">Jenis Pekerjaan</label><br>
                <select name="Pekerjaan" id="Pekerjaan" class="w-full bg-gray-200 rounded p-2">
                    <option value="" disabled selected>Pilih</option>
                    <option value="Pekerjaan">Wiraswasta</option>
                    <option value="Wirausaha">Wirausaha</option>
                    <option value="PNS">PNS</option>
                    <option value="Lainnya">Lainnya</option>
                </select><br>
            </div>

            <div>
                <label for="Agama">Agama</label><br>
                <select name="Agama" id="Agama" class="w-full bg-gray-200 rounded p-2">
                    <option value="" disabled selected>Pilih</option>
                    <option value="Hindu">Hindu</option>
                    <option value="Islam">Islam</option>
                    <option value="Konghucu">Konghucu</option>
                    <option value="Kristen">Kristen</option>
                    <option value="Protestan">Protestan</option>
                    <option value="Budhha">Buddha</option>
                </select><br>
            </div>
        </div>

        <div class="grid grid-cols-3 gap-4">
            <div>
                <label for="Pendidikan">Pendidikan</label><br>
                <select name="Pendidikan" id="Pendidikan" class="w-full bg-gray-200 rounded p-2">
                    <option value="" disabled selected>Pilih</option>
                    <option value="Sarjana/D4">Sarjana/D4</option>
                    <option value="Lainnya">Lainnya</option>
                </select><br>
            </div>
            <div>
                <label for="Sandi">Kata Sandi</label><br>
                <input type="password" id="Sandi" name="Sandi" class="w-full bg-gray-200 rounded p-2">
            </div>
            <div class="flex">
                <button type="submit" class="bg-emerald-400 text-white p-2 rounded w-full text-2xl">Daftarkan</button>
            </div>
        </div>
    </form>
    </div>
@endsection
