<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('career_activities', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employee_id')->constrained()->onDelete('cascade');
            $table->string('nama_role');
            $table->string('unitSub')->nullable();
            $table->string('regional_direktorat')->nullable();
            $table->string('band_posisi')->nullable();
            $table->text('deskripsi')->nullable();
            $table->string('statusPJ')->nullable();
            $table->date('tanggalKDMP')->nullable();
            $table->date('tanggalBand')->nullable();
            $table->date('tanggalTKWT')->nullable();
            $table->date('tanggal_akhirTKWT')->nullable();
            $table->date('tanggal_mutasi')->nullable();
            $table->date('tanggalPJ')->nullable();
            $table->date('tanggal_lepasPJ')->nullable();
            $table->date('tanggal_pensiun')->nullable();
            $table->date('tanggal_akhir_kontrak')->nullable();
            $table->string('dokumen_nota_dinas')->nullable();
            $table->string('dokumen_lainnya')->nullable();
            $table->string('dokumenSK')->nullable(); // untuk file path
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('career_activities');
    }
};
