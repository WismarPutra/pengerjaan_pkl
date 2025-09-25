<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FeedbackAtasan extends Model
{
    protected $table = 'feedback_atasan';

    protected $fillable = [
        'employee_id',
        'q1','q2','q3','q4','q5',
        'komentar',
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
