<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kehadiran;


class KehadiranController extends Controller
{
    public function store(Request $request) {
        Kehadiran::create([
            'q0' => $request->q1,
            'q2' => $request->q2,
            'q3' => $request->q3,
            'q4' => $request->q4,
            'q5' => $request->q5,
            'saran' => $request->saran
        ]);

        return back()->with('success', 'Terima kasih atas feedback Anda!');
    }
}
