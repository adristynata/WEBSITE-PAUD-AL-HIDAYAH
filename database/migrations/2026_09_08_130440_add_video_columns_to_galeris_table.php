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
        Schema::table('galeris', function (Blueprint $table) {
            $table->string('kategori')->default('foto')->after('deskripsi');
            $table->text('video_url')->nullable()->after('kategori');
            $table->string('video_file')->nullable()->after('video_url');
            $table->string('foto')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('galeris', function (Blueprint $table) {
            $table->dropColumn(['kategori', 'video_url', 'video_file']);
            $table->string('foto')->nullable(false)->change();
        });
    }
};
