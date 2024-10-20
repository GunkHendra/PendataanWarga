<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    function index(){
        return view('/user/index', [
            'title' => 'Dashboard',
        ]);
    }

    function riwayat_iuran(){
        return view('/user/riwayat_iuran', [
            'title' => 'Riwayat Iuran',
        ]);
    }
}
