<?php
namespace App\Http\Controllers;

use App\Models\TrainingParticipant;
use Illuminate\Http\Request;

class TrainingParticipantController extends Controller
{
    public function destroy($id)
    {
        $participant = TrainingParticipant::findOrFail($id);
        $participant->delete();

        return back()->with('success', 'Peserta berhasil dihapus!');
    }
}
