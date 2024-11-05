<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Payment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    function index(){
        return view('/user/index', [
            'title' => 'Dashboard',
            'user' => Auth::user(),
            'payment' => Payment::where('user_id', Auth::user()->id)->latest()->limit(1)->get(),
        ]);
    }

    function riwayat_iuran(){
        return view('/user/riwayat_iuran', [
            'title' => 'Riwayat Iuran',
            'payments' => Payment::where('user_id', Auth::user()->id)->latest()->get(),
        ]);
    }
}
