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
}
