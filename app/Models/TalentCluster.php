<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TalentCluster extends Model
{
    use HasFactory;

    protected $table = 'talent_clusters';

    protected $fillable = [
        'employee_id',
        'periodeCluster',
        'tahunCluster',
        'talentCluster',
    ];

    // relasi balik ke employee
    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id');
    }
}
