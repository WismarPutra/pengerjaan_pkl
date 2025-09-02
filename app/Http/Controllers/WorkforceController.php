<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WorkforceController extends Controller
{
    public function index()
    {
        return view('workforce.index');
    }
}
