<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CareerActivity extends Model
{
    protected $table = 'career_activities';

    protected $fillable = [
        'employee_id',
        'nama_role',
        'unitSub',
        'regional_direktorat',
        'band_posisi',
        'deskripsi',
        'statusPJ',
        'tanggalKDMP',
        'tanggalBand',
        'tanggalTKWT',
        'tanggal_akhirTKWT',
        'tanggal_mutasi',
        'tanggalPJ',
        'tanggal_lepasPJ',
        'tanggal_pensiun',
        'tanggal_akhir_kontrak',
        'dokumenSK',
        'dokumen_nota_dinas',
        'dokumen_lainnya',
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
