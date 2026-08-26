<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // 1. Tambah 'seni' ke ENUM tabel indikator_penilaians
        DB::statement("ALTER TABLE indikator_penilaians MODIFY COLUMN aspek ENUM('agama_moral', 'motorik_kasar', 'motorik_halus', 'kognitif', 'bahasa', 'sosial_emosional', 'seni') NOT NULL");

        // 2. Tambah kolom seni & catatan_seni ke tabel catatan_mingguans
        Schema::table('catatan_mingguans', function (Blueprint $table) {
            if (!Schema::hasColumn('catatan_mingguans', 'seni')) {
                $table->string('seni', 5)->nullable()->after('catatan_sosial_emosional');
            }
            if (!Schema::hasColumn('catatan_mingguans', 'catatan_seni')) {
                $table->text('catatan_seni')->nullable()->after('seni');
            }
        });

        // 3. Tambah kolom rekap_seni ke tabel laporan_bulanans
        Schema::table('laporan_bulanans', function (Blueprint $table) {
            if (!Schema::hasColumn('laporan_bulanans', 'rekap_seni')) {
                $table->text('rekap_seni')->nullable()->after('rekap_sosial_emosional');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('laporan_bulanans', function (Blueprint $table) {
            if (Schema::hasColumn('laporan_bulanans', 'rekap_seni')) {
                $table->dropColumn('rekap_seni');
            }
        });

        Schema::table('catatan_mingguans', function (Blueprint $table) {
            if (Schema::hasColumn('catatan_mingguans', 'catatan_seni')) {
                $table->dropColumn('catatan_seni');
            }
            if (Schema::hasColumn('catatan_mingguans', 'seni')) {
                $table->dropColumn('seni');
            }
        });

        DB::statement("ALTER TABLE indikator_penilaians MODIFY COLUMN aspek ENUM('agama_moral', 'motorik_kasar', 'motorik_halus', 'kognitif', 'bahasa', 'sosial_emosional') NOT NULL");
    }
};
