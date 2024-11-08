<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class GenerateAnnualPayments extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:generate-annual-payments';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $currentYear = Carbon::now()->year;
        $users = User::where('status_warga', '1');

        foreach ($users as $user) {
            $existingPayments = Payment::where('user_id', $user->id)
                ->whereYear('tanggal_iuran', $currentYear)
                ->exists();

            if (!$existingPayments) {
                for ($month = 1; $month <= 12; $month++) {
                    $paymentData = Payment::where('user_id', $user->id)->latest();

                    Payment::create([
                        'user_id' => $user->id,
                        'tanggal_iuran' => $paymentData->tanggal_iuran,
                        'nominal_iuran' => $paymentData->nominal_iuran,
                    ]);
                }
            }
        }

        $this->info('Annual payments generated successfully.');
    }
}
