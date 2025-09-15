<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrainingFile extends Model
{
    use HasFactory;

    // Nama tabel (opsional, kalau sama dengan plural dari model, bisa di-skip)
    protected $table = 'training_files';

    // Kolom yang bisa diisi (mass assignment)
    protected $fillable = [
        'training_id',
        'filename',
        'path',
    ];

    /**
     * Relasi ke tabel Training (jika ada relasi training_id)
     */
    public function training()
    {
        return $this->belongsTo(Training::class, 'training_id');
    }
}
