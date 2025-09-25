<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Training;
use App\Models\Employee;
use Illuminate\Support\Facades\DB;

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

        //Kelulusan
        $kelulusan = Training::where('kelulusan', 'uploaded')->count();

        //Total Kelulusan
        $totalKelulusan = Training::count();
        $persenKelulusan = $totalKelulusan > 0 ? ($kelulusan / $totalKelulusan) * 100 : 0;


        //Status
        $pelatihanBerjalan = Training::where('status', 'On Going')->count();
        $pelatihanDijadwalkan = Training::where('status', 'scheduled')->count();
        $pelatihanTerlaksana = Training::where('status', 'completed')->count();

        $tanggalMulai = Training::orderBy('tanggal_mulai', 'desc')->get();
        $perPage = $request->input('per_page', 10);
        $totalBiaya = Training::sum('total_biaya');
        $biaya = Training::sum('biaya');
        $totalNamaTraining = Training::count('nama_training');

        // ambil data sesuai jumlah per_page
        $perPages = $request->input('per_page', 10);
        $perPageSelesai = $request->input('per_page_selesai', 10);
        $perPageAnalysis = $request->input('per_pageND', 10);

        $trainingsAnalysis = Training::paginate($perPageAnalysis);
        $totalTrainingAnalysis = Training::count();


        $trainings = Training::where('status', '!=', 'Completed')->paginate($perPages);
        $trainingSelesai = Training::where('status', 'Completed')->paginate($perPageSelesai);

        // Mengambil jumlah yang sudah di per_page dan yang nilainya bukan Completed
        $jumlahTrainingsNC = Training::where('status', '!=', 'Completed')->count();
        $jumlahTrainingsC = Training::where('status', 'Completed')->count();

        // Ambil data sesuai jumlah per_page Selesai
        $trainingsSelesai = Training::paginate($perPageSelesai);
        $totalTrainingsSelesai = Training::count();


        $sortByTraining    = $request->query('sort_by_training', 'nama_training');
        $sortOrderTraining = $request->query('sort_order_training', 'desc');

        $allowedTraining = [
            'id',
            'id_training',
            'nama_training',
            'status',
            'stream',
            'keterangan',
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
            'sertifikat',
            'kelulusan',
        ];

        if (!in_array($sortByTraining, $allowedTraining)) {
            $sortByTraining = 'nama_training';
        }
        $sortOrderTraining = $sortOrderTraining === 'asc' ? 'asc' : 'desc';

        $training = Training::orderBy($sortByTraining, $sortOrderTraining)->get();

        $sortBy = $request->input('sort_by_training', 'id');
        $sortOrder = $request->input('sort_order_training', 'asc');

        $trainingss = Training::orderBy($sortBy, $sortOrder)->paginate($perPage);

        //    PENCARIAN DI SEDANG BERJALAN
        $query = Training::where('status', '!=', 'Completed'); // filter tetap ada

        if ($request->filled('search')) {
            $query->where('nama_training', 'like', '%' . $request->search . '%');
        }

        // urutkan: On Going di atas, sisanya urut default
        $query->orderByRaw("CASE WHEN status = 'On Going' THEN 0 ELSE 1 END")
            ->orderBy('nama_training', 'asc'); // urutan tambahan (opsional)

        $trainings = $query->paginate($request->per_page ?? 10)
            ->appends($request->only('search', 'per_page'));

        return view(
            'training.index',
            compact(
                'training',
                'trainings',
                'trainingss',
                'trainingSelesai',
                'trainingsAnalysis',
                'totalTrainingAnalysis',
                'trainingsSelesai',
                'totalTrainingsSelesai',
                'jumlahTrainingsNC',
                'jumlahTrainingsC',
                'totalPartisipan',
                'tna',
                'persenTna',
                'persenKelulusan',
                'nonTna',
                'pelatihanBerjalan',
                'pelatihanDijadwalkan',
                'tanggalMulai',
                'totalTraining',
                'perPage',
                'perPages',
                'perPageSelesai',
                'trainings',
                'totalBiaya',
                'biaya',
                'totalNamaTraining',
                'sortByTraining',
                'sortBy',
                'sortOrder',
                'sortOrderTraining',
                'pelatihanTerlaksana',
            )
        );
    }


    public function create()
    {
        $employees = Employee::select('id', 'nik', 'name', 'direktorat', 'posisi')->get();
        return view('training.create', compact('employees'));
    }


    public function store(Request $request)
    {
        // tentukan nilai TNA otomatis
        $tnaValue = $request->has('gaps') ? 'TNA' : 'Non-TNA';

        // simpan training (hanya 1 row)
        $training = Training::create([
            'nama_training'          => $request->nama_training,
            'deskripsi_training'     => $request->deskripsi_training,
            'tipe_training'          => $request->tipe_training,
            'penyelenggara'          => $request->penyelenggara,
            'tanggal_mulai'          => $request->tanggal_mulai,
            'tanggal_selesai'        => $request->tanggal_selesai,
            'lokasi'                 => $request->lokasi,
            'metode_pelatihan'       => $request->metode_pelatihan,
            'biaya'                  => $request->biaya,
            'total_biaya'            => $request->total_biaya,
            'stream'                 => $request->stream,
            'keterangan'             => $request->keterangan,
            'sertifikat'             => $request->sertifikat_partisipasi,
            'kelulusan'              => $request->sertifikat_kelulusan,
            'partisipan'             => 0,
            'tna'                    => $tnaValue,
        ]);


        // simpan peserta ke tabel training_participants
        if ($request->has('niks')) {
            foreach ($request->niks as $i => $nik) {
                $training->participants()->create([
                    'nik'            => $nik,
                    'nama'           => $request->names[$i],
                    'direktorat'     => $request->direktorats[$i],
                    'nama_posisi'    => $request->posisis[$i],
                    'gap_kompetensi' => $request->gaps[$i],
                    'keterangan'     => $request->kets[$i] ?? $tnaValue,
                    // kalau ada input keterangan → pakai itu,
                    // kalau kosong → ikut default TNA dari training
                ]);
            }
        }

        // update jumlah peserta di tabel trainings
        $training->update([
            'partisipan' => $training->participants()->count()
        ]);

        return redirect()->route('training.index')->with('success', 'Training berhasil dibuat!');
    }






    public function show($id)
    {
        $training = Training::with('participants')->findOrFail($id);
        return view('training.show', compact('training'));
    }


    public function edit($id)
    {
        $training = Training::findOrFail($id);
        $employee = Employee::select('id', 'nik', 'name', 'direktorat', 'posisi')->get();

        return view('training.edit', compact(
            'training',
            'employee',
        ));
    }

    public function update(Request $request, $id)
    {
        $training = Training::findOrFail($id);

        $training->update($request->only([
            'nama_training',
            'deskripsi_training',
            'tipe_training',
            'penyelenggara',
            'tanggal_mulai',
            'tanggal_selesai',
            'lokasi',
            'metode_pelatihan',
            'biaya',
            'total_biaya',
            'stream',
            'keterangan',
            'sertifikat',
            'kelulusan',
            'gap_kompetensi',
        ]));

        // simpan peserta baru
        if ($request->has('niks')) {
            foreach ($request->niks as $i => $nik) {
                $training->participants()->create([
                    'nik'            => $nik,
                    'nama'           => $request->names[$i],
                    'direktorat'     => $request->direktorats[$i],
                    'nama_posisi'    => $request->posisis[$i],
                    'keterangan'     => $request->kets[$i],
                    'gap_kompetensi' => $request->gaps[$i],
                ]);
            }
        }

        // update jumlah peserta
        $training->update([
            'partisipan' => $training->participants()->count()
        ]);

        return redirect()->route('training.index')->with('success', 'Training berhasil diupdate!');
    }



    public function destroy($id)
    {
        $training = Training::findOrFail($id);
        $training->delete();

        return redirect()->route('training.index')->with('success', 'Training berhasil dihapus.');
    }

    public function upload(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:xlsx,xls,csv,pdf,docx|max:2048'
        ]);

        $file = $request->file('file');
        $filename = time() . '_' . $file->getClientOriginalName();
        $path = $file->storeAs('uploads/training', $filename, 'public');

        DB::table('training_files')->insert([
            'filename'   => $filename,
            'path'       => $path,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
