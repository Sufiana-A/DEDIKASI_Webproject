<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\peserta;
use App\Models\Course;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RegistrasiPelatihanController extends Controller
{
    
    public function search(Request $request)
    {
        $query = Peserta::query();

        if ($request->has('nama')) {
            $query->where('first_name', 'like', '%'. $request->nama. '%')
                  ->orWhere('last_name', 'like', '%'. $request->nama. '%');
        }
        $pesertaPelatihan = $query->get();
        return view('admin.seleksiPesertaPelatihan', compact('pesertaPelatihan'));
    }

    public function store(Request $request, $id_peserta, $id_course)
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
        $ktm = $request->file('ktm');
        $ktmName = time() . '_' . $ktm->getClientOriginalName();
        $ktm->storeAs('public/seleksi/ktm', $ktmName);
    
        $ktp = $request->file('ktp');
        $ktpName = time() . '_' . $ktp->getClientOriginalName();
        $ktp->storeAs('public/seleksi/ktp', $ktpName);
        
        //buat instance    
        $peserta = Peserta::find($id_peserta);
        $course = Course::find($id_course);

        // save data ke tabel pivot
        $peserta->course()->attach($course->id, [
            'nik' => $request->nik,
            'ktm' => $ktmName,
            'ktp' => $ktpName,
            'status' => 'Pending', 
            'created_at' => now()->setTimezone('Asia/Jakarta')
        ]);
        
        $enrollment = $peserta->course()->where('course_id', $id_course)->first();

        if ($enrollment) {
            // Update status enroll saat ini ke pending
            $peserta->course()->updateExistingPivot($id_course, ['status' => 'Pending']);
        } else {
            // buat status default jadi pending
            $peserta->course()->attach($id_course, ['status' => 'Pending']);
        }

        return redirect()->route('student.dashboard.index')->with('success', 'Data tersimpan');
    }
   
    //nampilkan form enroll
    public function enrollPelatihan($id_peserta, $id_course)
     
    {
        $peserta = Peserta::where('id', $id_peserta)->first();
        $course = Course::where('id', $id_course)->first();
        return view('peserta.registrasiPelatihan', compact('peserta', 'course')); 
        
    }   

    //menampilkan tabel daftar 
    public function showDaftarEnroll()
    {
        $pesertaPelatihan = Peserta::with('course')->get();
        $pesertaPelatihan = Peserta::with('course')->orderBy('created_at', 'desc')->get();
        return view('admin.seleksiPesertaPelatihan', compact('pesertaPelatihan'));
    }
    
    //menampilkan detail  enrollment peserta tertentu
    public function detailPesertaPelatihan(Request $request, $id_peserta, $id_course)
{
    $peserta = Peserta::with('course')->findOrFail($id_peserta);
    $course = $peserta->course->find($id_course);
    return view('admin.updateStatusSeleksi', compact('peserta', 'course'));
}

public function updateEnroll(Request $request, $id_peserta, $id_course)
{
    $request->validate([
        'status' => 'required',
    ]);
    
    $peserta = Peserta::find($id_peserta);
    $course = Course::find($id_course);
    
    // Update tabel pivot
    $peserta->course()->updateExistingPivot($course->id, [
        'status' => $request->status,
    ]);
    
    return redirect()->route('seleksi_peserta', [$peserta->id, $course->id])->with('success', 'Status berhasil diperbarui');
}   
}
