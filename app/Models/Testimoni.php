<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimoni extends Model
{
    use HasFactory;

    protected $table = 'testimonis';

    protected $fillable = [
        'user_id',
        'nama_ortu',
        'tipe_ortu',
        'foto',
        'rating',
        'isi_review',
        'status',
    ];

    /**
     * Relasi ke User (Orang Tua)
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Scope untuk ulasan yang disetujui (Approved)
     */
    public function scopeApproved($query)
    {
        return $query->where('status', 'approved');
    }

    /**
     * Scope untuk ulasan yang belum diproses (Pending)
     */
    public function scopePending($query)
    {
        return $query->where('status', 'pending');
    }
}
