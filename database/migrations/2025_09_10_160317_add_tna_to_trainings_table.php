<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('trainings', function (Blueprint $table) {
            // Bisa pakai enum jika pilihannya fix
            $table->enum('tna', ['TNA', 'Non-TNA'])->nullable()->after('keterangan');
            
            // Kalau ingin fleksibel, bisa pakai string:
            // $table->string('tna')->nullable()->after('keterangan');
        });
    }

    public function down(): void
    {
        Schema::table('trainings', function (Blueprint $table) {
            $table->dropColumn('tna');
        });
    }
};
