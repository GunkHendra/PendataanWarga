<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Iuran;
use App\Models\Payment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

class AdminsController extends Controller
{
    function index(){
        $startOfMonth = Carbon::now()->startOfMonth();
        $endOfMonth = Carbon::now()->endOfMonth();
        
        return view('/admin/index', [
            'title' => 'Dashboard',
            'month' => Carbon::now()->format('F'),
            'total_warga' => User::where('status_warga', '1')->where('is_admin', '0')->count(),
            'total_payment' => Payment::where('status_iuran', '1')->whereBetween('tanggal_iuran', [$startOfMonth, $endOfMonth])->sum('nominal_iuran'),
            'total_warga_lunas' => Payment::where('status_iuran', '1')->whereBetween('tanggal_iuran', [$startOfMonth, $endOfMonth])->count(),
            'total_warga_datang' => User::where('status_warga', '1')->where('is_admin', '0')->whereBetween('created_at', [$startOfMonth, $endOfMonth])->count(),
            'total_payment_belum' => Payment::where('status_iuran', '0')->whereBetween('tanggal_iuran', [$startOfMonth, $endOfMonth])->sum('nominal_iuran'),
            'total_warga_belum' => Payment::where('status_iuran', '0')->whereBetween('tanggal_iuran', [$startOfMonth, $endOfMonth])->count(),
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
            'users' => User::all(),
        ]);
    }

    function data_iuran(){
        $payment = Payment::orderBy('tanggal_iuran', 'desc');

        if (request('search')){
            $payment->where('NIK', 'like', '%' . request('search') . '%');
        }

        return view('/admin/data_iuran', [
            'title' => 'Data Iuran Warga',
            'payments' => $payment->paginate(5)->withQueryString(),
            'users' => User::all(),
        ]);
    }

    function data_warga(){
        $user = User::where('is_admin', '0')->orderBy('NIK', 'asc');

        if (request('search')){
            $user->where('nama_lengkap', 'like', '%' . request('search') . '%')->orWhere('NIK', 'like', '%' . request('search') . '%');
        }

        return view('/admin/data_warga', [
            'title' => 'Data Warga Pendatang',
            'users' => $user->paginate(5)->withQueryString(),
        ]);
    }

    public function update_iuran(Request $request){
        $validated = $request->validate([
            'id' => ['required'],
            'status_iuran' => ['required'],
        ]);
        Payment::where('id', $validated['id'])->update(['status_iuran' => $validated['status_iuran']]);
        return redirect('/admin/data_iuran')->with('success', 'Update data berhasil!');
    }
}
