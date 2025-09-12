<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('career_activities', function (Blueprint $table) {
            if (!Schema::hasColumn('career_activities', 'dokumenSK')) {
                $table->string('dokumenSK')->nullable();
            }
            if (!Schema::hasColumn('career_activities', 'dokumen_nota_dinas')) {
                $table->string('dokumen_nota_dinas')->nullable();
            }
            if (!Schema::hasColumn('career_activities', 'dokumen_lainnya')) {
                $table->string('dokumen_lainnya')->nullable();
            }
        });
    }

    public function down(): void
    {
        Schema::table('career_activities', function (Blueprint $table) {
            if (Schema::hasColumn('career_activities', 'dokumenSK')) {
                $table->dropColumn('dokumenSK');
            }
            if (Schema::hasColumn('career_activities', 'dokumen_nota_dinas')) {
                $table->dropColumn('dokumen_nota_dinas');
            }
            if (Schema::hasColumn('career_activities', 'dokumen_lainnya')) {
                $table->dropColumn('dokumen_lainnya');
            }
        });
    }
};
