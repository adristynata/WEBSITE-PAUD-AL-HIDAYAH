<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IndikatorPenilaian extends Model
{
    protected $fillable = ['aspek', 'nilai', 'teks', 'urutan'];

    public static array $aspekLabels = [
        'agama_moral'      => 'Agama & Moral',
        'motorik_kasar'    => 'Motorik Kasar',
        'motorik_halus'    => 'Motorik Halus',
        'kognitif'         => 'Kognitif',
        'bahasa'           => 'Bahasa',
        'sosial_emosional' => 'Sosial Emosional',
    ];

    public static array $nilaiLabels = [
        'BB'  => 'Belum Berkembang',
        'MB'  => 'Mulai Berkembang',
        'BSH' => 'Berkembang Sesuai Harapan',
        'BSB' => 'Berkembang Sangat Baik',
    ];
}
