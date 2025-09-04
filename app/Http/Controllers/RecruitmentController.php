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
    $sort = $request->get('sort', 'id');       // default sort by id
    $direction = $request->get('direction', 'desc'); // default desc

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

    // Kalau kolom yang dikirim user tidak ada di daftar, pakai default
    if (! in_array($sort, $allowedSorts)) {
        $sort = 'id';
    }

    // Ambil data recruitment dengan sorting
    $recruitments = Recruitment::orderBy($sort, $direction)
        ->paginate(10)
        ->appends([
            'sort' => $sort,
            'direction' => $direction
        ]); // biar pagination bawa query sort

     // --- Tambahan untuk box statistik ---
    $jumlahKebutuhan = Recruitment::sum('jumlah_lowongan');

    $direktoratAktif = Recruitment::distinct('regionalDirektorat')
                                  ->count('regionalDirektorat');

    $targetBulanIni = Recruitment::whereMonth('target_tanggal', now()->month)
                                 ->whereYear('target_tanggal', now()->year)
                                 ->count();
    // -----------------------------------

    // Kirim ke view
    return view('recruitment.index', compact(
        'recruitments',
        'sort',
        'direction',
        'jumlahKebutuhan',
        'direktoratAktif',
        'targetBulanIni'
    ));
}


    public function create() {

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
    // Step sekarang dari request
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
            'pendidikan_terakhir' => 'nullable|string',
            'jurusan_relevan' => 'nullable|string',
            'pengalaman_minimum' => 'nullable|string',
            'domisili_preferensi' => 'nullable|string',
            'jenis_kelamin' => 'nullable|string',
            'batasan_usia' => 'nullable|string',
        ]);
    }

    // Simpan data step sekarang ke session
    session()->put("recruitment.step{$step}", $request->except('_token','step'));

    // Naik ke step berikutnya
    $nextStep = $step + 1;
    session(['currentStep' => $nextStep]);

    return redirect()->route('recruitment.create');
}


    public function submit(Request $request)
    {
        $step1 = session('recruitment.step1', []);
        $step2 = session('recruitment.step2', []);

        $finalData = array_merge($step1, $step2);
        $finalData['created_by_role'] = Auth::user()->role;


        Recruitment::create($finalData);

        session()->forget('recruitment');

        session()->forget('currentStep');


        return response()->json([
            'success' => true,
            'message' => 'Data berhasil disubmit!',
            'data' => $finalData
        ]);
    }
}
