<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\CareerActivity;
use App\Models\TalentCluster;
use App\Models\EmployeeDocument;
use App\Models\Training;
use App\Models\EmployeePayslip;
use App\Models\FeedbackPeserta;
use App\Models\FeedbackAtasan;
use Illuminate\Support\Facades\Storage;



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
        // ✅ Ambil payslips via relasi
        $payslips = $employee->payslips()->orderBy('date', 'desc')->get();

        $dummyPayslip = collect([
            (object)[
                'filename' => '2024-Jan.pdf',
                'date'     => '2024-01-28',
                'path'     => 'dummy/dummy.pdf'
            ]
        ]);

        $payslips = $dummyPayslip->merge($payslips);
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


        // ---- Sorting Training ----
        $sortByTraining    = $request->query('sort_by_training', 'nama_training');
        $sortOrderTraining = $request->query('sort_order_training', 'asc');

        $allowedTraining = ['nama_training', 'penyelenggara', 'tanggal_mulai', 'tanggal_selesai', 'status', 'sertifikat_pelatihan'];
        if (!in_array($sortByTraining, $allowedTraining)) {
            $sortByTraining = 'nama_training';
        }
        $sortOrderTraining = $sortOrderTraining === 'asc' ? 'asc' : 'desc';

        $trainings = Training::orderBy($sortByTraining, $sortOrderTraining)->get();

        // ---- Cluster (Career Activity) ----
        $career = CareerActivity::where('employee_id', $employee->id)
            ->orderByRaw('YEAR(tanggalKDMP) DESC')
            ->orderByRaw('MONTH(tanggalKDMP) DESC')
            ->get();

        $feedbackPeserta = \App\Models\FeedbackPeserta::where('employee_id', $employee->id)
            ->latest()
            ->get();
        $feedbackAtasan = \App\Models\FeedbackAtasan::where('employee_id', $employee->id)
            ->latest()
            ->first();


        return view('employee.show', compact(
            'employee',
            'payslips',
            'career',
            'talentClusters',
            'families',
            'trainings',
            'sortByCluster',
            'sortOrderCluster',
            'sortByFamily',
            'sortOrderFamily',
            'sortByTraining',
            'sortOrderTraining',
            'feedbackPeserta',
            'feedbackAtasan'
        ));
    }



    public function edit($id, Request $request)
    {
        $employee = Employee::with(['families', 'talentClusters'])->findOrFail($id);

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

        return redirect()->route('employees.show', $employee->id)
            ->with('success', 'Data berhasil diupdate!');
    }


    public function downloadPayslip($filename)
    {
        $file = storage_path('app/payslips/' . $filename);

        if (!file_exists($file)) {
            abort(404, 'File not found: ' . $file);
        }

        // Baris ini akan membuka PDF di browser
        return response()->file($file, [
            'Content-Type' => 'application/pdf',
        ]);
    }

    public function viewPayslip($filename)
    {
        $filePath = storage_path('app/payslips/' . $filename);

        if (!file_exists($filePath)) {
            abort(404, 'File not found: ' . $filePath);
        }

        return view('employee.payslips', ['filename' => $filename]);
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


    public function updateDocuments(Request $request, $id)
    {
        $employee = Employee::findOrFail($id);

        // daftar dokumen
        $documents = [
            'ktp',
            'kartu_keluarga',
            'npwp',
            'bpjs_ketenagakerjaan',
            'bpjs_kesehatan',
            'nota_dinas'
        ];

        foreach ($documents as $doc) {
            if ($request->hasFile($doc)) {
                $path = $request->file($doc)->store('documents', 'public');

                EmployeeDocument::updateOrCreate(
                    [
                        'employee_id'   => $employee->id,
                        'jenis_dokumen' => $doc,
                    ],
                    [
                        'file_path' => $path,
                    ]
                );
            }
        }

        return redirect()->back()->with('success', 'Dokumen berhasil diperbarui.');
    }



    public function deleteDocument($id)
    {
        $document = EmployeeDocument::findOrFail($id);

        // Hapus file dari storage
        if (\Storage::exists('public/' . $document->file_path)) {
            \Storage::delete('public/' . $document->file_path);
        }

        $document->delete();

        return back()->with('success', 'Dokumen berhasil dihapus.');
    }

    public function deleteFile($id, $field)
    {
        $employee = Employee::findOrFail($id);

        if ($employee->$field) {
            Storage::delete('public/' . $employee->$field);
            $employee->$field = null;
            $employee->save();
        }

        return back()->with('success', ucfirst($field) . ' berhasil dihapus.');
    }

    public function uploadDocument(Request $request, $id)
    {
        $employee = Employee::findOrFail($id);

        // daftar field dokumen dari form
        $dokumens = [
            'ktp',
            'kartu_keluarga',
            'npwp',
            'bpjs_ketenagakerjaan',
            'bpjs_kesehatan',
            'nota_dinas',
            'psikotest',
            'assessment_01',
            'assessment_02',
            'assessment_03',
        ];

        foreach ($dokumens as $field) {
            if ($request->hasFile($field)) {
                $path = $request->file($field)->store('documents', 'public');
                $employee->$field = $path; // pastikan kolom ini ada di tabel employees
            }
        }

        $employee->save();

        return redirect()->route('employees.show', $employee->id)
            ->with('success', 'Dokumen berhasil diupload');
    }

    public function store(Request $request, $employeeId)
    {
        $validated = $request->validate([
            'periodeCluster' => 'required|string',
            'tahunCluster'   => 'required|date_format:Y-m',
            'talentCluster'  => 'required|string',
        ]);

        TalentCluster::create([
            'employee_id'    => $employeeId,
            'periodeCluster' => $validated['periodeCluster'],
            'tahunCluster'   => $validated['tahunCluster'],
            'talentCluster'  => $validated['talentCluster'],
        ]);

        // ⬇⬇⬇ ubah baris ini
        return redirect()
            ->route('employees.show', $employeeId) // profil, bukan edit
            ->with('success', 'Talent Cluster berhasil ditambahkan.');
    }


    public function storePayslip(Request $request, $id)
    {
        $request->validate([
            'payslip_file' => 'required|mimes:pdf|max:5120',
            'date' => 'required|date',
        ]);

        $employee = Employee::findOrFail($id);

        if (!$request->hasFile('payslip_file')) {
            return redirect()->back()->with('error', 'File tidak ditemukan!');
        }

        $file = $request->file('payslip_file');

        // Nama file sesuai tanggal slip gaji
        $tanggal = \Carbon\Carbon::parse($request->date)->format('Y-M'); // contoh: 2024-Jan
        $filename = $tanggal . '.pdf';

        // Simpan file ke storage/app/public/payslips/{employee_id}
        $path = $file->storeAs('payslips/' . $employee->id, $filename, 'public');

        // Simpan ke database
        EmployeePayslip::create([
            'employee_id' => $employee->id,
            'filename'    => $filename,
            'path'        => $path,
            'date'        => $request->date,
        ]);

        return redirect()->back()->with('success', 'Slip gaji berhasil ditambahkan!');
    }


    // Delete Payslip
    public function deletePayslip($id)
    {
        $payslip = EmployeePayslip::findOrFail($id);

        if (Storage::disk('public')->exists($payslip->path)) {
            Storage::disk('public')->delete($payslip->path);
        }

        $payslip->delete();

        return back()->with('success', 'Slip gaji berhasil dihapus.');
    }

    public function storeEvaluasiPeserta(Request $request, Employee $employee)
    {
        $request->validate([
            'emoji_rating' => 'required|in:sangat_baik,baik,kurang_baik',
            'q1' => 'required|integer|min:1|max:10',
            'q2' => 'required|integer|min:1|max:10',
            'q3' => 'required|integer|min:1|max:10',
            'q4' => 'required|integer|min:1|max:10',
            'q5' => 'required|integer|min:1|max:10',
            'komentar' => 'required|string',
        ]);

        FeedbackPeserta::create([
            'employee_id'  => $employee->id,
            'emoji_rating' => $request->emoji_rating,
            'q1'           => $request->q1,
            'q2'           => $request->q2,
            'q3'           => $request->q3,
            'q4'           => $request->q4,
            'q5'           => $request->q5,
            'komentar'     => $request->komentar,
        ]);

        $redirectTo = $request->input('redirect_to', route('employees.show', $employee->id));

        return redirect($redirectTo)->with('success', 'Evaluasi Peserta berhasil disimpan.');
    }


    public function storeEvaluasiAtasan(Request $request, Employee $employee)
    {
        $request->validate([
            'atasan_q1' => 'required|integer|min:1|max:10',
            'atasan_q2' => 'required|integer|min:1|max:10',
            'atasan_q3' => 'required|integer|min:1|max:10',
            'atasan_q4' => 'required|integer|min:1|max:10',
            'atasan_q5' => 'required|integer|min:1|max:10',
            'atasan_komentar' => 'required|string',
        ]);

        \App\Models\FeedbackAtasan::create([
            'employee_id' => $employee->id,
            'q1' => $request->atasan_q1,
            'q2' => $request->atasan_q2,
            'q3' => $request->atasan_q3,
            'q4' => $request->atasan_q4,
            'q5' => $request->atasan_q5,
            'komentar' => $request->atasan_komentar,
        ]);

        return redirect()->back()->with('success', 'Evaluasi Atasan berhasil disimpan.');
    }
}
