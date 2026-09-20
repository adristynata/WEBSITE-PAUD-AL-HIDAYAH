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
            if (!Schema::hasColumn('profil_sekolahs', 'flyer_kurikulum_sem1')) {
                $table->longText('flyer_kurikulum_sem1')->nullable();
            }
            if (!Schema::hasColumn('profil_sekolahs', 'flyer_kurikulum_sem2')) {
                $table->longText('flyer_kurikulum_sem2')->nullable();
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('profil_sekolahs', function (Blueprint $table) {
            if (Schema::hasColumn('profil_sekolahs', 'flyer_kurikulum_sem1')) {
                $table->dropColumn('flyer_kurikulum_sem1');
            }
            if (Schema::hasColumn('profil_sekolahs', 'flyer_kurikulum_sem2')) {
                $table->dropColumn('flyer_kurikulum_sem2');
            }
        });
    }
};
