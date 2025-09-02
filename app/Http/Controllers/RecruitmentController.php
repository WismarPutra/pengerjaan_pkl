<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recruitment;

class RecruitmentController extends Controller
{
    public function index() {
        $recruitments = Recruitment::paginate(10);
        return view('recruitment.index', compact('recruitments'));
    }

    public function create() {
        return view('recruitment.create');
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
        $data['created_by_role'] = auth()->user()->role;

        //handle file upload
        if ($request->hasFile('nde')) {
            $data['nde'] = $request->file('nde')->store('uploads','public');
        }

        
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

    public function nextStep(Request $request) {
        $currentStep = $request->input('step', 1);

        session(['currentStep' => $currentStep]);

        return redirect()->back();
    }

    public function submit(Request $request)
    {
        $step1 = session('recruitment.step1', []);
        $step2 = session('recruitment.step2', []);

        $finalData = array_merge($step1, $step2);

        Recruitment::create($finalData);

        session()->forget('recruitment');

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil disubmit!',
            'data' => $finalData
        ]);
    }
}
