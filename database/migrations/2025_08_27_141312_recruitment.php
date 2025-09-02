<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void 
    {
        Schema::create('recruitment', function (Blueprint $table) {
            $table->id();
            $table->string('namaPosisi');
            $table->string('regionalDirektorat');
            $table->string('unitSub');
            $table->string('band_posisi');
            $table->string('status_kepegawaian');
            $table->string('lokasi_pekerjaan');
            $table->string('medis_non_medis');
            $table->string('jumlah_lowongan');
            $table->date('tanggal_target');
            $table->string('hiring_manager');
            $table->string('nde')->nullable;
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
