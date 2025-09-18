<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('employee_payslips', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employee_id')->constrained()->onDelete('cascade');
            $table->string('filename');
            $table->string('path');
            $table->date('date'); // tanggal slip gaji
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('employee_payslips');
    }
};
