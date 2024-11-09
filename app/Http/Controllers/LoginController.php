<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Desa;
use App\Models\User;
use App\Models\Year;
use App\Models\Payment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class LoginController extends Controller
{
    public function index(){
        $currentYear = Carbon::now()->year;
        $databaseYear = Desa::first();

        if ($databaseYear->tahun != $currentYear){
            Desa::where('tahun', $databaseYear->tahun)->update(['tahun' => $currentYear]);
            $users = User::where('status_warga', 1)->where('is_admin', 0)->get();

            foreach ($users as $user) {
                $existingPayments = Payment::where('user_id', $user->id)
                    ->whereYear('tanggal_iuran', $currentYear)
                    ->exists();
                
                if (!$existingPayments) {
                    $paymentData = Payment::where('user_id', $user->id)->first();
                    for ($month = 1; $month <= 12; $month++) {
                        $inputDate = Carbon::parse($paymentData['tanggal_iuran']);
                        $paymentDate = $inputDate->copy()->setMonth($month)->setYear($currentYear);
                        Payment::create([
                            'user_id' => $user->id,
                            'tanggal_iuran' => $paymentDate,
                            'nominal_iuran' => $paymentData->nominal_iuran,
                        ]);
                    }
                }
            }
        }

        return view('login/index', [
            "title" => "Login",
        ]);
    }

    public function authenticate(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'NIK' => ['required'],
            'password' => ['required'],
        ]);
 
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            if (Auth::user()->is_admin){
                return redirect()->intended('/admin');
            } else{
                return redirect()->intended('/user');
            }
        }
 
        return back()->withErrors([
            'NIK' => 'The provided credentials do not match our records.',
        ])->onlyInput('NIK');
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
    
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect('/login');
    }
}
