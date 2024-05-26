<?php

namespace App\Http\Controllers;

use App\Models\Peserta;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PesertaPelatihanController extends Controller
{
    public function index()
    {
        // Ambil ID user yang sedang login dengan menggunakan guard 'peserta'
        $pesertaId = Auth::guard('peserta')->user()->id;

        // Ambil data pelatihan yang dienroll dengan status "acc" untuk user yang sedang login
        $peserta = Peserta::find($pesertaId);
        $pelatihanAcc = $peserta->course()->wherePivot('status', 'Diterima')->get();

        return view('peserta.pelatihan.listPesertaPelatihan', compact('pelatihanAcc'));
    }
    
    public function unenroll(Request $request)
    {
        // Ambil ID user yang sedang login dengan menggunakan guard 'peserta'
        $pesertaId = Auth::guard('peserta')->user()->id;

        // Cari peserta dan course berdasarkan ID mereka
        $peserta = Peserta::find($pesertaId);
        $course = Course::find($request->id);

        // Buatlah perkondisian
        if ($course) {
            // Ubah status course menjadi 'unenrolled'
            $peserta->Course()->updateExistingPivot($course->id, ['status' => 'Unenroll']);
            return redirect()->back()->with('success', 'Pelatihan berhasil di-unenroll.');
        } else {
            return redirect()->back()->with('error', 'Pelatihan gagal di-unenroll.');
        }
        
    }
}