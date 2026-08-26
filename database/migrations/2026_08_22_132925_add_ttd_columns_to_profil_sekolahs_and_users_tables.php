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
        if (Schema::hasTable('profil_sekolahs') && !Schema::hasColumn('profil_sekolahs', 'ttd_kepsek')) {
            Schema::table('profil_sekolahs', function (Blueprint $table) {
                $table->string('ttd_kepsek')->nullable()->after('sambutan_foto');
            });
        }

        if (Schema::hasTable('users') && !Schema::hasColumn('users', 'ttd')) {
            Schema::table('users', function (Blueprint $table) {
                $table->string('ttd')->nullable()->after('pin');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::hasTable('profil_sekolahs') && Schema::hasColumn('profil_sekolahs', 'ttd_kepsek')) {
            Schema::table('profil_sekolahs', function (Blueprint $table) {
                $table->dropColumn('ttd_kepsek');
            });
        }

        if (Schema::hasTable('users') && Schema::hasColumn('users', 'ttd')) {
            Schema::table('users', function (Blueprint $table) {
                $table->dropColumn('ttd');
            });
        }
    }
};
