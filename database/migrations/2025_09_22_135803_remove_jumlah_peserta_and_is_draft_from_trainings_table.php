<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('trainings', function (Blueprint $table) {
            $table->dropColumn(['jumlah_peserta', 'is_draft']);
        });
    }

    public function down(): void
    {
        Schema::table('trainings', function (Blueprint $table) {
            $table->integer('jumlah_peserta')->default(0);
            $table->boolean('is_draft')->default(1);
        });
    }
};
