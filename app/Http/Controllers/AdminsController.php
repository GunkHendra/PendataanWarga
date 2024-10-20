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

    function pendataan_warga(){
        return view('/admin/pendataan_warga', [
            'title' => 'Pendataan Warga',
        ]);
    }

    function pendataan_iuran(){
        return view('/admin/pendataan_iuran_warga', [
            'title' => 'Pendataan Iuran Warga',
        ]);
    }
}
