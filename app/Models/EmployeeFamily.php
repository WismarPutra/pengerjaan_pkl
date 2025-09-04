<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeFamily extends Model
{
    use HasFactory;

    protected $table = 'employee_families'; // nama tabel
    protected $primaryKey = 'id';    // ganti sesuai nama kolom PK di database
    public $incrementing = true;            // kalau auto increment
    protected $keyType = 'int';             // tipe data PK

    protected $fillable = [
        'employee_id',
        'nama_lengkap',
        'jenis_kelamin',
        'tempat_lahir',
        'tanggal_lahir',
        'pendidikan',
        'status_anak',
        'urutan_anak',
        'keterangan',
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id');
    }
}
