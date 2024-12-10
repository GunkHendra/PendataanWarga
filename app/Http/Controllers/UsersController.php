<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Desa;
use App\Models\User;
use App\Models\Payment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    function index(){
        $threeMonthsAgo = Carbon::now()->subMonths(2)->startOfMonth();
        $currentMonthEnd = Carbon::now()->endOfMonth();
        return view('/user/index', [
            'title' => 'Dashboard',
            'user' => Auth::user(),
            // 'payment' => Payment::where('user_id', Auth::user()->id)->where('tanggal_iuran', '>=', $currentMonthStart)->limit(1)->get(),
            'payments' => Payment::where('user_id', Auth::user()->id)->whereBetween('tanggal_iuran', [$threeMonthsAgo, $currentMonthEnd])->limit(3)->orderBy('tanggal_iuran', 'desc')->get(),
            'desa' => Desa::first(),
            'month' => $currentMonthEnd->translatedFormat('F'),
        ]);
    }

    function riwayat_iuran(){
        $currentDay = Carbon::now()->endOfDay();
        
        $payment = Payment::where('user_id', Auth::user()->id)->where('tanggal_iuran', '<', $currentDay);

        if (request('sort_by') && request('sort_order')){
            $payment->orderBy(request('sort_by'), request('sort_order'));
        }


        return view('/user/riwayat_iuran', [
            'title' => 'Riwayat Iuran',
            'payments' => $payment->paginate(10)->withQueryString(),
            'desa' => Desa::first(),
            'user' => Auth::user(),
        ]);
    }
}
