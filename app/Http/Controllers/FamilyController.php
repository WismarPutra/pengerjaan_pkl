<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;          // <- pastikan huruf besar kecil benar
use App\Models\EmployeeFamily;    // <- model keluarga

class FamilyController extends Controller
{
    // List keluarga per karyawan
    public function index($employeeId)
    {
        $employee = Employee::with('families')->findOrFail($employeeId);
        return view('employee.show', compact('employee'));
    }

    // Form tambah data keluarga
    public function create($employeeId)
    {
        $employee = Employee::findOrFail($employeeId);
        return view('employee.create', compact('employee'));
    }

    // Simpan data baru
    public function store(Request $request, $employeeId)
    {
        $data = $request->validate([
            'nama_lengkap'   => 'required|string|max:255',
            'jenis_kelamin'  => 'required|in:Laki-Laki,Perempuan', // harus sesuai enum di DB
            'tempat_lahir'   => 'nullable|string|max:255',
            'tanggal_lahir'  => 'nullable|date',
            'pendidikan'     => 'nullable|string|max:255',
            'status_anak'    => 'nullable|string|max:255',
            'urutan_anak'    => 'nullable|string|max:255',
            'keterangan'     => 'nullable|string|max:255',
        ]);

        $data['employee_id'] = $employeeId; // FK wajib ada

        EmployeeFamily::create($data);

        return redirect()
            ->route('employees.show', $employeeId)
            ->with('success', 'Data keluarga berhasil ditambahkan.');
    }

    // Form edit data keluarga
    public function edit($employeeId, $familyId)
    {
        $employee = Employee::findOrFail($employeeId);
        $family = EmployeeFamily::findOrFail($familyId);
        return view('employee.edit', compact('employee', 'family'));
    }

    // Update data keluarga
    public function update(Request $request, $employeeId, $familyId)
    {
        $data = $request->validate([
            'nama_lengkap'   => 'required|string|max:255',
            'jenis_kelamin'  => 'required|in:Laki-Laki,Perempuan',
            'tempat_lahir'   => 'nullable|string|max:255',
            'tanggal_lahir'  => 'nullable|date',
            'pendidikan'     => 'nullable|string|max:255',
            'status_anak'    => 'nullable|string|max:255',
            'urutan_anak'    => 'nullable|string|max:255',
            'keterangan'     => 'nullable|string|max:255',
        ]);

        $family = EmployeeFamily::where('employee_id', $employeeId)->findOrFail($familyId);
        $family->update($data);

        return redirect()
            ->route('employee.index', $employeeId)
            ->with('success', 'Data keluarga berhasil diperbarui.');
    }

    // Hapus data
    public function destroy($employeeId, $familyId)
    {
        $family = EmployeeFamily::where('employee_id', $employeeId)->findOrFail($familyId);
        $family->delete();

        return back()->with('success', 'Data keluarga dihapus.');
    }
}
