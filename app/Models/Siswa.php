<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    protected $table = 'siswa';

    protected $fillable = [
        'nis', 'nama', 'tanggal_lahir', 'kelas_id',
        'kontak_ortu', 'foto', 'is_aktif',
    ];

    protected $casts = [
        'tanggal_lahir' => 'date',
        'is_aktif'      => 'boolean',
    ];

    // Relasi ke kelas
    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'kelas_id');
    }

    // Relasi ke Laporan Bulanan
    public function laporanBulanans()
    {
        return $this->hasMany(LaporanBulanan::class, 'siswa_id');
    }

    // Relasi ke Catatan Mingguan
    public function catatanMingguans()
    {
        return $this->hasMany(CatatanMingguan::class, 'siswa_id');
    }

    // Relasi ke orang tua (via pivot)
    public function orangTuas()
    {
        return $this->belongsToMany(User::class, 'ortu_siswa', 'siswa_id', 'user_id')
                    ->withTimestamps();
    }
}
