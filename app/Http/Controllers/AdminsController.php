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

        $data = User::where('is_admin', '0')
            ->selectRaw('MONTH(updated_at) as month, COUNT(*) as total')
            ->groupBy('month')
            ->orderBy('month')
            ->pluck('total', 'month');

        // Format data for the chart
        $formattedData = [];
        for ($i = 1; $i <= 12; $i++) {
            $formattedData[] = $data[$i] ?? 0; // Default to 0 if no data for a month
        }

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
            'chartData' => $formattedData,
        ]);
    }

    function pendataan_warga(){
        return view('/admin/pendataan_warga', [
            'title' => 'Pendataan Warga',
            'admin' => Auth::user(),
            'desa' => Desa::first(),
        ]);
    }

    // function pendataan_iuran(){
    //     return view('/admin/pendataan_iuran_warga', [
    //         'title' => 'Pendataan Iuran Warga',
    //         'users' => User::all(),
    //         'admin' => Auth::user(),
    //         'desa' => Desa::first(),
    //     ]);
    // }

    function data_warga(){
        $user = User::where('is_admin', '0');

        if (request('sort_by') && request('sort_order')){
            $user->orderBy(request('sort_by'), request('sort_order'));
        }

        if (request('search')){
            $user->where(function ($query) {
                $query->where('nama_lengkap', 'like', '%' . request('search') . '%')
                      ->orWhere('NIK', 'like', '%' . request('search') . '%')
                      ->orWhere('nomor_telepon', 'like', '%' . request('search') . '%')
                      ->orWhere('alamat', 'like', '%' . request('search') . '%');
            })->where('is_admin', '0');

            if (request('sort_by') && request('sort_order')){
                $user->orderBy(request('sort_by'), request('sort_order'));
            }
        }

        return view('/admin/data_warga', [
            'title' => 'Data Warga Pendatang',
            'users' => $user->paginate(7)->withQueryString(),
            'admin' => Auth::user(),
            'desa' => Desa::first(),
        ]);
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

        $page = $request->get('page', 1);
        $search = $request->get('search', '');
        $sort_by = $request->get('sort_by', '');
        $sort_order = $request->get('sort_order', '');
        return redirect('/admin/data_warga?page=' . $page . '&search=' . $search . '&sort_by=' . $sort_by . '&sort_order=' . $sort_order)->with('success', 'Update data berhasil!');
    }

    function data_iuran(){
        $payment = Payment::with(['user'])->where('isActive', '1');

        if (request('sort_by') && request('sort_order')){
            // if (request('sort_by') == 'nik' || request('sort_by') == 'status_warga' || request('sort_by') == 'nama_lengkap'){
                $payment->join('users', 'users.id', '=', 'payments.user_id')
                        ->select('payments.*', 'users.nama_lengkap', 'users.NIK', 'users.nama_lengkap', 'users.status_warga')
                        ->orderBy(request('sort_by'), request('sort_order'));
            // } else {
                // $payment->orderBy(request('sort_by'), request('sort_order'));
            // }
        }
    
        if (request('search')){
            $payment->whereHas('user', function ($query) {
                $query->where('NIK', 'like', '%' . request('search') . '%')
                      ->orWhere('nama_lengkap', 'like', '%' . request('search') . '%')
                      ->orWhere('tanggal_iuran', 'like', '%' . request('search') . '%')
                      ->orWhere('nominal_iuran', 'like', '%' . request('search') . '%');
            });
            if (request('sort_by') && request('sort_order')){
                $payment->orderBy(request('sort_by'), request('sort_order'));
            }
        }

        return view('/admin/data_iuran', [
            'title' => 'Data Iuran Warga',
            'payments' => $payment->paginate(7)->withQueryString(),
            'users' => User::all(),
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

        // return redirect('/admin/data_iuran')->with('success', 'Update data berhasil!');
        $page = $request->get('page', 1);
        $search = $request->get('search', '');
        $sort_by = $request->get('sort_by', '');
        $sort_order = $request->get('sort_order', '');
        return redirect('/admin/data_iuran?page=' . $page . '&search=' . $search . '&sort_by=' . $sort_by . '&sort_order=' . $sort_order)->with('success', 'Status iuran berhasil diperbarui!');
    }

    public function wargaPendatangChart()
    {
        $data = User::where('is_admin', '0')
            ->selectRaw('MONTH(updated_at) as month, COUNT(*) as total')
            ->groupBy('month')
            ->orderBy('month')
            ->pluck('total', 'month');

        // Format data for the chart
        $formattedData = [];
        for ($i = 1; $i <= 12; $i++) {
            $formattedData[] = $data[$i] ?? 0; // Default to 0 if no data for a month
        }

        return view('warga.chart', [
            'chartData' => $formattedData,
        ]);
    }

    public function pelaporan(Request $request)
    {
        $data = [];
        $value = 0;
        $startOfMonth = Carbon::now()->startOfMonth();
        $endOfMonth = Carbon::now()->endOfMonth();

        if ($request->query('filter')){
            $filter = $request->query('filter');
        } else{
            $filter = '1';
        }

        switch ($filter) {
            case '1': // Total Warga Pendatang
                $data = User::where('is_admin', '0')->orderBy('NIK', 'asc')->where('status_warga', '1')->get();
                $value = $data->count();
                break;
            case '2': // Total Warga Nambah
                $data = User::where('status_warga', '1')->where('is_admin', '0')->whereBetween('updated_at', [$startOfMonth, $endOfMonth])->get();
                $value = $data->count();
                break;
            case '3': // Total Pelunasan Iuran
                $data = Payment::where('isActive', '1')->orderBy('tanggal_iuran', 'desc')->where('status_iuran', '1')->whereBetween('tanggal_iuran', [$startOfMonth, $endOfMonth])->get();
                $value = $data->sum('nominal_iuran');
                break;
            case '4': // Total Iuran Belum Lunas
                $data = Payment::where('isActive', '1')->orderBy('tanggal_iuran', 'desc')->where('status_iuran', '0')->whereBetween('tanggal_iuran', [$startOfMonth, $endOfMonth])->get();
                $value = $data->sum('nominal_iuran');
                break;
            case '5': // Total Warga Lunas
                $data = Payment::where('isActive', '1')->where('status_iuran', '1')->whereBetween('tanggal_iuran', [$startOfMonth, $endOfMonth])->get();
                $value = $data->count();
                break;
            case '6': // Total Warga Belum Lunas
                $data = Payment::where('status_iuran', '0')->whereBetween('tanggal_iuran', [$startOfMonth, $endOfMonth])->get();
                $value = $data->count();
                break;
            default:
                $data = [];
                $value = 0;
                break;
        }

        return view('admin/pelaporan', [
            'title' => 'Pelaporan',
            'admin' => Auth::user(),
            'desa' => Desa::first(),
            'month' => Carbon::now()->format('F'),
            'tanggal_sekarang' => Carbon::now()->format('d F Y'),
            'filter' => $request->query('filter'),
            'data' => $data,
            'value' => $value,
        ]);

        // $startOfMonth = Carbon::now()->startOfMonth();
        // $endOfMonth = Carbon::now()->endOfMonth();

        // return view('admin/pelaporan', [
        //     'title' => 'Pelaporan',
        //     'admin' => Auth::user(),
        //     'desa' => Desa::first(),
        //     'month' => Carbon::now()->format('F'),
        //     'tanggal_sekarang' => Carbon::now()->format('d F Y'),
        //     'total_warga' => User::where('status_warga', '1')->where('is_admin', '0')->get(),
        //     'total_warga_datang' => User::where('status_warga', '1')->where('is_admin', '0')->whereBetween('updated_at', [$startOfMonth, $endOfMonth])->count(),
        //     'total_payment' => Payment::where('status_iuran', '1')->whereBetween('tanggal_iuran', [$startOfMonth, $endOfMonth])->sum('nominal_iuran'),
        //     'total_payment_belum' => Payment::where('status_iuran', '0')->whereBetween('tanggal_iuran', [$startOfMonth, $endOfMonth])->sum('nominal_iuran'),
        //     'total_warga_lunas' => Payment::where('status_iuran', '1')->whereBetween('tanggal_iuran', [$startOfMonth, $endOfMonth])->count(),
        //     'total_warga_belum' => Payment::where('status_iuran', '0')->whereBetween('tanggal_iuran', [$startOfMonth, $endOfMonth])->count(),
        // ]);
    }

    public function about(){
        return view('admin/about', [
            'title' => 'Tentang Kami',
            'user' => Auth::user(),
        ]);
    }

    // public function data_tabel_pelaporan(Request $request)
    // {
    //     $startOfMonth = Carbon::now()->startOfMonth();
    //     $endOfMonth = Carbon::now()->endOfMonth();
        
    //     $filter = $request->query('filter');
    //     switch ($filter) {
    //         case '1': // Total Warga Pendatang
    //             $data = User::where('status_warga', '1')->where('is_admin', '0')->get();
    //             break;
    //         case '2': // Total Warga Nambah
    //             $data = User::where('status_warga', '1')->where('is_admin', '0')->whereBetween('updated_at', [$startOfMonth, $endOfMonth])->get();
    //             break;
    //         case '3': // Total Pelunasan Iuran
    //             $data = Payment::where('status_iuran', '1')->whereBetween('tanggal_iuran', [$startOfMonth, $endOfMonth])->get();
    //             break;
    //         case '4': // Total Iuran Belum Lunas
    //             $data = Payment::where('status_iuran', '0')->whereBetween('tanggal_iuran', [$startOfMonth, $endOfMonth])->get();
    //             break;
    //         case '5': // Total Warga Lunas
    //             $data = Payment::where('status_iuran', '1')->whereBetween('tanggal_iuran', [$startOfMonth, $endOfMonth])->get();
    //             break;
    //         case '6': // Total Warga Belum Lunas
    //             $data = Payment::where('status_iuran', '0')->whereBetween('tanggal_iuran', [$startOfMonth, $endOfMonth])->get();
    //             break;
    //         default:
    //             $data = [];
    //             break;
    //     }

    //     return view('admin/pelaporan', [
    //         'title' => 'Pelaporan',
    //         'admin' => Auth::user(),
    //         'desa' => Desa::first(),
    //         'month' => Carbon::now()->format('F'),
    //         'tanggal_sekarang' => Carbon::now()->format('d F Y'),
    //         'data' => $data,
    //     ]);
    // }
}
