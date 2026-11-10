<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class MataKuliah extends Model
{
    use HasFactory;

    // Tentukan nama tabel jika tidak menggunakan bentuk plural standar
    protected $table = 'mata_kuliah';

    // Kolom yang boleh diisi secara massal (mass assignment)
    protected $fillable = [
        'kode_mk',
        'nama_mk',
        'sks',
    ];

    /**
     * Relasi Many-to-Many ke Model Krs melalui tabel pivot krs_detail
     */
    public function krs(): BelongsToMany
    {
        return $this->belongsToMany(
            Krs::class, 
            'krs_detail', 
            'mata_kuliah_id', 
            'krs_id'
        )->withTimestamps();
    }
}