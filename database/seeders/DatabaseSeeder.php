<?php

namespace Database\Seeders;

use Carbon\Carbon;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Desa;
use App\Models\User;
use App\Models\Year;
use App\Models\Payment;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'nama_lengkap' => 'Test User',
        //     'NIK' => '1',
        //     'password' => '1',
        // ]);

        User::create([
            'NIK' => '1',
            'nama_lengkap' => 'Test User',
            'alamat' => 'Test User',
            'tanggal_lahir' => NULL,
            'status_menikah' => NULL,
            'nomor_telepon' => NULL,
            'pendidikan' => NULL,
            'jenis_pekerjaan' => NULL,
            'agama' => NULL,
            'is_admin' => '1',
            'password' => '1',
            'status_warga' => '1',
            'remember_token' => NULL,
        ]);

        User::create([
            'NIK' => '5103020212001110',
            'nama_lengkap' => 'Alexander Sepiteng',
            'alamat' => 'Jl. Sunset Road No. 76',
            'tanggal_lahir' => "2000-12-02",
            'tempat_lahir' => "Badung",
            'status_menikah' => "0",
            'nomor_telepon' => "081338321123",
            'pendidikan' => "Sarjana/D4",
            'jenis_pekerjaan' => "Wirausaha",
            'agama' => "Hindu",
            'is_admin' => '0',
            'password' => '12345',
            'status_warga' => '1',
            'remember_token' => NULL,
        ]);
        User::create([
            'NIK' => '5103020212001111',
            'nama_lengkap' => 'John Knalpot',
            'alamat' => 'Jl. Sunset Road No. 77',
            'tanggal_lahir' => "2000-11-02",
            'tempat_lahir' => "Badung",
            'status_menikah' => "0",
            'nomor_telepon' => "081338321124",
            'pendidikan' => "Sarjana/D4",
            'jenis_pekerjaan' => "Wirausaha",
            'agama' => "Hindu",
            'is_admin' => '0',
            'password' => '12345',
            'status_warga' => '1',
            'remember_token' => NULL,
        ]);
        User::create([
            'NIK' => '5103020212001112',
            'nama_lengkap' => 'Jack Stang Bengkok',
            'alamat' => 'Jl. Sunset Road No. 78',
            'tanggal_lahir' => "2000-10-02",
            'tempat_lahir' => "Badung",
            'status_menikah' => "0",
            'nomor_telepon' => "081338321125",
            'pendidikan' => "Sarjana/D4",
            'jenis_pekerjaan' => "Wirausaha",
            'agama' => "Hindu",
            'is_admin' => '0',
            'password' => '12345',
            'status_warga' => '1',
            'remember_token' => NULL,
        ]);

        $validated_iuran = [
            'NIK' => "5103020212001110",
            'tanggal_iuran' => "2024-06-15",
        ];
        
        $inputDate = Carbon::parse($validated_iuran['tanggal_iuran']);
        $currentYear = $inputDate->year;
        $currentMonth = $inputDate->month;
        $monthsRemaining = 12 - $currentMonth + 1;
        
        for ($i = 0; $i < $monthsRemaining; $i++) {
            $paymentDate = $inputDate->copy()->addMonths($i);
    
            Payment::create([
                'user_id' => "2",
                'tanggal_iuran' => $paymentDate,
                'nominal_iuran' => "1000000",
            ]);
            Payment::create([
                'user_id' => "3",
                'tanggal_iuran' => $paymentDate,
                'nominal_iuran' => "750000",
            ]);
            Payment::create([
                'user_id' => "4",
                'tanggal_iuran' => $paymentDate,
                'nominal_iuran' => "500000",
            ]);
        }

        Desa::create([
            'desa' => "Pemecutan",
            'tahun' => Carbon::now()->year,
        ]);
    }
}
