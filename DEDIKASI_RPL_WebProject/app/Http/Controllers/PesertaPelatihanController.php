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
        $pesertaId = Auth::guard('peserta')->user()->id;

        // PKD-22
        $peserta = Peserta::find($pesertaId);
        $pelatihanAcc = $peserta->course()->wherePivot('status', 'Diterima')->get();

        return view('peserta.pelatihan.listPesertaPelatihan', compact('pelatihanAcc'));
    }
    
    public function unenroll(Request $request)
    {
        $pesertaId = Auth::guard('peserta')->user()->id;

        // PKD-32
        $peserta = Peserta::find($pesertaId);
        $course = Course::find($request->id);

        if ($course) {
            $peserta->Course()->updateExistingPivot($course->id, ['status' => 'Unenroll']);
            return redirect()->back()->with('success', 'Pelatihan berhasil di-unenroll.');
        } else {
            return redirect()->back()->with('error', 'Pelatihan gagal di-unenroll.');
        }
        
    }
}