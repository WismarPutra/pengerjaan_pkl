<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\TalentCluster;
use Illuminate\Http\Request;

class TalentClusterController extends Controller
{
    // List semua cluster per employee
    public function index(Employee $employee)
    {
        $clusters = $employee->talentClusters()->orderBy('tahunCluster', 'desc')->get();
        return view('employees.show', compact('employee', 'clusters'));
    }

    // Simpan cluster baru
    public function store(Request $request, Employee $employee)
    {
        $request->validate([
            'periodeCluster' => 'required|string',
            'tahunCluster'   => 'required|string',
            'talentCluster'  => 'required|string',
        ]);

        $employee->talentClusters()->create([
            'periodeCluster' => $request->periodeCluster,
            'tahunCluster'   => $request->tahunCluster,
            'talentCluster'  => $request->talentCluster,
        ]);

        return redirect()->route('employees.edit', $employee->id)
                         ->with('success', 'Cluster berhasil ditambahkan.');
    }

    // Form edit cluster
    public function edit($employeeId, $clusterId)
    {
        $employee = Employee::findOrFail($employeeId);
        $cluster  = TalentCluster::findOrFail($clusterId);

        return view('clusters.edit', compact('employee', 'cluster'));
    }

    // Update cluster
    public function update(Request $request, $employeeId, $clusterId)
    {
        $request->validate([
            'periodeCluster' => 'required|string',
            'tahunCluster'   => 'required|string',
            'talentCluster'  => 'required|string',
        ]);

        $cluster = TalentCluster::findOrFail($clusterId);
        $cluster->update($request->only('periodeCluster', 'tahunCluster', 'talentCluster'));

        return redirect()->route('employees.edit', $employeeId)
                         ->with('success', 'Cluster berhasil diupdate.');
    }

    // Hapus cluster
    public function delete($employeeId, $clusterId)
    {
        $cluster = TalentCluster::findOrFail($clusterId);
        $cluster->delete();

        return redirect()->route('employees.edit', $employeeId)
                         ->with('success', 'Cluster berhasil dihapus.');
    }
}
