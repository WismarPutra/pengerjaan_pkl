<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\TalentCluster;
use Illuminate\Http\Request;

class TalentClusterController extends Controller
{
    public function store(Request $request, Employee $employee)
    {
        $request->validate([
            'periodeCluster' => 'required',
            'tahunCluster'   => 'required',
            'talentCluster'  => 'required',
        ]);

        // Simpan data
       $employee->talentClusters()->create([
    'periodeCluster' => $request->periodeCluster,
    'tahunCluster'   => $request->tahunCluster,
    'talentCluster'  => $request->talentCluster,
]);


        return redirect()->route('employees.show', $employee->id)
                         ->with('success', 'Talent Cluster berhasil ditambahkan');
    }
}
