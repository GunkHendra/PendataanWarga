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
        $currentMonthStart = Carbon::now()->startOfMonth();
        return view('/user/index', [
            'title' => 'Dashboard',
            'user' => Auth::user(),
            'payment' => Payment::where('user_id', Auth::user()->id)->where('tanggal_iuran', '>=', $currentMonthStart)->limit(1)->get(),
            'desa' => Desa::first(),
        ]);
    }

    function riwayat_iuran(){
        return view('/user/riwayat_iuran', [
            'title' => 'Riwayat Iuran',
            'payments' => Payment::where('user_id', Auth::user()->id)->latest()->paginate(5)->withQueryString(),
            'desa' => Desa::first(),
            'user' => Auth::user(),
        ]);
    }
}
