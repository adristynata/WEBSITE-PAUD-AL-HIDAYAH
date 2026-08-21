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
        Schema::create('laporan_bulanans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('siswa_id')->constrained('siswa')->cascadeOnDelete();
            $table->unsignedTinyInteger('bulan');
            $table->unsignedSmallInteger('tahun');
            
            // Rekap Aspek Perkembangan
            $table->text('rekap_agama_moral')->nullable();
            $table->text('rekap_motorik_kasar')->nullable();
            $table->text('rekap_motorik_halus')->nullable();
            $table->text('rekap_kognitif')->nullable();
            $table->text('rekap_bahasa')->nullable();
            $table->text('rekap_sosial_emosional')->nullable();

            $table->enum('status', ['draft', 'published'])->default('draft');
            $table->foreignId('disunting_oleh')->nullable()->constrained('users')->nullOnDelete();
            $table->timestamps();

            $table->unique(['siswa_id', 'bulan', 'tahun'], 'siswa_month_year_unique');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laporan_bulanans');
    }
};
