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
        Schema::table('profil_sekolahs', function (Blueprint $table) {
            $table->string('flyer_foto1')->nullable()->after('hero_slide_5');
            $table->string('flyer_foto2')->nullable()->after('flyer_foto1');
            $table->string('flyer_foto3')->nullable()->after('flyer_foto2');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('profil_sekolahs', function (Blueprint $table) {
            $table->dropColumn(['flyer_foto1', 'flyer_foto2', 'flyer_foto3']);
        });
    }
};
