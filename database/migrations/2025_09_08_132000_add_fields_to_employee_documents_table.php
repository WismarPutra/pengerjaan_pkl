<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsToEmployeeDocumentsTable extends Migration
{
    public function up(): void
    {
        Schema::table('employee_documents', function (Blueprint $table) {
            $table->unsignedBigInteger('employee_id')->after('id');
            $table->string('jenis_dokumen')->after('employee_id');
            $table->string('file_path')->after('jenis_dokumen');

            $table->foreign('employee_id')
                  ->references('id')
                  ->on('employees')
                  ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::table('employee_documents', function (Blueprint $table) {
            $table->dropForeign(['employee_id']);
            $table->dropColumn(['employee_id', 'jenis_dokumen', 'file_path']);
        });
    }
}
