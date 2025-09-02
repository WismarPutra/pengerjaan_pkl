<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DJM extends Model
{
    use HasFactory;

    protected $table = 'd_j_m_s';
    protected $fillable = [
        'kode_djm',
        'namaPosisi',
        'regionalDirektorat',
        'unitSub',
        'job',
        'posisi',
        'atasanLangsung',
        'position_specification',
        'position_objective',
        'responsibilities',
        'success_indicators',
    ]; 
}