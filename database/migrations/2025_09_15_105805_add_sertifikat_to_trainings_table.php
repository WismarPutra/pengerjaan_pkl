<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('trainings', function (Blueprint $table) {
            $table->string('sertifikat')->nullable()->after('keterangan');
            // bisa string, text, atau boolean tergantung kebutuhan
            // contoh: string = nama file sertifikat, boolean = status punya sertifikat/tidak
        });
    }

    public function down(): void
    {
        Schema::table('trainings', function (Blueprint $table) {
            $table->dropColumn('sertifikat');
        });
    }
};
