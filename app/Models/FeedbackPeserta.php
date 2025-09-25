<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FeedbackPeserta extends Model
{
    protected $table = 'feedback_peserta';

    protected $fillable = [
        'employee_id',
        'emoji_rating',
        'q1',
        'q2',
        'q3',
        'q4',
        'q5',
        'komentar',
    ];
}

