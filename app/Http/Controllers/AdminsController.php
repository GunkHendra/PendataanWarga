<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Desa;
use App\Models\User;
use App\Models\Iuran;
use App\Models\Payment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

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
            'admin' => Auth::user(),
            'desa' => Desa::first(),
        ]);
    }

    function pendataan_warga(){
        return view('/admin/pendataan_warga', [
            'title' => 'Pendataan Warga',
            'admin' => Auth::user(),
            'desa' => Desa::first(),
        ]);
    }

    function pendataan_iuran(){
        return view('/admin/pendataan_iuran_warga', [
            'title' => 'Pendataan Iuran Warga',
            'users' => User::all(),
            'admin' => Auth::user(),
            'desa' => Desa::first(),
        ]);
    }

    function data_iuran(){
        // $payment = Payment::join('users', 'payments.user_id', '=', 'users.id')->where('isActive', '1')->orderBy('tanggal_iuran', 'desc');
        $payment = Payment::where('isActive', '1')->orderBy('tanggal_iuran', 'desc');

        if (request('search')){
            $payment->where('NIK', 'like', '%' . request('search') . '%')->orWhere('nama_lengkap', 'like', '%' . request('search') . '%');
        }

        return view('/admin/data_iuran', [
            'title' => 'Data Iuran Warga',
            'payments' => $payment->paginate(5)->withQueryString(),
            'users' => User::all(),
            'admin' => Auth::user(),
            'desa' => Desa::first(),
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
            'admin' => Auth::user(),
            'desa' => Desa::first(),
        ]);
    }

    public function update_iuran(Request $request){
        $validated = $request->validate([
            'id' => ['required'],
            'status_iuran' => ['required'],
            'status_warga' => ['required'],
        ]);
        
        if ($validated['status_warga']){
            Payment::where('id', $validated['id'])->update(['status_iuran' => $validated['status_iuran']]);
        } else{
            Payment::where('id', $validated['id'])->update(['status_iuran' => $validated['status_iuran'], 'isActive' => '0']);
        }
        return redirect('/admin/data_iuran')->with('success', 'Update data berhasil!');
    }

    public function update_warga(Request $request){
        $validated = $request->validate([
            'id' => ['required'],
            'status_warga' => ['required'],
        ]);
        User::where('id', $validated['id'])->update(['status_warga' => $validated['status_warga']]);

        if (!$validated['status_warga']){
            Payment::where('user_id', $validated['id'])->where('isActive', '1')->where('status_iuran', '0')->update(['isActive' => '0']);
        }
        else if ($validated['status_warga']){
            $currentMonthStart = Carbon::now()->startOfMonth();
            Payment::where('user_id', $validated['id'])->where('isActive', '0')->where('status_iuran', '0')->where('tanggal_iuran', '>=', $currentMonthStart)->update(['isActive' => '1']);
        }
        // $payments = Payment::where('user_id', $validated['id']);
        // foreach ($payments as $payment){
        //     if (!$payment->status_iuran){
        //         Payment::where('id', $payment->id)->update(['isActive' => '0']);
        //     }
        // }

        return redirect('/admin/data_warga')->with('success', 'Update data berhasil!');
    }
}
