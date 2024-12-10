@extends('layouts/layout')

@section('content')
<div id="terimaModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-10 hidden">
  <div class="bg-gray-900 p-6 rounded-lg shadow-lg">
      <h2 class="text-xl text-white font-semibold mb-4">Terima Iuran</h2>
      <p class="text-white">Apakah Anda yakin untuk menerima pembayaran iuran ini?</p>  
      <div class="mt-6 flex justify-end gap-4">
          <button id="cancelTerima" class="bg-red-500 hover:bg-red-700 text-white py-2 px-4 rounded">Tidak</button>
          <button id="confirmTerima" class="bg-green-500 hover:bg-green-700 text-white py-2 px-4 rounded">Iya</button>
      </div>
  </div>
</div>

<div id="batalModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-10 hidden">
  <div class="bg-gray-900 p-6 rounded-lg shadow-lg">
      <h2 class="text-xl text-white font-semibold mb-4">Batalkan Iuran</h2>
      <p class="text-white">Apakah Anda yakin untuk membatalkan pembayaran iuran ini?</p>  
      <div class="mt-6 flex justify-end gap-4">
          <button id="cancelBatal" class="bg-red-500 hover:bg-red-700 text-white py-2 px-4 rounded">Tidak</button>
          <button id="confirmBatal" class="bg-green-500 hover:bg-green-700 text-white py-2 px-4 rounded">Iya</button>
      </div>
  </div>
</div>

<div class="p-10 rounded-lg">
  <div class="flex items-center justify-center w-full">
    <div class="w-full max-w-lg">
      <form action="/admin/data_iuran" method="GET" class="relative flex items-center justify-between gap-2">
        <input
          type="text"
          class="w-full px-4 py-2 border bg-white text-black border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="Cari Data Iuran Siapa?" name="search"/>
          <img src="/assets/dashboard-icon/IconSearch.png" alt="searchIcon" class="absolute right-3 top-1/2 transform -translate-y-1/2 w-10 h-full">
      </form>
    </div>
  </div>

<br>

{{-- <div class="flex justify-end">
<a href="/admin/pendataan_iuran" class="bg-emerald-400 border border-emerald-400 text-white font-bold py-2 px-4 rounded hover:bg-emerald-400 hover:text-white">
  Klik Untuk Menambah Data
</a>
</div> --}}

<br>

