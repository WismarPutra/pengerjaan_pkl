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
        Schema::table('career_activities', function (Blueprint $table) {
            $table->string('dokumenSK')->nullable();
            $table->string('dokumen_nota_dinas')->nullable();
            $table->string('dokumen_lainnya')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('career_activities', function (Blueprint $table) {
            //
        });
    }
};
