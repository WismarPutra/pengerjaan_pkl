<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Training;

class TrainingController extends Controller
{
    public function index(Request $request)
    {
        // Hitung total partisipan dari kolom 'partisipan'
        $totalPartisipan = Training::sum('partisipan');

        //TNA
        $tna = Training::where('tna', 'TNA')->count();
        $nonTna = Training::where('tna', 'Non-TNA')->count();

        //Total Training
        $totalTraining = Training::count();
        $persenTna = $totalTraining > 0 ? ($tna / $totalTraining) * 100 : 0;


        //Status
        $pelatihanBerjalan = Training::where('status', 'On Going')->count();
        $pelatihanDijadwalkan = Training::where('status', 'scheduled')->count();

        $tanggalMulai = Training::orderBy('tanggal_mulai', 'desc')->get();
        $perPage = $request->get('per_page', 5);
        $totalBiaya = Training::sum('total_biaya');
        $biaya = Training::sum('biaya');
        $totalNamaTraining = Training::count('nama_training');

        // ambil data sesuai jumlah per_page
        $trainings = Training::paginate($perPage);


        $sortByTraining    = $request->query('sort_by_training', 'nama_training');
        $sortOrderTraining = $request->query('sort_order_training', 'desc');

        $allowedTraining = [
            'id',
            'id_training',
            'nama_training',
            'status',
            'stream',
            'keterangan',
            'partisipan',
            'tanggal_mulai',
            'tanggal_selesai',
            'waktu_Pelaksanaan',
            'tipe_training',
            'penyelenggara',
            'metode_pelatihan',
            'tna',
            'nama',
            'nama_posisi',
            'unit',
            'sub_dit',
            'dit',
            'loker',
            'kota',
            'status_analysis',
            'status_training',
            'prioritas',
            'biaya',
            'gap_kompetensi',
            'total_biaya',
        ];

        if (!in_array($sortByTraining, $allowedTraining)) {
            $sortByTraining = 'nama_training';
        }
        $sortOrderTraining = $sortOrderTraining === 'asc' ? 'asc' : 'desc';

        $training = Training::orderBy($sortByTraining, $sortOrderTraining)->get();
        return view('training.index', compact('training', 'totalPartisipan', 'tna', 'persenTna', 'nonTna', 'pelatihanBerjalan', 'pelatihanDijadwalkan', 'tanggalMulai', 'totalTraining', 'perPage', 'trainings', 'totalBiaya', 'biaya', 'totalNamaTraining', 'sortByTraining', 'sortOrderTraining'));
    }


    public function create()
    {
        return view('training.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_training' => 'required|string|max:255',
            'nama_training' => 'required',
            'deskripsi_training' => 'required',
            'tipe_training' => 'required|string',
            'sertifikat_partisipasi' => 'string',
            'sertifikat_pelatihan' => 'string',
            'penyelenggara' => 'required',
            'durasi' => 'required|string',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date|after_or_equal:start_date',
            'lokasi' => 'required',
            'metode_pelatihan' => 'required|string',
            'partisipan' => 'required|integer',
            'status' => 'required',
            'biaya' => 'required|string',
            'total_biaya' => 'required|string',
        ]);

        $training = Training::create([
            'id_training' => $request->id_training,
            'nama_training' => $request->nama_training,
            'deskripsi_training' => $request->deskripsi_training,
            'tipe_training' => $request->tipe_training,
            'sertifikat_partisipasi' => $request->sertifikat_partisipasi,
            'sertifikat_pelatihan' => $request->sertifikat_pelatihan,
            'penyelenggara' => $request->penyelenggara,
            'durasi' => $request->durasi,
            'tanggal_mulai' => $request->tanggal_mulai,
            'tanggal_selesai' => $request->tanggal_selesai,
            'lokasi' => $request->lokasi,
            'metode_pelatihan' => $request->metode_pelatihan,
            'partisipan' => $request->partisipan,
            'status' => $request->status,
            'biaya' => $request->biaya,
            'total_biaya' => $request->total_biaya,
        ]);


        return redirect()->route('training.index')->with('success', 'Training berhasil ditambahkan.');
    }

    public function show($id)
    {
        $training = Training::findOrFail($id);
        return view('training.show', compact('training'));
    }

    public function edit($id)
    {
        $training = Training::findOrFail($id);
        return view('training.edit', compact('training'));
    }

    public function update(Request $request, $id)
    {
        $training = Training::findOrFail($id);

        $training->update($request->all());

        return redirect()->route('training.index')->with('success', 'Training berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $training = Training::findOrFail($id);
        $training->delete();

        return redirect()->route('training.index')->with('success', 'Training berhasil dihapus.');
    }
}
