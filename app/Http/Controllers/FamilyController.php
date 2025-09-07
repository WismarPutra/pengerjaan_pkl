<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;          // <- pastikan huruf besar kecil benar
use App\Models\EmployeeFamily;    // <- model keluarga
use App\Models\CareerActivity;

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

        // Contoh: ambil data dari tabel referensi atau hardcode dulu
        $jenisKelamin = ['Laki-Laki', 'Perempuan'];
        $pendidikan = ['SD', 'SMP', 'SMA', 'S1', 'S2', 'S3'];
        $statusAnak = ['Kandung', 'Tiri', 'Angkat'];
        $urutanAnak = ['Anak ke-1', 'Anak ke-2', 'Anak ke-3'];
        $keterangan = ['Ditanggung', 'Tidak Ditanggung'];

        return view('employee.families.edit', compact(
            'employee',
            'family',
            'jenisKelamin',
            'pendidikan',
            'statusAnak',
            'urutanAnak',
            'keterangan'
        ));
    }


    // Update data keluarga
   public function update(Request $request, $id)
{
    $employee = Employee::findOrFail($id);

    // Validasi data utama pegawai (sesuaikan dengan kebutuhan Anda)
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

    // update data pegawai
    $employee->update($data);

    // 🔹 proses anak (ambil dari hidden input anakData)
    if ($request->anak_data) {
        $anakList = json_decode($request->anak_data, true);

        // hapus data lama jika ingin replace total
        $employee->families()->delete();

        // simpan data anak baru
        foreach ($anakList as $child) {
            $employee->families()->create($child);
        }
    }

    return redirect()
        ->route('employees.show', $employee->id)
        ->with('success', 'Data pegawai & keluarga berhasil disimpan.');
}

}
