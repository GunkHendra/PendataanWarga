@extends('layouts/layout')

@section('content')
<div class="overflow-x-auto p-10 bg-white rounded-lg">
    <table class="table-auto w-full border border-gray-400">
        <thead class="bg-gray-100 text-black">
            @if (!$payments->isEmpty())
            <tr>
                <th class="px-4 py-4 text-center border-b border-gray-400">No</th>
                <th class="px-4 py-4 text-center border-b border-gray-400">Status Warga</th>
                <th class="px-4 py-2 text-center border-b border-gray-400">Tanggal Iuran</th>
                <th class="px-4 py-2 text-center border-b border-gray-400">Nominal Iuran</th>
                <th class="px-4 py-2 text-center border-b border-gray-400">Status Iuran</th>
            </tr>
            @endif
        </thead>
        <tbody class="bg-white">
            @if ($payments->first() === null)
            <tr class="flex justify-center">
                <td class="px-2 py-4" colspan="5">
                    Anda masih belum memiliki data iuran.
                </td>
            </tr>
            @else
                @foreach ($payments as $index => $payment)
                <tr class="hover:bg-gray-50">
                    <td class="px-4 py-5 text-center border-b border-gray-400">{{ $index + 1 }}</td>
                    <td class="px-4 py-5 text-center border-b border-gray-400">
                        @if ($payment->user->status_warga)
                        <span class="px-4 py-2 bg-green-500 text-white rounded">
                            Aktif
                        </span>
                        @else
                        <span class="px-4 py-2 bg-red-500 text-white rounded">
                            Tidak Aktif
                        </span>
                        @endif
                    </td>
                    <td class="px-4 py-5 text-center border-b border-gray-400">{{ $payment->tanggal_iuran }}</td>
                    <td class="px-4 py-5 text-center border-b border-gray-400">{{ $payment->nominal_iuran }}</td>
                    <td class="px-4 py-5 text-center border-b border-gray-400">
                        @if ($payment->status_iuran)
                        <span class="px-4 py-2 bg-green-500 text-white rounded">
                            Lunas
                        </span>
                        @else
                        <span class="px-4 py-2 bg-red-500 text-white rounded">
                            Belum Lunas
                        </span>
                        @endif
                    </td>
                </tr>
                @endforeach
            @endif
        </tbody>
    </table>
<div class="mt-4">
    {{ $payments->links('pagination::tailwind') }}
    </div>
</div>
@endsection
