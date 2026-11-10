<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;

    protected $table = 'mahasiswa';

    protected $fillable = [
        'nim',
        'nama',
        'jenis_kelamin',
        'alamat',
        'telepon',
        'email',
        'angkatan',
    ];

    /**
     * Relasi One-to-Many ke Model Krs
     */
    public function krs()
    {
        return $this->hasMany(Krs::class, 'mahasiswa_id');
    }
}