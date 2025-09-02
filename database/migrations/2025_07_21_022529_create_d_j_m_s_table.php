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
        Schema::create('d_j_m_s', function (Blueprint $table) {
            $table->id();
            $table->string('kodeDJM')->unique();
            $table->string('namaPosisi');
            $table->string('regionalDirektorat')->unique();
            $table->string('posisi');
            $table->string('unitSub');
            $table->string('supervisor');
            $table->string('position_specification');
            $table->string('position_objective');
            $table->string('responsibilities');
            $table->string('success_indicators');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('d_j_m_s');
    }
};
