<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\CareerActivity;


class TMController extends Controller
{
    public function index(Request $request) {
    // Ambil parameter dari URL, misalnya ?sort_by=nama&sort_order=asc
    $sortBy = $request->get('sort_by', 'nik'); // default urut berdasarkan NIK
    $sortOrder = $request->get('sort_order', 'asc'); // default ASC
    // Ambil data dengan orderBy
    $employees = Employee::orderBy($sortBy, $sortOrder)->paginate(10);
     $totalKaryawan = Employee::count(); // ambil jumlah total

    return view('employee.index', compact('employees', 'totalKaryawan',  'sortBy', 'sortOrder'));
}



    public function show(Employee $employee) {
        $payslips = [
            ['filename' => '2024-Jan.pdf', 'date' => '28 Januari 2024'],
            ['filename' => '2024-Feb.pdf', 'date' => '28 Februari 2024'],
            ['filename' => '2024-Mar.pdf', 'date' => '28 Maret 2024'],
            ['filename' => '2024-Apr.pdf', 'date' => '28 April 2024'],
            ['filename' => '2024-May.pdf', 'date' => '28 Mei 2024'],
            ['filename' => '2024-Jun.pdf', 'date' => '28 Juni 2024'],
            ['filename' => '2024-Jul.pdf', 'date' => '28 Juli 2024'],
            ['filename' => '2024-Aug.pdf', 'date' => '28 Agustus 2024'],
            ['filename' => '2024-Sep.pdf', 'date' => '28 September 2024'],
            ['filename' => '2024-Oct.pdf', 'date' => '28 Oktober 2024'],
            ['filename' => '2024-Nov.pdf', 'date' => '28 November 2024'],
            ['filename' => '2024-Dec.pdf', 'date' => '28 Desember 2024'],
        ];


        
        $career = CareerActivity::where('employee_id', $employee->id)
                ->orderByRaw('YEAR(tanggalKDMP) DESC')
                ->get();


        return view('employee.show', compact ('employee', 'payslips'));
    }

    public function edit($id) {
        $employee = Employee::findOrFail($id);
        $career = CareerActivity::where('employee_id', $id)->get();


        $career = CareerActivity::orderByRaw('YEAR(tanggalKDMP) DESC')->get();


        return view('employee.edit', compact('employee', 'career'));

    }

    public function update(Request $request, $id) {

        $validated = $request->validate([
            'nik' => 'required',
            'name'=> 'required', 
            'tanggal_lahir' => 'required', 
            'email' => 'required', 
            'no_ktp' => 'required',
            'jenis_kelamin' => 'required',
            'ttl' => 'required',
            'alamat_ktp' => 'required',
            'no_npwp' => 'required',
            'agama' => 'required',
            'status_perkawinan' => 'required',
            'alamat_domisili' => 'required',
            'no_telepon' => 'required',
            'level_pendidikan' => 'required',
            'jurusan' => 'required',
            'institusi_pendidikan' => 'required',
            'tahun_lulus' => 'required',
        ]);
    
        $employee = Employee::findOrFail($id);
        $employee->update($validated);

        return redirect()->route('employee.show', $employee->id)
                         ->with('success', 'Data berhasil diupdate!');    
    }

    public function downloadPayslip($filename) {
        $file = storage_path('app/payslips/' . $filename);
        if (!file_exists($file)) {
            abort(404, 'File not found.');
        }
        return response()->download($file);
    }
    

    public function getCareerActivities($employee_id) {
        $employee = Employee::with('careerActivities')->findOrFail($employee_id);
        return view('employee.career', compact('employee'));
    }

