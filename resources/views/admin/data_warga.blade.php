@extends('layouts/layout')

@section('content')
<div id="terimaModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-70 z-10 hidden">
  <div class="bg-gray-900 p-6 rounded-lg shadow-lg">
      <h2 class="text-xl text-white font-semibold mb-4">Aktifkan Status Warga</h2>
      <p class="text-white">Apakah Anda yakin untuk mengaktifkan status warga ini?</p>
      <div class="mt-6 flex justify-end gap-4">
          <button id="cancelTerima" class="bg-red-500 hover:bg-red-700 text-white py-2 px-4 rounded">Tidak</button>
          <button id="confirmTerima" class="bg-green-500 hover:bg-green-700 text-white py-2 px-4 rounded">Iya</button>
      </div>
  </div>
</div>

<div id="batalModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-10 hidden">
  <div class="bg-gray-900 p-6 rounded-lg shadow-lg">
      <h2 class="text-xl text-white font-semibold mb-4">Nonaktifkan Warga</h2>
      <p class="text-white">Apakah Anda yakin untuk menonaktifkan status warga ini?</p>
      <div class="mt-6 flex justify-end gap-4">
          <button id="cancelBatal" class="bg-red-500 hover:bg-red-700 text-white py-2 px-4 rounded">Tidak</button>
          <button id="confirmBatal" class="bg-green-500 hover:bg-green-700 text-white py-2 px-4 rounded">Iya</button>
      </div>
  </div>
</div>

