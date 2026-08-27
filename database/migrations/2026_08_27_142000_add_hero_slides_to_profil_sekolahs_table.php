<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('profil_sekolahs', function (Blueprint $table) {
            if (!Schema::hasColumn('profil_sekolahs', 'hero_slide_1')) {
                $table->string('hero_slide_1')->nullable()->after('foto_login');
            }
            if (!Schema::hasColumn('profil_sekolahs', 'hero_slide_2')) {
                $table->string('hero_slide_2')->nullable()->after('hero_slide_1');
            }
            if (!Schema::hasColumn('profil_sekolahs', 'hero_slide_3')) {
                $table->string('hero_slide_3')->nullable()->after('hero_slide_2');
            }
        });
    }

    public function down(): void
    {
        Schema::table('profil_sekolahs', function (Blueprint $table) {
            $table->dropColumn(['hero_slide_1', 'hero_slide_2', 'hero_slide_3']);
        });
    }
};
