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
    Schema::create('talent_clusters', function (Blueprint $table) {
        $table->id();
        $table->foreignId('employee_id')->constrained()->onDelete('cascade');
        $table->string('periodeCluster');
        $table->string('tahunCluster');
        $table->string('talentCluster');
        $table->timestamps();
    });
}

public function down(): void
{
    Schema::dropIfExists('talent_clusters');
}
};
