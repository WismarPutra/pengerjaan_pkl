<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    use HasFactory;

    protected $table = 'candidates';

    protected $fillable = [
        'recruitment_id',
        'nama',
        'email',
        'telepon',
        'pendidikan',
        'institusi',
        'jurusan',
        'pengalaman',
    ];

    public function recruitment()
    {
        return $this->belongsTo(Recruitment::class);
    }
}
