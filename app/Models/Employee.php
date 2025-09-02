<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'nik', 
        'name', 
        'tanggal_lahir', 
        'email', 
        'posisi',
        'direktorat', 
        'status_karyawan', 
        'no_ktp',
        'jenis_kelamin',
        'ttl',
        'alamat_ktp',
        'no_npwp',
        'agama',
        'status_perkawinan',
        'alamat_domisili',
        'no_telepon',
        'level_pendidikan',
        'jurusan',
        'institusi_pendidikan',
        'tahun_lulus',
    ];

    public function CareerActivity() {
        return $this->hasMany(CareerActivity::class, 'employee_id');
    }

}
