<?php

namespace Database\Seeders;

use Carbon\Carbon;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Desa;
use App\Models\User;
use App\Models\Year;
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

        Desa::create([
            'desa' => "Pemecutan",
            'tahun' => Carbon::now()->year,
        ]);
    }
}
