<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDocumentsToEmployeesTable extends Migration
{
    public function up(): void
    {
        Schema::table('employees', function (Blueprint $table) {
            $table->string('ktp')->nullable()->after('tahun_lulus');
            $table->string('kartu_keluarga')->nullable()->after('ktp');
            $table->string('npwp')->nullable()->after('kartu_keluarga');
            $table->string('bpjs_ketenagakerjaan')->nullable()->after('npwp');
            $table->string('bpjs_kesehatan')->nullable()->after('bpjs_ketenagakerjaan');
            $table->string('nota_dinas')->nullable()->after('bpjs_kesehatan');
            $table->string('psikotest')->nullable()->after('nota_dinas');
            $table->string('assessment_01')->nullable()->after('psikotest');
            $table->string('assessment_02')->nullable()->after('assessment_01');
            $table->string('assessment_03')->nullable()->after('assessment_02');
        });
    }

    public function down(): void
    {
        Schema::table('employees', function (Blueprint $table) {
            $table->dropColumn([
                'ktp',
                'kartu_keluarga',
                'npwp',
                'bpjs_ketenagakerjaan',
                'bpjs_kesehatan',
                'nota_dinas',
                'psikotest',
                'assessment_01',
                'assessment_02',
                'assessment_03',
            ]);
        });
    }
}
