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
        Schema::table('employee_families', function (Blueprint $table) {
            // Hapus kolom lama
            $table->dropColumn(['tempat_lahir', 'tanggal_lahir']);

            // Tambahkan kolom baru
            $table->string('ttl')->nullable()->after('jenis_kelamin');
        });
    }

    public function down()
    {
        Schema::table('employee_families', function (Blueprint $table) {
            $table->string('tempat_lahir')->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->dropColumn('ttl');
        });
    }
};
