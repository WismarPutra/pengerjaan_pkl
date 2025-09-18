<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recruitment;
use Illuminate\Support\Facades\Auth;

class RecruitmentController extends Controller
{
    public function index(Request $request)
{
    // Ambil parameter sort & direction dari URL
    $sort = $request->get('sort', 'id');             // default sort by id
    $direction = $request->get('direction', 'desc'); // default desc
    $perPage = $request->get('per_page', 10);        // default 10

    // Daftar kolom yang boleh di-sort
    $allowedSorts = [
        'namaPosisi',
        'regionalDirektorat',
        'unitSub',
        'band_posisi',
        'status_kepegawaian',
        'lokasi_pekerjaan',
        'medis_non_medis',
        'jumlah_lowongan',
        'target_tanggal',
        'hiring_manager',
        'pendidikan_terakhir',
        'jurusan_relevan',
        'pengalaman_minimum',
        'domisili_preferensi',
        'jenis_kelamin',
        'batasan_usia',
        'created_by',
    ];

    if (! in_array($sort, $allowedSorts)) {
        $sort = 'id';
    }

    // === Filter data sesuai status ===
    $kebutuhan = Recruitment::where('status', 'kebutuhan')
        ->orderBy($sort, $direction)
        ->paginate($perPage, ['*'], 'kebutuhan_page')
        ->appends(compact('sort', 'direction', 'perPage'));

    $berjalan = Recruitment::where('status', 'berjalan')
        ->orderBy($sort, $direction)
        ->paginate($perPage, ['*'], 'berjalan_page')
        ->appends(compact('sort', 'direction', 'perPage'));

    $selesai = Recruitment::where('status', 'selesai')
        ->orderBy($sort, $direction)
        ->paginate($perPage, ['*'], 'selesai_page')
        ->appends(compact('sort', 'direction', 'perPage'));

    $draft = Recruitment::where('status', 'draft')
        ->orderBy($sort, $direction)
        ->paginate($perPage, ['*'], 'draft_page')
        ->appends(compact('sort', 'direction', 'perPage'));

    // --- Box statistik ---
    $jumlahKebutuhan = Recruitment::sum('jumlah_lowongan');
    $direktoratAktif = Recruitment::distinct('regionalDirektorat')->count('regionalDirektorat');
    $targetBulanIni  = Recruitment::whereMonth('target_tanggal', now()->month)
                                  ->whereYear('target_tanggal', now()->year)
                                  ->count();

    // Kirim ke view
    return view('recruitment.index', compact(
        'kebutuhan',
        'berjalan',
        'selesai',
        'draft',
        'sort',
        'direction',
        'jumlahKebutuhan',
        'direktoratAktif',
        'targetBulanIni',
        'perPage'
    ));
}



    public function create() {

        // Ambil step sekarang dari session (default = 1)
    $currentStep = session('currentStep', 1);
    return view('recruitment.create', compact('currentStep'));

    }

    public function store(Request $request) {
        $request->validate([

            'namaPosisi' => 'required|string|max:255',
            'regionalDirektorat' => 'required|string',
            'unitSub' => 'required|string',
            'band_posisi' => 'required|string',
            'status_kepegawaian' => 'required|string',
            'lokasi_pekerjaan' => 'required|string',
            'medis_non_medis' => 'required|string',
            'jumlah_lowongan' => 'required|string',
            'target_tanggal' => 'required|date',
            'hiring_manager' => 'required|string',
            'nde' => 'required|file|mimes:pdf,doc,docx|max:2048',
            'pendidikan_terakhir' => 'nullable|string',
            'jurusan_relevan' => 'nullable|string',
            'pengalaman_minimum' => 'nullable|string',
            'domisili_preferensi' => 'nullable|string',
            'jenis_kelamin' => 'nullable|string',
            'batasan_usia' => 'nullable|string'
        ]);


        $data = $request->all();
        

        //handle file upload
        if ($request->hasFile('nde')) {
            $data['nde'] = $request->file('nde')->store('uploads','public');
        }

        // isi otomatis created_by pakai user login
    $data['created_by'] = Auth::id();

        Recruitment::create($data);

        return redirect()->route('recruitment.index')->with('success', 'Posisi berhasil ditambahkan');
    }

