<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;

    protected $table = 'kelas';

    protected $fillable = ['nama_kelas', 'tahun_ajaran', 'guru_id'];

    // Relasi ke guru pengampu
    public function guru()
    {
        return $this->belongsTo(User::class, 'guru_id');
    }

    // Relasi ke siswa
    public function siswas()
    {
        return $this->hasMany(Siswa::class, 'kelas_id');
    }
}
