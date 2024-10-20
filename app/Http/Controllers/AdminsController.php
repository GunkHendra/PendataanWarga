<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminsController extends Controller
{
    function index(){
        return view('/admin/index', [
            'title' => 'Dashboard',
        ]);
    }

    function PendataanWarga(){
        return view('/admin/pendataan_warga', [
            'title' => 'Pendataan Warga',
        ]);
    }

    function PendataanIuran(){
        return view('/admin/pendataan_iuran_warga', [
            'title' => 'Pendataan Iuran Warga',
        ]);
    }
}
