<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('employee_documents', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('employee_id'); 
            $table->string('jenis_dokumen');     // contoh: KTP, KK, BPJS, dll
            $table->string('file_path');         // lokasi file di storage
            $table->enum('kategori', ['personal', 'lainnya'])->default('personal');
            $table->timestamps();

            // relasi ke tabel employees
            $table->foreign('employee_id')
                  ->references('id')
                  ->on('employees')
                  ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('employee_documents');
    }
};
