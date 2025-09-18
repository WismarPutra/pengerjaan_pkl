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
        // tambahkan kolom dokumen
    'ktp',
    'kartu_keluarga',
    'npwp',
    'bpjs_ketenagakerjaan',
    'bpjs_kesehatan',
    'nota_dinas',
    'psikotest',
    'assessment_01',
    'assessment_02',
    'assessment_03',
    ];

    public function families()
    {
        return $this->hasMany(EmployeeFamily::class, 'employee_id');
    }


    public function talentClusters()
    {
        return $this->hasMany(TalentCluster::class, 'employee_id');
    }

   public function documents()
{
    return $this->hasMany(EmployeeDocument::class);
}

public function personalDocuments()
{
    return $this->documents()->where('kategori', 'personal');
}

public function otherDocuments()
{
    return $this->documents()->where('kategori', 'lainnya');
}


public function careerActivities()
{
    return $this->hasMany(CareerActivity::class, 'employee_id');
}

public function jobHistories()
{
    return $this->hasMany(JobHistory::class, 'employee_id');
}

public function payslips()
{
    return $this->hasMany(EmployeePayslip::class);
}





}
