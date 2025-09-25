<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TrainingParticipant extends Model
{
    protected $fillable = [
        'training_id',
        'nik',
        'nama',
        'direktorat',
        'nama_posisi',
        'gap_kompetensi',
        'keterangan',
    ];

    public function training()
    {
        return $this->belongsTo(Training::class, 'training_id');
    }
}
