<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Training;
use Carbon\Carbon;

class UpdateTrainingStatus extends Command
{
    protected $signature = 'training:update-status';
    protected $description = 'Update status training berdasarkan tanggal mulai & selesai';

    public function handle()
    {
        $now = Carbon::now('Asia/Jakarta');

        // Scheduled: belum mulai
        Training::where('tanggal_mulai', '>', $now)
            ->update(['status' => 'Scheduled']);

        // On Going: sedang berlangsung
        Training::where('tanggal_mulai', '<=', $now)
            ->where('tanggal_selesai', '>=', $now)
            ->update(['status' => 'On Going']);

        // Completed: sudah selesai
        Training::where('tanggal_selesai', '<', $now)
            ->update(['status' => 'Completed']);

        $this->info('Status training berhasil diupdate!');
    }
}
