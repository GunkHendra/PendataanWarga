<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class PagesController extends Controller
{
    function index(){
        return view('/admin/index', [
            'title' => 'Dashboard',
        ]);
    }

    function PendataanWarga(){
        return view('/admin/Pendataan_warga', [
            'title' => 'Pendataan Warga',
        ]);
    }
}
