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

        // if ($request->has('title')) {
        //     $query->whereHas('course', function ($q) use ($request) {
        //         $q->where('title', 'like', '%'. $request->title. '%');
        //     });
        // }

    
        // if ($request->has('status')) {
        //     $query->whereHas('Course', function ($q) use ($request) {
        //         $q->wherePivot('status', $request->status);
        //     });
        // }
        
        
        
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
    
        // Menyimpan file foto KTM dan KTP
        $ktm = $request->file('ktm');
        $ktmName = time() . '_' . $ktm->getClientOriginalName();
        $ktm->storeAs('public/seleksi/ktm', $ktmName);
    
        $ktp = $request->file('ktp');
        $ktpName = time() . '_' . $ktp->getClientOriginalName();
        $ktp->storeAs('public/seleksi/ktp', $ktpName);
    
        // Membuat instance Peserta dan Pelatihan
        $peserta = Peserta::find($id_peserta);
        $course = Course::find($id_course);
        
       
    
        // Menyimpan data ke tabel pivot
        $peserta->course()->attach($course->id, [
            'nik' => $request->nik,
            'ktm' => $ktmName,
            'ktp' => $ktpName,
            'status' => 'Pending', 
            'created_at' => now()->setTimezone('Asia/Jakarta')
        ]);
        
        $enrollment = $peserta->course()->where('course_id', $id_course)->first();

        if ($enrollment) {
            // Update the existing enrollment status to 'Pending'
            $peserta->course()->updateExistingPivot($id_course, ['status' => 'Pending']);
        } else {
            // Create a new enrollment with status 'Pending'
            $peserta->course()->attach($id_course, ['status' => 'Pending']);
        }

        return redirect()->route('student.dashboard.index')->with('success', 'Data tersimpan');
    }
   
    //controller untuk menampilkan form enroll
    public function enrollPelatihan($id_peserta, $id_course)
     
    {
        $peserta = Peserta::where('id', $id_peserta)->first();
        $course = Course::where('id', $id_course)->first();
        return view('peserta.registrasiPelatihan', compact('peserta', 'course')); 
        
    }   

    //controller untuk menampilkan tabel daftar 
    public function showDaftarEnroll()
    {
        $pesertaPelatihan = Peserta::with('course')->get();
        $pesertaPelatihan = Peserta::with('course')->orderBy('created_at', 'desc')->get();
        return view('admin.seleksiPesertaPelatihan', compact('pesertaPelatihan'));
    }
    

    //controller untuk menampilkan halaman blade buat nampilin detail dari enrollment
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
    
    // Update the pivot table entry
    $peserta->course()->updateExistingPivot($course->id, [
        'status' => $request->status,
    ]);
    
    return redirect()->route('seleksi_peserta', [$peserta->id, $course->id])->with('success', 'Status berhasil diperbarui');
}   




}