    public function show($id) {
        $recruitments = Recruitment::findOrFail($id);
        return view('recruitment.show', compact('recruitments'));
    }

    public function edit($id) {
        $recruitments = Recruitment::findOrFail($id);
        return view('recruitment.edit', compact('recruitments'));
    }

    public function update(Request $request, $id) {
        $request->validate([
            'namaPosisi' => 'required|string|max:255',
            'regionalDirektorat' => 'required|string',
            'unitSub' => 'required|string',
            'band_posisi' => 'required|string',
            'status_kepegawaian' => 'required|string',
            'lokasi_pekerjaan' => 'required|string',
            'medis_non_medis' => 'required|string',
            'jumlah_lowongan' => 'required|string',
            'target_tanggal' => 'required|date',
            'hiring_manager' => 'required|string',
            'nde' => 'required|file|mimes:pdf,doc,docx|max:2048',
            'pendidikan_terakhir' => 'nullable|string',
            'jurusan_relevan' => 'nullable|string',
            'pengalaman_minimum' => 'nullable|string',
            'domisili_preferensi' => 'nullable|string',
            'jenis_kelamin' => 'nullable|string',
            'batasan_usia' => 'nullable|string'
        ]);

        $recruitments = Recruitment::findOrFail($id);

        $data = $request->all();

        if ($request->hasFile('nde')){
            $data['nde'] = $request->file('nde')->store('uploads', 'public');
        }
        $recruitments->update($data);


        return redirect()->route('recruitment.index')->with('success', 'Posisi berhasil diperbarui');
    }

    public function destroy($id) {
        $recruitments = Recruitment::findOrFail($id);
        $recruitments->delete();

        return redirect()->route('recruitment.index')->with('success', 'Posisi berhasil dihapus');
    }

    public function saveStep(Request $request) {
        $step = $request->input('step');
        $data = $request->except('step');

        session()->put("recruitment.step{$step}", $data);

        return response()->json([
            'success' => true,
            'message' => "Step {$step} berhasil disimpan",
            'data' => $data
        ]);
    }



public function nextStep(Request $request) 
{
    $step = $request->input('step', 1);

    // Validasi sesuai step
    if ($step == 1) {
        $request->validate([
            'namaPosisi' => 'required|string|max:255',
            'regionalDirektorat' => 'required|string',
            'unitSub' => 'required|string',
            'band_posisi' => 'required|string',
            'status_kepegawaian' => 'required|string',
            'lokasi_pekerjaan' => 'required|string',
            'medis_non_medis' => 'required|string',
            'jumlah_lowongan' => 'required|string',
            'target_tanggal' => 'required|date',
            'hiring_manager' => 'required|string',
            'nde' => 'required|file|mimes:pdf,doc,docx|max:2048',
        ]);
    }

    if ($step == 2) {
        $request->validate([
            'pendidikan_terakhir' => 'required|string',
            'jurusan_relevan' => 'required|string',
            'pengalaman_minimum' => 'required|string',
        ]);
    }

    // Simpan input step ini ke session
    session()->put("recruitment.step{$step}", $request->except('_token','step'));

    // Pindah ke step berikutnya
    $nextStep = $step + 1;
    session(['currentStep' => $nextStep]);

    return redirect()->route('recruitment.create');
}

public function previousStep(Request $request)
{
    $step = $request->input('step', 1);

    $prevStep = max(1, $step - 1);
    session(['currentStep' => $prevStep]);

    return redirect()->route('recruitment.create');
}

    public function submit(Request $request)
    {
    // Gabungkan semua step yang sudah disimpan di session
    $step1 = session('recruitment.step1', []);
    $step2 = session('recruitment.step2', []);

    $finalData = array_merge($step1, $step2);

    // Tambahan data otomatis
    $finalData['created_by'] = Auth::id();

    // Simpan ke database
    Recruitment::create($finalData);

    // Bersihkan session
    session()->forget('recruitment');
    session()->forget('currentStep');

    return redirect()->route('recruitment.index')->with('success', 'Data berhasil disimpan');
}
}
