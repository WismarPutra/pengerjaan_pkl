<?php

class EmployeeDocument extends Model
{
    protected $fillable = ['employee_id', 'jenis_dokumen', 'file_path'];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