    public function storeCareerActivity(Request $request, $employee_id) {
        $validated = $request->validate([
            'nama_role' => 'required',
            'unitSub' => 'required',
            'band_posisi' => 'required',
            'regional_direktorat' => 'required',
            'deskripsi' => 'required',
            'statusPJ' => 'required',
            'tanggalKDMP' => 'nullable|date',
            'tanggalBand' => 'nullable|date',
            'tanggalTKWT' => 'nullable|date',
            'tanggal_akhirTKWT' => 'nullable|date',
            'tanggal_mutasi' => 'nullable|date',
            'tanggalPJ' => 'nullable|date',
            'tanggal_lepasPJ' => 'nullable|date',
            'tanggal_pensiun' => 'nullable|date',
            'tanggal_akhir_kontrak' => 'nullable|date',
            'dokumenSK' => 'nullable|file|mimes:pdf,jpg,png|max:2048',
            'dokumen_nota_dinas' => 'nullable|file|mimes:pdf,jpg,png|max:2048',
            'dokumen_lainnya' => 'nullable|file|mimes:pdf,jpg,png|max:2048',

        ]);

        $career = new CareerActivity();
        $career->employee_id = $employee_id;
        $career->nama_role = $request->nama_role;
        $career->regional_direktorat = $request->regional_direktorat;
        $career->unitSub = $request->unitSub;
        $career->band_posisi = $request->band_posisi;
        $career->deskripsi = $request->deskripsi;
        $career->statusPJ = $request->statusPJ;
        $career->tanggalBand = $request->tanggalBand;
        $career->tanggalKDMP = $request->tanggalKDMP;
        $career->tanggalTKWT = $request->tanggalTKWT;
        $career->tanggal_akhirTKWT = $request->tanggal_akhirTKWT;
        $career->tanggal_mutasi = $request->tanggal_mutasi;
        $career->tanggalPJ = $request->tanggalPJ;
        $career->tanggal_lepasPJ = $request->tanggal_lepasPJ;
        $career->tanggal_pensiun = $request->tanggal_pensiun;
        $career->tanggal_akhir_kontrak = $request->tanggal_akhir_kontrak;
        
        if ($request->hasFile('dokumenSK')) {
            $career->dokumenSK = $request->file('dokumenSK')->store('dokumen_sk', 'public');
        }
    
        if ($request->hasFile('dokumen_nota_dinas')) {
            $career->dokumen_nota_dinas = $request->file('dokumen_nota_dinas')->store('dokumen_nota_dinas', 'public');
        }
    
        if ($request->hasFile('dokumen_lainnya')) {
            $career->dokumen_lainnya = $request->file('dokumen_lainnya')->store('dokumen_lainnya', 'public');
        }
        
        $career->save();

        return back()->with('success', 'Aktivitas Karir berhasil ditambahkan');
    }

    public function updateCareerActivity(Request $request, $id) {
        $career = CareerActivity::findOrFail($id);

        $validated = $request->validate([
            'nama_role' => 'required',
            'unitSub' => 'required',
            'band_posisi' => 'required',
            'regional_direktorat' => 'required',
            'deskripsi' => 'required',
            'statusPJ' => 'required',
            'tanggalKDMP' => 'nullable|date',
            'tanggalBand' => 'nullable|date',
            'tanggalTKWT' => 'nullable|date',
            'tanggal_akhirTKWT' => 'nullable|date',
            'tanggal_mutasi' => 'nullable|date',
            'tanggalPJ' => 'nullable|date',
            'tanggal_lepasPJ' => 'nullable|date',
            'tanggal_pensiun' => 'nullable|date',
            'tanggal_akhir_kontrak' => 'nullable|date',
            'dokumenSK' => 'nullable|file|mimes:pdf,jpg,png|max:2048',
            'dokumen_nota_dinas' => 'nullable|file|mimes:pdf,jpg,png|max:2048',
            'dokumen_lainnya' => 'nullable|file|mimes:pdf,jpg,png|max:2048',
        ]);

        $career->fill([
            $career->employee_id = $employee_id,
            $career->nama_role = $request->nama_role,
            $career->regional_direktorat = $request->regional_direktorat,
            $career->unitSub = $request->unitSub,
            $career->band_posisi = $request->band_posisi,
            $career->deskripsi = $request->deskripsi,
            $career->statusPJ = $request->statusPJ,
            $career->tanggalBand = $request->tanggalBand,
            $career->tanggalKDMP = $request->tanggalKDMP,
            $career->tanggalTKWT = $request->tanggalTKWT,
            $career->tanggal_akhirTKWT = $request->tanggal_akhirTKWT,
            $career->tanggal_mutasi = $request->tanggal_mutasi,
            $career->tanggalPJ = $request->tanggalPJ,
            $career->tanggal_lepasPJ = $request->tanggal_lepasPJ,
            $career->tanggal_pensiun = $request->tanggal_pensiun,
            $career->tanggal_akhir_kontrak = $request->tanggal_akhir_kontrak,
        ]);
        
        
        if ($request->hasFile('dokumenSK')) {
            $career->dokumenSK = $request->file('dokumenSK')->store('dokumen_sk', 'public');
        }
    
        if ($request->hasFile('dokumen_nota_dinas')) {
            $career->dokumen_nota_dinas = $request->file('dokumen_nota_dinas')->store('dokumen_nota_dinas', 'public');
        }
    
        if ($request->hasFile('dokumen_lainnya')) {
            $career->dokumen_lainnya = $request->file('dokumen_lainnya')->store('dokumen_lainnya', 'public');
        }

        $career->save();

        return back()->with('success', 'Aktivitas Karir berhasil diupdate');
    }

    public function deleteCareerActivity($id) {
        $career = CareerActivity::findOrFail($id);
        $career->delete();

        return back()->with('success', 'Aktivitas Karir berhasil dihapus');
    }

}
