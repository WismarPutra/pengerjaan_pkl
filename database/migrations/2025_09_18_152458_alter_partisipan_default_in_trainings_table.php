<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('trainings', function (Blueprint $table) {
            $table->integer('partisipan')->default(0)->change();
        });
    }

    public function down(): void
    {
        Schema::table('trainings', function (Blueprint $table) {
            $table->integer('partisipan')->change(); // balik ke kondisi awal
        });
    }
};

