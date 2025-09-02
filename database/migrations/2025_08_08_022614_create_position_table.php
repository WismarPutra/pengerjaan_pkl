<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('positions', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->boolean('is_medical')->default(false);
            $table->string('employment_status')->nullable();
            $table->string('directorate')->nullable();
            $table->integer('vacancy_count')->default(1);
            $table->tinyInteger('progress')->default(0); // 0-5
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('positions');
    }
};
