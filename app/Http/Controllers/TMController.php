<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\CareerActivity;
use App\Models\TalentCluster;
use App\Models\EmployeeDocument;



class TMController extends Controller
{
    public function index(Request $request)
    {
        // Ambil parameter dari URL, misalnya ?sort_by=nama&sort_order=asc
        $sortBy = $request->get('sort_by', 'nik'); // default urut berdasarkan NIK
        $sortOrder = $request->get('sort_order', 'asc'); // default ASC

        // Ambil data dengan orderBy
        $employees = Employee::orderBy($sortBy, $sortOrder)->paginate(10);
        $totalKaryawan = Employee::count(); // ambil jumlah total


        return view('employee.index', compact('employees', 'totalKaryawan', 'sortBy', 'sortOrder'));
    }




    public function show(Request $request, Employee $employee)
    {
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

        // ---- Sorting Talent Cluster ----

        $sortByCluster    = $request->query('sort_by_cluster', 'tahunCluster');
        $sortOrderCluster = $request->query('sort_order_cluster', 'desc');

        $allowedCluster = ['periodeCluster', 'tahunCluster', 'talentCluster'];
        if (!in_array($sortByCluster, $allowedCluster)) {
            $sortByCluster = 'tahunCluster';
        }
        $sortOrderCluster = $sortOrderCluster === 'asc' ? 'asc' : 'desc';

        $talentClusters = TalentCluster::where('employee_id', $employee->id)
            ->orderBy($sortByCluster, $sortOrderCluster)
            ->get();

        // ---- Sorting Family ----
        $sortByFamily    = $request->query('sort_by_family', 'nama_lengkap');
        $sortOrderFamily = $request->query('sort_order_family', 'asc');

        $allowedFamilies = [
            'nama_lengkap',
            'jenis_kelamin',
            'tempat_lahir',
            'tanggal_lahir',
            'pendidikan',
            'status_anak',
            'urutan_anak',
            'keterangan'
        ];
        if (!in_array($sortByFamily, $allowedFamilies)) {
            $sortByFamily = 'nama_lengkap';
        }
        $sortOrderFamily = $sortOrderFamily === 'asc' ? 'asc' : 'desc';

        $families = $employee->families()
            ->orderBy($sortByFamily, $sortOrderFamily)
            ->get();

        // ---- Cluster (Career Activity) ----
        $clusters = CareerActivity::where('employee_id', $employee->id)
            ->selectRaw('
            MONTHNAME(tanggalKDMP) as periode,
            YEAR(tanggalKDMP) as year,
            unitSub as cluster
        ')
            ->orderBy('year', 'desc')
            ->orderByRaw('MONTH(tanggalKDMP) desc')
            ->get();

        return view('employee.show', compact(
            'employee',
            'payslips',
            'clusters',
            'talentClusters',
            'families',
            'sortByCluster',
            'sortOrderCluster',
            'sortByFamily',
            'sortOrderFamily'
        ));
    }



    public function edit($id, Request $request)
    {
         $employee = Employee::with(['families','talentClusters'])->findOrFail($id);

        // Ambil parameter sorting dari query string
        $sortByFamily    = $request->query('sort_by_family', 'nama_lengkap');
        $sortOrderFamily = $request->query('sort_order_family', 'asc');

        // Kolom yang boleh di-sort
        $allowedFamilies = [
            'nama_lengkap',
            'jenis_kelamin',
            'ttl',
            'pendidikan',
            'status_anak',
            'urutan_anak',
            'keterangan'
        ];
        if (!in_array($sortByFamily, $allowedFamilies)) {
            $sortByFamily = 'nama_lengkap';
        }

        // Sorting ASC/DESC
        $sortOrderFamily = $sortOrderFamily === 'asc' ? 'asc' : 'desc';

        // Ambil data keluarga sesuai sorting
        $families = $employee->families()
            ->orderBy($sortByFamily, $sortOrderFamily)
            ->get();

        // Data career tetap
        $career = CareerActivity::where('employee_id', $id)
            ->orderByRaw('YEAR(tanggalKDMP) DESC')
            ->get();


        $dokumenWajib = [
        'dokumen_ktp'               => 'KTP',
        'dokumen_kk'                => 'Kartu Keluarga',
        'dokumen_npwp'              => 'NPWP',
        'dokumen_bpjs_kesehatan'    => 'BPJS Kesehatan',
        'dokumen_bpjs_ketenagakerjaan' => 'BPJS Ketenagakerjaan',
        'dokumen_nota_dinas'        => 'Nota Dinas',
    ];

    $dokumenLainnya = [
        'dokumen_hasil_psikotest' => 'Hasil Psikotest',
        'dokumen_assessment_01'   => 'Hasil Assessment 01',
        'dokumen_assessment_02'   => 'Hasil Assessment 02',
        'dokumen_assessment_03'   => 'Hasil Assessment 03',
    ];

    return view('employee.edit', compact(
        'employee',
        'career',
        'families',
        'sortByFamily',
        'sortOrderFamily',
        'dokumenWajib',   // ✅ dikirim ke view
        'dokumenLainnya'  // ✅ dikirim ke view
    ));
}


    public function update(Request $request, $id)
{
    $validated = $request->validate([
        'nik' => 'required',
        'name' => 'required',
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

        // tambahkan validasi dokumen
        'dokumen_ktp' => 'nullable|file|mimes:pdf,jpg,png|max:2048',
        'dokumen_bpjs_kesehatan' => 'nullable|file|mimes:pdf,jpg,png|max:2048',
        'dokumen_npwp' => 'nullable|file|mimes:pdf,jpg,png|max:2048',
        'dokumen_kk' => 'nullable|file|mimes:pdf,jpg,png|max:2048',
        'dokumen_bpjs_ketenagakerjaan' => 'nullable|file|mimes:pdf,jpg,png|max:2048',
        'dokumen_nota_dinas' => 'nullable|file|mimes:pdf,jpg,png|max:2048',
    ]);

    $employee = Employee::findOrFail($id);

    // update field utama
    $employee->update($validated);

    // handle upload file (opsional, kalau ada)
    if ($request->hasFile('dokumen_ktp')) {
        $employee->dokumen_ktp = $request->file('dokumen_ktp')->store('dokumen', 'public');
    }
    if ($request->hasFile('dokumen_bpjs_kesehatan')) {
        $employee->dokumen_bpjs_kesehatan = $request->file('dokumen_bpjs_kesehatan')->store('dokumen', 'public');
    }
    if ($request->hasFile('dokumen_npwp')) {
        $employee->dokumen_npwp = $request->file('dokumen_npwp')->store('dokumen', 'public');
    }
    if ($request->hasFile('dokumen_kk')) {
        $employee->dokumen_kk = $request->file('dokumen_kk')->store('dokumen', 'public');
    }
    if ($request->hasFile('dokumen_bpjs_ketenagakerjaan')) {
        $employee->dokumen_bpjs_ketenagakerjaan = $request->file('dokumen_bpjs_ketenagakerjaan')->store('dokumen', 'public');
    }
    if ($request->hasFile('dokumen_nota_dinas')) {
        $employee->dokumen_nota_dinas = $request->file('dokumen_nota_dinas')->store('dokumen', 'public');
    }

    $employee->save();

    return redirect()->route('employee.show', $employee->id)
        ->with('success', 'Data berhasil diupdate!');
}


    public function downloadPayslip($filename)
    {
        $file = storage_path('app/payslips/' . $filename);
        if (!file_exists($file)) {
            abort(404, 'File not found.');
        }
        return response()->download($file);
    }


    public function getCareerActivities($employee_id)
    {
        $employee = Employee::with('careerActivities')->findOrFail($employee_id);
        return view('employee.career', compact('employee'));
    }

    public function storeCareerActivity(Request $request, $employee_id)
    {
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

    public function updateCareerActivity(Request $request, $id)
    {
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

        // update field biasa
        $career->fill([
            'nama_role'             => $request->nama_role,
            'regional_direktorat'   => $request->regional_direktorat,
            'unitSub'               => $request->unitSub,
            'band_posisi'           => $request->band_posisi,
            'deskripsi'             => $request->deskripsi,
            'statusPJ'              => $request->statusPJ,
            'tanggalBand'           => $request->tanggalBand,
            'tanggalKDMP'           => $request->tanggalKDMP,
            'tanggalTKWT'           => $request->tanggalTKWT,
            'tanggal_akhirTKWT'     => $request->tanggal_akhirTKWT,
            'tanggal_mutasi'        => $request->tanggal_mutasi,
            'tanggalPJ'             => $request->tanggalPJ,
            'tanggal_lepasPJ'       => $request->tanggal_lepasPJ,
            'tanggal_pensiun'       => $request->tanggal_pensiun,
            'tanggal_akhir_kontrak' => $request->tanggal_akhir_kontrak,
        ]);

        // handle upload file
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


    public function deleteCareerActivity($id)
    {
        $career = CareerActivity::findOrFail($id);
        $career->delete();

        return back()->with('success', 'Aktivitas Karir berhasil dihapus');
    }


public function updateDocuments(Request $request, $employee_id)
{
    $employee = Employee::findOrFail($employee_id);

    $request->validate([
        'dokumen.*' => 'nullable|file|mimes:pdf,jpg,png|max:2048',
    ]);

    if ($request->hasFile('dokumen')) {
        foreach ($request->file('dokumen') as $jenis => $file) {
            $path = $file->store('dokumen', 'public');

            EmployeeDocument::updateOrCreate(
                ['employee_id' => $employee->id, 'jenis_dokumen' => $jenis],
                ['file_path' => $path]
            );
        }
    }

    return back()->with('success', 'Dokumen berhasil diperbarui!');
}

public function deleteDocument($id)
{
    $doc = EmployeeDocument::findOrFail($id);

    if ($doc->file_path) {
        \Storage::delete('public/'.$doc->file_path);
    }
    $doc->delete();

    return back()->with('success', 'Dokumen berhasil dihapus.');
}

public function deleteFile($id, $field)
{
    $employee = Employee::findOrFail($id);

    if ($employee->$field) {
        Storage::delete('public/'.$employee->$field);
        $employee->$field = null;
        $employee->save();
    }

    return back()->with('success', ucfirst($field).' berhasil dihapus.');
}

}

