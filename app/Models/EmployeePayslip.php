<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeePayslip extends Model
{
    use HasFactory;

    // Pastikan tabel diarahkan ke nama yang benar
    protected $table = 'employee_payslips';

    protected $fillable = [
        'employee_id',
        'filename',
        'path',
        'date',
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
