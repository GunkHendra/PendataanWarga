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

    function data_iuran(){
        return view('/admin/data_iuran', [
            'title' => 'Data Iuran Warga',
        ]);
    }

    function data_warga(){
        return view('/admin/data_warga', [
            'title' => 'Data Warga Pendatang',
        ]);
    }
}
