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
        Schema::create('profil_sekolahs', function (Blueprint $table) {
            $table->id();
            $table->string('sambutan_judul')->default('Mewujudkan Generasi Berakhlak Mulia & Kreatif');
            $table->string('sambutan_nama')->default('Sri Wahyuni, S.Pd.');
            $table->string('sambutan_jabatan')->default('Kepala Sekolah PAUD Al-Hidayah');
            $table->text('sambutan_teks')->nullable();
            $table->string('sambutan_foto')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profil_sekolahs');
    }
};
