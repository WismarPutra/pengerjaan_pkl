<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TalentCluster extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_id',
        'periodeCluster',
        'tahunCluster',
        'talentCluster',
    ];

    // Relasi ke Employee
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
