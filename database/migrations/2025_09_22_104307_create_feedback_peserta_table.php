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
        Schema::create('feedback_peserta', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employee_id')->constrained()->onDelete('cascade');
            $table->enum('emoji_rating', ['sangat_baik', 'baik', 'kurang_baik'])->nullable();
            $table->unsignedTinyInteger('q1')->nullable();
            $table->unsignedTinyInteger('q2')->nullable();
            $table->unsignedTinyInteger('q3')->nullable();
            $table->unsignedTinyInteger('q4')->nullable();
            $table->unsignedTinyInteger('q5')->nullable();
            $table->text('komentar')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('feedback_peserta');
    }
};
