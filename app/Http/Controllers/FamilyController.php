<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Models\Employee;

class FamilyController extends Controller
{
    public function index($employeeId)
    {
        $employee = Employee::with('families')->findOrFail($employeeId);
        return view('families.index', compact('employee'));
    }
}
