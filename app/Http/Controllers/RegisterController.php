<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Payment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RegisterController extends Controller
{
    public function store(Request $request){
        $validated_person = $request->validate([
            'NIK' => ['required', 'unique:users,NIK'],
            'nama_lengkap' => ['required'],
            'alamat' => ['required'],
            'tanggal_lahir' => ['required'],
            'tempat_lahir' => ['required'],
            'status_menikah' => ['required'],
            'nomor_telepon' => ['required'],
            'pendidikan' => ['required'],
            'jenis_pekerjaan' => ['required'],
            'agama' => ['required'],
            'password' => ['required'],
        ]);

        $user = User::create($validated_person);
        
        $validated_iuran = $request->validate([
            'NIK' => ['required'],
            'tanggal_iuran' => ['required', 'date'],
            'nominal_iuran' => ['required'],
        ]);
        
        $inputDate = Carbon::parse($validated_iuran['tanggal_iuran']);
        $currentYear = $inputDate->year;
        $currentMonth = $inputDate->month;
        $monthsRemaining = 12 - $currentMonth + 1;
        
        for ($i = 0; $i < $monthsRemaining; $i++) {
            $paymentDate = $inputDate->copy()->addMonths($i);
    
            Payment::create([
                'user_id' => $user->id,
                'NIK' => $validated_iuran['NIK'],
                'tanggal_iuran' => $paymentDate,
                'nominal_iuran' => $validated_iuran['nominal_iuran'],
            ]);
        }

        return redirect('/admin/pendataan_warga')->with('success', 'Penambahan Data Berhasil!');
    }

    public function store_iuran(Request $request){
        $validated = $request->validate([
            'NIK' => ['required'],
            'tanggal_iuran' => ['required'],
            'nominal_iuran' => ['required'],
        ]);

        $user = User::where('NIK', $validated['NIK'])->first();
        $validated['user_id'] = $user->id;
        unset($validated['NIK']);

        Payment::create($validated);
        return redirect('/admin/pendataan_iuran')->with('success', 'Successfully Registered! You may login now.');
    }
}
