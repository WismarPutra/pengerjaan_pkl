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
        Schema::create('candidates', function (Blueprint $table) {
            $table->id();
            $table->foreignId('recruitment_id')->constrained()->onDelete('cascade');
            $table->string('nama')->nullable();
            $table->string('email')->nullable();
            $table->string('telepon')->nullable();
            $table->string('pendidikan')->nullable();
            $table->string('institusi')->nullable();
            $table->string('jurusan')->nullable();
            $table->string('pengalaman')->nullable();
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('candidates');
    }
};
