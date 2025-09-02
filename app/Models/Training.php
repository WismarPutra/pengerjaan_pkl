<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Training extends Model
{
    use HasFactory;

    public $timestamps = true;
    
    protected $fillable = [
        'id_training',
        'nama_training',
        'deskripsi_training',
        'tipe_training',
        'sertifikat_partisipasi',
        'sertifikat_pelatihan',
        'penyelenggara',
        'durasi',
        'tanggal_mulai',
        'tanggal_selesai',
        'lokasi',
        'metode_pelatihan',
        'partisipan',
        'status',
        'biaya',
        'total_biaya',
    ];
}
