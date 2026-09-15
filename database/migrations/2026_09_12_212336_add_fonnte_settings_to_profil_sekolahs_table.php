<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('profil_sekolahs', function (Blueprint $table) {
            $table->string('fonnte_token')->nullable()->after('email_sekolah');
            $table->string('fonnte_target')->nullable()->after('fonnte_token');
            $table->string('app_url')->nullable()->after('fonnte_target');
        });
    }

    public function down(): void
    {
        Schema::table('profil_sekolahs', function (Blueprint $table) {
            $table->dropColumn(['fonnte_token', 'fonnte_target', 'app_url']);
        });
    }
};

