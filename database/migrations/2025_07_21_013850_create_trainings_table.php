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

        Schema::create('trainings', function (Blueprint $table) {
            $table->id();
            $table->string('id_training');
            $table->string('nama_training');
            $table->string('deskripsi_training');
            $table->string('tipe_training');
            $table->string('penyelenggara');
            $table->string('durasi');
            $table->dateTime('tanggal_mulai');
            $table->dateTime('tanggal_selesai');
            $table->string('lokasi');
            $table->string('metode_pelatihan');
            $table->integer('partisipan');
            $table->string('status');
            $table->integer('biaya');
            $table->integer('total_biaya');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trainings');
    }
};
