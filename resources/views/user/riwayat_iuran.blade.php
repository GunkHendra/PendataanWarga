@extends('layouts/layout')

@section('content')
<div class="overflow-x-auto p-10rounded-lg">
    <table class="min-w-full w-full mx-auto bg-gray-700 border-none text-white rounded-lg">
        <thead>
            @if (!$payments->isEmpty())
            <tr>
                <th class="p-4 text-center text-lg font-medium border-b border-gray-400">No</th>
                <th class="p-4 text-center text-lg font-medium border-b border-gray-400">Status Warga</th>
                <th class="p-4 text-center text-lg font-medium border-b border-gray-400">Tanggal Iuran</th>
                <th class="p-4 text-center text-lg font-medium border-b border-gray-400">Nominal Iuran</th>
                <th class="p-4 text-center text-lg font-medium border-b border-gray-400">Status Iuran</th>
            </tr>
            @endif
        </thead>
        <tbody>
            @if ($payments->first() === null)
            <tr class="flex justify-center">
                <td class="px-2 py-4" colspan="5">
                    Anda masih belum memiliki data iuran.
                </td>
            </tr>
            @else
                @foreach ($payments as $index => $payment)
                <tr>
                    <td class="px-4 py-5 text-center">{{ $index + 1 }}</td>
                    <td class="px-4 py-5 text-center">
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
                    <td class="px-4 py-5 text-center">{{ $payment->tanggal_iuran }}</td>
                    <td class="px-4 py-5 text-center">{{ number_format((int)$payment->nominal_iuran, 0, ',', '.') }}</td>
                    <td class="px-4 py-5 text-center">
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
