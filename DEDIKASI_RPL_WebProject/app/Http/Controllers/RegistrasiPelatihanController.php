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
        ]);
    
        return redirect()->route('submit_enroll_pelatihan')->with('success', 'Data tersimpan');
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
        // $pesertaPelatihan = Peserta::with('course')->orderBy('created_at', 'desc')->get();
        return view('admin.seleksiPesertaPelatihan', compact('pesertaPelatihan'));
    }
    


    //controller untuk menampilkan halaman blade buat nampilin detail dari enrollment
    public function detailPesertaPelatihan(Request $request, $id_peserta, $id_course)
{
    $peserta = Peserta::with('course')->findOrFail($id_peserta);
    $course = $peserta->course->find($id_course);
    
    $data_peserta = peserta::all();
    $courses = Course::with('peserta')->get();
    return view('admin.updateStatusSeleksi', compact('data_peserta','courses'));


    //return view('admin.updateStatusSeleksi', compact('peserta', 'course', 'ktpName', 'ktmName')); 
}

   

    // public function updateEnroll(Request $request, $id_course)
    // {
    // // Mengupdate enroll_at di tabel pivot peserta_pelatihan
    //     $peserta->pelatihan()->updateExistingPivot($course->id, [
    //     'enroll_at' => now(), // umtuk tanggal dan waktu saat ini
    //     'enroll_at' => Date::today(), //untuk tanggal
    //     'status' => $request->status_enroll 
    // ]);
    // }





}
