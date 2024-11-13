@extends('layouts/layout')

@section('content')
<div id="terimaModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-10 hidden">
  <div class="bg-white p-6 rounded-lg shadow-lg">
      <h2 class="text-xl font-semibold mb-4">Aktifkan Status Warga</h2>
      <p>Apakah Anda yakin untuk mengaktifkan status warga ini?</p>
      <div class="mt-6 flex justify-end gap-4">
          <button id="cancelTerima" class="bg-red-500 hover:bg-red-700 text-white py-2 px-4 rounded">Tidak</button>
          <button id="confirmTerima" class="bg-green-500 hover:bg-green-700 text-white py-2 px-4 rounded">Iya</button>
      </div>
  </div>
</div>

<div id="batalModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-10 hidden">
  <div class="bg-white p-6 rounded-lg shadow-lg">
      <h2 class="text-xl font-semibold mb-4">Nonaktifkan Warga</h2>
      <p>Apakah Anda yakin untuk menonaktifkan status warga ini?</p>
      <div class="mt-6 flex justify-end gap-4">
          <button id="cancelBatal" class="bg-red-500 hover:bg-red-700 text-white py-2 px-4 rounded">Tidak</button>
          <button id="confirmBatal" class="bg-green-500 hover:bg-green-700 text-white py-2 px-4 rounded">Iya</button>
      </div>
  </div>
</div>

<div class="p-10 bg-white rounded-lg">
  <div class="flex items-center justify-center w-full">
    <div class="w-full max-w-lg">
      <form action="/admin/data_warga" method="GET" class="flex items-center justify-between gap-2">
        <input
          type="text"
          class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
          placeholder="Mau Cari Data Siapa?" name="search"/>
          <img src="/assets/dashboard-icon/IconSearch.png" alt="searchIcon" class="w-10 h-10 border border-gray-300 rounded-lg">
        <button
          class="absolute right-2 top-1/2 transform -translate-y-1/2 text-gray-500 hover:text-gray-700 focus:outline-none"
          type="submit">
        </button>
      </form>
    </div>
  </div>
  
  <br>

  <div class="flex justify-end">
  <a href="/admin/pendataan_warga" class="bg-emerald-400 border border-emerald-400 text-white font-bold py-2 px-4 rounded hover:bg-emerald-400 hover:text-white">
    Klik Untuk Menambah Data
  </a>
  </div>

  <br>

  <div class="overflow-x-auto">
    <table class="min-w-full w-full mx-auto bg-white border border-collapse border-gray-400">
      <thead class="bg-gray-100">
        @if (!$users->isEmpty())
          <tr>
            <th class="px-4 py-2 border-b border-gray-400 text-center text-sm font-bold text-black">NIK</th>
            <th class="px-4 py-2 border-b border-gray-400 text-center text-sm font-bold text-black">Nama Lengkap</th>
            <th class="px-4 py-2 border-b border-gray-400 text-center text-sm font-bold text-black">Alamat</th>
            <th class="px-4 py-2 border-b border-gray-400 text-center text-sm font-bold text-black">Nomor Telp</th>
            <th class="px-4 py-2 border-b border-gray-400 text-center text-sm font-bold text-black">Status Warga</th>
            <th class="px-4 py-2 border-b border-gray-400 text-center text-sm font-bold text-black">Aksi</th>
          </tr>
        @endif
      </thead>
      <tbody>
        @if ($users->isEmpty())
          <tr class="flex justify-center">
              <td class="px-2 py-4">
                  Belum ada data.
              </td>
          </tr>
        @else   
          @foreach ($users as $user)  
          <tr>
            <td class="px-4 py-5 text-center border-b border-gray-400">{{ $user->NIK }}</td>
            <td class="px-4 py-5 text-center max-w-xs break-words border-b border-gray-400">{{ $user->nama_lengkap }}</td>
            <td class="px-4 py-5 text-center border-b border-gray-400">{{ $user->alamat }}</td>
            <td class="px-4 py-5 text-center border-b border-gray-400">{{ $user->nomor_telepon }}</td>
            <td class="px-4 py-5 text-center text-white border-b border-gray-400">
              @if ($user->status_warga)
              <span class="px-4 py-2 bg-green-500 text-white rounded">
                Aktif
              </span>
              @else
              <span class="px-4 py-2 bg-red-500 text-white rounded">
                Tidak Aktif
              </span>
              @endif
            </td>
            <td class="py-5 text-center border-b border-gray-400">
              <form class="flex justify-center" id="confirmForm-{{ $user->id }}" action="/admin/update_warga" method="POST">
                @csrf
                @if (!$user->status_warga)
                <button class="px-4 py-2 bg-green-500 text-white rounded hover:bg-green-700" onclick="konfirmasi(event, '{{ $user->id }}', 1)">
                  Aktifkan
                </button>
                @else
                <button class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-700" onclick="konfirmasi(event, '{{ $user->id }}', 0)">
                  Nonaktifkan
                </button>
                @endif
                <input type="hidden" name="id" id="id-{{ $user->id }}">
                <input type="hidden" name="status_warga" id="status-{{ $user->id }}">
              </form>
            </td>
          </tr>
          @endforeach
        @endif
      </tbody>
    </table>

    <div class="mt-4">
      {{ $users->links('pagination::tailwind') }}
    </div>

  </div>
</div>

<script>
  let id, status;
  function konfirmasi(event, idValue, statusValue){
    event.preventDefault();
    if (statusValue == 1){
      document.getElementById('terimaModal').classList.remove('hidden');
    } else if (statusValue == 0){
      document.getElementById('batalModal').classList.remove('hidden');
    }
    id = idValue;
    status = statusValue;
  }
  
  document.getElementById('confirmTerima').addEventListener('click', function(){
    document.getElementById('id-' + id).value = id;
    document.getElementById('status-' + id).value = status;
    document.getElementById('confirmForm-' + id).submit();
  });

  document.getElementById('confirmBatal').addEventListener('click', function(){
    document.getElementById('id-' + id).value = id;
    document.getElementById('status-' + id).value = status;
    document.getElementById('confirmForm-' + id).submit();
  });
    
  document.getElementById('cancelTerima').addEventListener('click', function () {
      document.getElementById('terimaModal').classList.add('hidden');
  });

  document.getElementById('cancelBatal').addEventListener('click', function () {
      document.getElementById('batalModal').classList.add('hidden');
  });
</script>
@endsection