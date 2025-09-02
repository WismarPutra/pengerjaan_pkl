<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'is_medical',
        'employment_status',
        'directorate',
        'vacancy_count',
        'progress'
    ];

    protected $casts = [
        'is_medical' => 'boolean',
    ];
}