<div class="p-10 rounded-lg">
  <div class="flex items-center justify-center w-full">
    <div class="w-full max-w-lg">
      <form action="/admin/data_warga" method="GET" class="relative flex items-center justify-between gap-2">
        <input
          type="text"
          class="w-full px-4 py-2 border bg-white text-black border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="Mau Cari Data Siapa?" name="search"/>
          <input type="hidden" name="sort_by" value="{{ request('sort_by') }}">
          <input type="hidden" name="sort_order" value="{{ request('sort_order') }}">
          <img src="/assets/dashboard-icon/IconSearch.png" alt="searchIcon" class="absolute right-3 top-1/2 transform -translate-y-1/2 w-10 h-full">
      </form>
    </div>
  </div>

  <br>

  <div class="flex justify-end h-12">
  <a href="/admin/pendataan_warga" class="bg-blue-600 text-white font-bold flex items-center py-2 px-4 rounded hover:bg-blue-800 transition duration-300">
    Klik Untuk Menambah Data
  </a>
  </div>

  <br>

  <div class="overflow-x-auto">
    <table class="min-w-full w-full mx-auto bg-gray-700 border-none text-white rounded-lg">
      <thead>
        @if (!$users->isEmpty())
          <tr>
            {{-- <th class="p-4 text-center text-lg font-medium border-b border-gray-400">NIK</th> --}}
            <th class="p-4 text-center text-lg font-medium border-b border-gray-400"><a class="flex justify-center gap-2" href="{{ route('data_warga', array_merge(request()->query(), ['sort_by' => 'nik', 'sort_order' => request('sort_order', 'asc') === 'asc' ? 'desc' : 'asc'])) }}">NIK
              @if (request('sort_by') === 'nik')
                <img src="/assets/dashboard-icon/{{ request('sort_order') === 'asc' ? 'dropDown-putih.png' : 'flowUp-putih.png' }}" alt="icon">
              @endif
              </a>
            </th>
            <th class="p-4 text-center text-lg font-medium border-b border-gray-400"><a class="flex justify-center gap-2" href="{{ route('data_warga', array_merge(request()->query(), ['sort_by' => 'nama_lengkap', 'sort_order' => request('sort_order', 'asc') === 'asc' ? 'desc' : 'asc'])) }}">Nama Lengkap
              @if (request('sort_by') === 'nama_lengkap')
                <img src="/assets/dashboard-icon/{{ request('sort_order') === 'asc' ? 'dropDown-putih.png' : 'flowUp-putih.png' }}" alt="icon">
              @endif
              </a>
            </th>
            <th class="p-4 text-center text-lg font-medium border-b border-gray-400"><a class="flex justify-center gap-2" href="{{ route('data_warga', array_merge(request()->query(), ['sort_by' => 'alamat', 'sort_order' => request('sort_order', 'asc') === 'asc' ? 'desc' : 'asc'])) }}">Alamat
              @if (request('sort_by') === 'alamat')
                <img src="/assets/dashboard-icon/{{ request('sort_order') === 'asc' ? 'dropDown-putih.png' : 'flowUp-putih.png' }}" alt="icon">
              @endif
              </a>
            </th>
            <th class="p-4 text-center text-lg font-medium border-b border-gray-400"><a class="flex justify-center gap-2" href="{{ route('data_warga', array_merge(request()->query(), ['sort_by' => 'nomor_telepon', 'sort_order' => request('sort_order', 'asc') === 'asc' ? 'desc' : 'asc'])) }}">Nomor Telepon
              @if (request('sort_by') === 'nomor_telepon')
                <img src="/assets/dashboard-icon/{{ request('sort_order') === 'asc' ? 'dropDown-putih.png' : 'flowUp-putih.png' }}" alt="icon">
              @endif
              </a>
            </th>
            <th class="p-4 text-center text-lg font-medium border-b border-gray-400"><a class="flex justify-center gap-2" href="{{ route('data_warga', array_merge(request()->query(), ['sort_by' => 'status_warga', 'sort_order' => request('sort_order', 'asc') === 'asc' ? 'desc' : 'asc'])) }}">Status Warga
              @if (request('sort_by') === 'status_warga')
                <img src="/assets/dashboard-icon/{{ request('sort_order') === 'asc' ? 'dropDown-putih.png' : 'flowUp-putih.png' }}" alt="icon">
              @endif
              </a>
            </th>
            {{-- <th class="p-4 text-center text-lg font-medium border-b border-gray-400">Nama Lengkap</th>
            <th class="p-4 text-center text-lg font-medium border-b border-gray-400">Alamat</th>
            <th class="p-4 text-center text-lg font-medium border-b border-gray-400">Nomor Telp</th>
            <th class="p-4 text-center text-lg font-medium border-b border-gray-400">Status Warga</th> --}}
            <th class="p-4 text-center text-lg font-medium border-b border-gray-400">Aksi</th>
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
            <td class="px-4 py-5 text-center">{{ $user->NIK }}</td>
            <td class="px-4 py-5 text-center max-w-xs break-words">{{ $user->nama_lengkap }}</td>
            <td class="px-4 py-5 text-center">{{ $user->alamat }}</td>
            <td class="px-4 py-5 text-center">{{ $user->nomor_telepon }}</td>
            <td class="px-4 py-5 text-center text-white">
              @if ($user->status_warga)
              <span class="px-3 bg-green-500 text-white rounded-full">
                {{-- Aktif --}}
              </span>
              @else
              <span class="px-3 bg-red-500 text-white rounded-full">
                {{-- Tidak Aktif --}}
              </span>
              @endif
            </td>
            <td class="py-5 text-center flex items-center space-x-4 justify-center">
              <form class="flex justify-center" id="confirmForm-{{ $user->id }}" action="/admin/update_warga" method="POST">
                @csrf
                @if (!$user->status_warga)
                <button class="px-4 py-2 bg-green-500 text-white rounded hover:bg-green-800 transition duration-200" onclick="konfirmasi(event, '{{ $user->id }}', 1)">
                  Aktifkan
                </button>
                @else
                <button class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-800 transition duration-200" onclick="konfirmasi(event, '{{ $user->id }}', 0)">
                  Nonaktifkan
                </button>
                @endif
                <input type="hidden" name="id" id="id-{{ $user->id }}">
                <input type="hidden" name="status_warga" id="status-{{ $user->id }}">
                <input type="hidden" name="search" value="{{ request('search') }}">
                <input type="hidden" name="sort_by" value="{{ request('sort_by') }}">
                <input type="hidden" name="sort_order" value="{{ request('sort_order') }}">
                <input type="hidden" name="page" id="current-page" value="{{ request('page', 1) }}">
              </form>
              <form action="/admin/edit_warga" method="GET">
                <input type="hidden" name="id" value="{{ $user->id }}">
                <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-800 transition duration-200">Edit</button>
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
