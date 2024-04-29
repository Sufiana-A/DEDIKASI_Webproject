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
        $pelatihanAcc = $peserta->course()->wherePivot('status', 'acc')->get();

        return view('peserta_pelatihan.listPesertaPelatihan', compact('pelatihanAcc'));
    }
}