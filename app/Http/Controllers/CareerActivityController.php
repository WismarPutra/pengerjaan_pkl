<?php

namespace App\Http\Controllers;

use App\Models\CareerActivity;
use App\Models\Employee;
use Illuminate\Http\Request;

class CareerActivityController extends Controller
{
    /**
     * Tampilkan semua aktivitas career untuk employee tertentu
     */
    public function index($employeeId)
    {
        $employee = Employee::findOrFail($employeeId);
        $careers = $employee->careerActivities()->latest()->get();

        return view('career_activities.index', compact('employee', 'careers'));
    }

    /**
     * Form create career activity
     */
    public function create($employeeId)
    {
        $employee = Employee::findOrFail($employeeId);
        return view('career_activities.create', compact('employee'));
    }

    /**
     * Simpan career activity baru
     */
    public function store(Request $request, $employeeId)
    {
        $employee = Employee::findOrFail($employeeId);

        $validated = $request->validate([
            'nama_role' => 'required|string|max:255',
            'unitSub' => 'nullable|string|max:255',
            'regional_direktorat' => 'nullable|string|max:255',
            'band_posisi' => 'nullable|string|max:255',
            'deskripsi' => 'nullable|string',
            'statusPJ' => 'nullable|string|max:255',
            'tanggalKDMP' => 'nullable|date',
            'tanggalBand' => 'nullable|date',
            'tanggalTKWT' => 'nullable|date',
            'tanggal_akhirTKWT' => 'nullable|date',
            'tanggal_mutasi' => 'nullable|date',
            'tanggalPJ' => 'nullable|date',
            'tanggal_lepasPJ' => 'nullable|date',
            'tanggal_pensiun' => 'nullable|date',
            'tanggal_akhir_kontrak' => 'nullable|date',
            'dokumenSK' => 'nullable|string|max:255',
            'dokumen_nota_dinas' => 'nullable|string|max:255',
            'dokumen_lainnya' => 'nullable|string|max:255',
        ]);

        $employee->careerActivities()->create($validated);

        return redirect()->route('career_activities.index', $employee->id)
            ->with('success', 'Career activity berhasil ditambahkan.');
    }

    /**
     * Form edit career activity
     */
    public function edit($employeeId, $id)
    {
        $employee = Employee::findOrFail($employeeId);
        $career = CareerActivity::findOrFail($id);

        return view('career_activities.edit', compact('employee', 'career'));
    }

    /**
     * Update career activity
     */
    public function update(Request $request, $employeeId, $id)
    {
        $career = CareerActivity::findOrFail($id);

        $validated = $request->validate([
            'nama_role' => 'required|string|max:255',
            'unitSub' => 'nullable|string|max:255',
            'regional_direktorat' => 'nullable|string|max:255',
            'band_posisi' => 'nullable|string|max:255',
            'deskripsi' => 'nullable|string',
            'statusPJ' => 'nullable|string|max:255',
            'tanggalKDMP' => 'nullable|date',
            'tanggalBand' => 'nullable|date',
            'tanggalTKWT' => 'nullable|date',
            'tanggal_akhirTKWT' => 'nullable|date',
            'tanggal_mutasi' => 'nullable|date',
            'tanggalPJ' => 'nullable|date',
            'tanggal_lepasPJ' => 'nullable|date',
            'tanggal_pensiun' => 'nullable|date',
            'tanggal_akhir_kontrak' => 'nullable|date',
            'dokumenSK' => 'nullable|string|max:255',
            'dokumen_nota_dinas' => 'nullable|string|max:255',
            'dokumen_lainnya' => 'nullable|string|max:255',
        ]);

        $career->update($validated);

        return redirect()->route('career_activities.index', $employeeId)
            ->with('success', 'Career activity berhasil diperbarui.');
    }

    /**
     * Hapus career activity
     */
    public function destroy($employeeId, $id)
    {
        $career = CareerActivity::findOrFail($id);
        $career->delete();

        return redirect()->route('career_activities.index', $employeeId)
            ->with('success', 'Career activity berhasil dihapus.');
    }
}