<div class="overflow-x-auto">
  <table class="min-w-full w-full mx-auto bg-gray-700 border-none text-white rounded-lg">
    <thead>
      @if (!$payments->isEmpty())
      <tr>
        <th class="p-4 text-center text-lg font-medium border-b border-gray-400"><a class="flex justify-center gap-2" href="{{ route('data_iuran', array_merge(request()->query(), ['sort_by' => 'status_warga', 'sort_order' => request('sort_order', 'asc') === 'asc' ? 'desc' : 'asc'])) }}">Status Warga
          @if (request('sort_by') === 'status_warga')
            <img src="/assets/dashboard-icon/{{ request('sort_order') === 'asc' ? 'dropDown-putih.png' : 'flowUp-putih.png' }}" alt="icon">
          @endif
          </a>
        </th>
        <th class="p-4 text-center text-lg font-medium border-b border-gray-400"><a class="flex justify-center gap-2" href="{{ route('data_iuran', array_merge(request()->query(), ['sort_by' => 'nik', 'sort_order' => request('sort_order', 'asc') === 'asc' ? 'desc' : 'asc'])) }}">NIK
          @if (request('sort_by') === 'nik')
            <img src="/assets/dashboard-icon/{{ request('sort_order') === 'asc' ? 'dropDown-putih.png' : 'flowUp-putih.png' }}" alt="icon">
          @endif
          </a>
        </th>
        <th class="p-4 text-center text-lg font-medium border-b border-gray-400"><a class="flex justify-center gap-2" href="{{ route('data_iuran', array_merge(request()->query(), ['sort_by' => 'nama_lengkap', 'sort_order' => request('sort_order', 'asc') === 'asc' ? 'desc' : 'asc'])) }}">Nama Lengkap
          @if (request('sort_by') === 'nama_lengkap')
            <img src="/assets/dashboard-icon/{{ request('sort_order') === 'asc' ? 'dropDown-putih.png' : 'flowUp-putih.png' }}" alt="icon">
          @endif
          </a>
        </th>
        <th class="p-4 text-center text-lg font-medium border-b border-gray-400"><a class="flex justify-center gap-2" href="{{ route('data_iuran', array_merge(request()->query(), ['sort_by' => 'tanggal_iuran', 'sort_order' => request('sort_order', 'asc') === 'asc' ? 'desc' : 'asc'])) }}">Tanggal Iuran
          @if (request('sort_by') === 'tanggal_iuran')
            <img src="/assets/dashboard-icon/{{ request('sort_order') === 'asc' ? 'dropDown-putih.png' : 'flowUp-putih.png' }}" alt="icon">
          @endif
          </a>
        </th>
        <th class="p-4 text-center text-lg font-medium border-b border-gray-400"><a class="flex justify-center gap-2" href="{{ route('data_iuran', array_merge(request()->query(), ['sort_by' => 'nominal_iuran', 'sort_order' => request('sort_order', 'asc') === 'asc' ? 'desc' : 'asc'])) }}">Nominal Iuran
          @if (request('sort_by') === 'nominal_iuran')
            <img src="/assets/dashboard-icon/{{ request('sort_order') === 'asc' ? 'dropDown-putih.png' : 'flowUp-putih.png' }}" alt="icon">
          @endif
          </a>
        </th>
        <th class="p-4 text-center text-lg font-medium border-b border-gray-400"><a class="flex justify-center gap-2" href="{{ route('data_iuran', array_merge(request()->query(), ['sort_by' => 'status_iuran', 'sort_order' => request('sort_order', 'asc') === 'asc' ? 'desc' : 'asc'])) }}">Status Iuran
          @if (request('sort_by') === 'status_iuran')
            <img src="/assets/dashboard-icon/{{ request('sort_order') === 'asc' ? 'dropDown-putih.png' : 'flowUp-putih.png' }}" alt="icon">
          @endif
          </a>
        </th>
      </tr>
      @endif
    </thead>
    <tbody>
      @if ($payments->isEmpty())
        <tr class="flex justify-center">
            <td class="px-2 py-4">
                Belum ada data.
            </td>
        </tr>
      @else
        @foreach ($payments as $payment)
          <tr>
            <td class="px-4 py-5 text-center">
              {{-- {{ dd($payment->user->status_warga) }} --}}
              @if ($payment->user->status_warga)
              <span class="px-3 bg-green-500 text-white rounded-full">
                {{-- Aktif --}}
              </span>
              @else
              <span class="px-3 bg-red-500 text-white rounded-full">
                {{-- Tidak Aktif --}}
              </span>
              @endif
            </td>
            <td class="px-4 py-5 text-center">{{ $payment->user->NIK }}</td>
            <td class="px-4 py-5 text-center">{{ $payment->user->nama_lengkap }}</td>
            <td class="px-4 py-5 text-center">{{ $payment->tanggal_iuran }}</td>
            <td class="px-4 py-5 text-center">{{ number_format((int)$payment->nominal_iuran, 0, ',', '.') }}</td>
            {{-- <td class="px-4 py-5 text-center">
              @if ($payment->status_iuran)
                <span class="px-4 py-2 bg-green-500 text-white rounded">
                  Lunas
                </span>
              @else
                <span class="px-4 py-2 bg-red-500 text-white rounded">
                  Belum Lunas
                </span>
              @endif
            </td> --}}
            <td class="px-4 py-5 text-center">
              <form id="confirmForm-{{ $payment->id }}" action="/admin/update_iuran" method="POST">
                @csrf
                @if (!$payment->status_iuran)
                <button class="px-4 py-2 bg-red-500 text-white rounded hover:bg-green-500 transition duration-200" onclick="konfirmasi(event, '{{ $payment->id }}', 1)">
                  Belum Lunas
                </button>
                @else
                <button class="px-4 py-2 bg-green-500 text-white rounded hover:bg-red-500 transition duration-200" onclick="konfirmasi(event, '{{ $payment->id }}', 0)">
                  Lunas
                </button>
                @endif
                <input type="hidden" name="id" id="id-{{ $payment->id }}">
                <input type="hidden" name="status_iuran" id="status-{{ $payment->id }}">
                <input type="hidden" name="status_warga" value="{{ $payment->user->status_warga }}"">
                <input type="hidden" name="page" id="current-page" value="{{ request('page', 1) }}">
              </form>
            </td>
          </tr>
        @endforeach
      @endif
    </tbody>
  </table>

    <div class="mt-4">
      {{-- {{ $payments->links('pagination::tailwind') }} --}}
      {{ $payments->appends(request()->query())->links('pagination::tailwind') }}
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

  document.addEventListener('DOMContentLoaded', function () {
    const forms = document.querySelectorAll('form[id^="confirmForm"]');
    forms.forEach(form => {
        form.addEventListener('submit', function (e) {
            const currentPage = new URLSearchParams(window.location.search).get('page') || 1;
            form.querySelector('#current-page').value = currentPage;
        });
    });
});

</script>
@endsection
