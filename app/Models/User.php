<?php

namespace App\Models;

use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

#[Fillable(['name', 'email', 'password', 'role'])]
#[Hidden(['password', 'remember_token'])]
class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // Role helpers
    public function isAdmin(): bool
    {
        return $this->role === 'admin';
    }

    public function isGuru(): bool
    {
        return $this->role === 'guru';
    }

    public function isOrangTua(): bool
    {
        return $this->role === 'orang_tua';
    }

    // Relasi: orang tua punya banyak siswa (via pivot)
    public function siswas()
    {
        return $this->belongsToMany(Siswa::class, 'ortu_siswa', 'user_id', 'siswa_id')
                    ->withTimestamps();
    }

    // Relasi: guru mengampu kelas
    public function kelas()
    {
        return $this->hasMany(Kelas::class, 'guru_id');
    }
}
