<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Recruitment extends Model
{
    protected $table = 'recruitment'; 

    protected $fillable = [
        'namaPosisi',
        'regionalDirektorat',
        'unitSub',
        'band_posisi',
        'status_kepegawaian',
        'lokasi_pekerjaan',
        'medis_non_medis',
        'jumlah_lowongan',
        'tanggal_target',
        'hiring_manager',
        'nde',
        'pendidikan_terakhir',
        'jurusan_relevan',
        'pengalaman_minimum',
        'domisili_preferensi',
        'jenis_kelamin',
        'batasan_usia',
        'created_by',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function candidates()
{
    return $this->hasMany(Candidate::class);
}

}
