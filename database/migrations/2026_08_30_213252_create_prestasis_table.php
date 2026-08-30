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
        Schema::create('prestasis', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->string('kategori')->default('seni'); // seni, agama, olahraga, sekolah
            $table->string('peringkat'); // Juara 1, Juara 2, Juara 3, Penghargaan
            $table->string('tahun'); // 2025, 2024
            $table->string('pemenang'); // Ananda Aisyah / Tim Tari
            $table->text('deskripsi')->nullable();
            $table->string('foto')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prestasis');
    }
};
