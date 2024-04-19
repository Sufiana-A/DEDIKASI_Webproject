<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\peserta;
use App\Models\Pelatihan;
use Illuminate\Support\Facades\DB;

class RegistrasiPelatihanController extends Controller
{
    
    public function store(Request $request, $id_peserta, $id_pelatihan)
    {
        $request->validate([
            'ktm' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'ktp' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);
    
        
        $request->validate([
            'nik' => 'required|size:16',
        ], [
            'nik.required' => 'NIK harus diisi.',
            'nik.size' => 'NIK harus tepat 16 digit.',
        ]);
    

        // Menyimpan file foto KTM dan KTP
        $ktm = $request->file('ktm');
        $ktmName = time() . '_' . $ktm->getClientOriginalName();
        $ktm->storeAs('public/verifikasi', $ktmName);
    
        $ktp = $request->file('ktp');
        $ktpName = time() . '_' . $ktp->getClientOriginalName();
        $ktp->storeAs('public/verifikasi', $ktpName);
    
        // Membuat instance Peserta dan Pelatihan
        $peserta = Peserta::find($id_peserta);
        $pelatihan = Pelatihan::find($id_pelatihan);
    
        // Menyimpan data ke tabel pivot
        $peserta->pelatihan()->attach($pelatihan->id, [
            'ktm' => $ktmName,
            'ktp' => $ktpName,
            'status' => 'pending', // atau status default lainnya
        ]);
    
        return redirect()->route('enrollment')->with('success', 'pesan sukses');
    }

    //controller untuk menampilkan tabel daftar 
        public function showDaftarEnroll()
    {
        $pesertaPelatihan = Peserta::with('pelatihan')->get();
        return view('daftar_peserta', compact('pesertaPelatihan'));
    }


    //controller untuk menampilkan halaman blade buat nampilin detail dari enrollment
    public function detailPesertaPelatihan($pesertaId, $pelatihanId)
    {
        $peserta = Peserta::with('pelatihan')->findOrFail($pesertaId);
        $pelatihan = $peserta->pelatihan->find($pelatihanId);
        return view('detail_peserta_pelatihan', compact('peserta', 'pelatihan'));
    }


    public function updateEnroll()
    {
    // Mengupdate enroll_at di tabel pivot peserta_pelatihan
        $peserta->pelatihan()->updateExistingPivot($pelatihan->id, [
        'enroll_at' => now(), // pake ini buat dapet tanggal dan waktu saat ini
        'enroll_at' => Date::today(), //kalo ini buat tanggalnya aja
        'status' => $request->status_enroll 
    ]);
   
    }


}
