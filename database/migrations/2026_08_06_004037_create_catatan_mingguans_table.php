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
        Schema::create('catatan_mingguans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('siswa_id')->constrained('siswa')->cascadeOnDelete();
            $table->foreignId('guru_id')->constrained('users')->cascadeOnDelete();
            $table->unsignedTinyInteger('minggu_ke');
            $table->unsignedTinyInteger('bulan');
            $table->unsignedSmallInteger('tahun');
            
            // Aspek Perkembangan PAUD
            $table->string('nilai_agama_moral', 5)->nullable(); // BB, MB, BSH, BSB
            $table->text('catatan_agama_moral')->nullable();

            $table->string('motorik_kasar', 5)->nullable();
            $table->text('catatan_motorik_kasar')->nullable();

            $table->string('motorik_halus', 5)->nullable();
            $table->text('catatan_motorik_halus')->nullable();

            $table->string('kognitif', 5)->nullable();
            $table->text('catatan_kognitif')->nullable();

            $table->string('bahasa', 5)->nullable();
            $table->text('catatan_bahasa')->nullable();

            $table->string('sosial_emosional', 5)->nullable();
            $table->text('catatan_sosial_emosional')->nullable();

            $table->timestamps();

            $table->unique(['siswa_id', 'minggu_ke', 'bulan', 'tahun'], 'siswa_week_unique');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('catatan_mingguans');
    }
};
