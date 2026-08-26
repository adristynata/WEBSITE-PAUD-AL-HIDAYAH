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
        Schema::create('indikator_penilaians', function (Blueprint $table) {
            $table->id();
            $table->enum('aspek', [ 
                'agama_moral',
                'motorik_kasar',
                'motorik_halus',
                'kognitif',
                'bahasa',
                'sosial_emosional',
            ]);
            $table->enum('nilai', ['BB', 'MB', 'BSH', 'BSB']);
            $table->text('teks');
            $table->tinyInteger('urutan')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('indikator_penilaians');
    }
};
