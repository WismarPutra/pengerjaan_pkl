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
        'waktu_Pelaksanaan',
        'lokasi',
        'metode_pelatihan',
        'partisipan',
        'status',
        'stream',
        'keterangan',
        'sertifikat',
        'tna',
        'nama',
        'nama_posisi',
        'unit',
        'sub_dit',
        'dit',
        'loker',
        'kota',
        'status_analysis',
        'status_training',
        'prioritas',
        'biaya',
        'gap_kompetensi',
        'total_biaya',
    ];

    // 🔑 Relasi Many-to-Many dengan Employee
    public function employees()
    {
        return $this->belongsToMany(Employee::class, 'id')
                    ->withPivot(['tanggal_mulai', 'tanggal_selesai', 'status'])
                    ->withTimestamps();
    }
}
