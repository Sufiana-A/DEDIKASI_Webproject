<?php

namespace App\Http\Controllers;

use App\Models\Peserta;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class RekomendasiController extends Controller
{
    public function index()
    {
        // Ambil ID user yang sedang login dengan menggunakan guard 'peserta'
        $pesertaId = Auth::guard('peserta')->user()->id;

        // Ambil data pelatihan yang dienroll dengan status "acc" untuk user yang sedang login
        $peserta = Peserta::find($pesertaId);
        $pelatihanAcc = $peserta->course()->wherePivot('status', 'Diterima')->get();

        return view('peserta.rekomendasi', compact('pelatihanAcc'));

    }
   

    public function showFavorite()
    {
        // Ambil ID user yang sedang login dengan menggunakan guard 'peserta'
        $pesertaId = Auth::guard('peserta')->user()->id;

        // Ambil data kursus favorit dengan status 'yes' untuk user yang sedang login
        $peserta = Peserta::find($pesertaId);
        $favoriteCourses = $peserta->course()->wherePivot('favorite', 'yes')->get();

        return view('peserta.favorite', compact('favoriteCourses'));
    }
    public function saveCheckbox(Request $request)
    {
        // Ambil ID user yang sedang login dengan menggunakan guard 'peserta'
        $pesertaId = Auth::guard('peserta')->user()->id;
    
        // Ambil ID kursus yang dipilih dari data yang diterima dari form
        $favoriteCourses = $request->input('favorite_course');
    
        // Cek apakah peserta telah terdaftar
        $peserta = Peserta::find($pesertaId);
    
        if ($peserta) {
            // Loop melalui setiap ID kursus yang dipilih
            foreach ($favoriteCourses as $courseId) {
                // Periksa apakah kursus dengan ID tersebut ada
                $course = Course::find($courseId);
    
                if ($course) {
                    // Cek apakah entri pivot sudah ada
                    $existingPivot = $peserta->course()->where('course_id', $courseId)->first();
    
                    if ($existingPivot) {
                        // Jika entri pivot sudah ada, update nilai 'favorite'
                        $peserta->course()->updateExistingPivot($course->id, ['favorite' => 'yes']);
                    } else {
                        // Jika entri pivot belum ada, tambahkan entri baru dengan nilai 'favorite'
                        $peserta->course()->attach($course->id, ['favorite' => 'yes', 'nik' => 'NILAI_NIK_YANG_DIINGINKAN']);
                    }
                }
            }
    
            // Redirect atau kembali ke halaman sebelumnya dengan pesan sukses
            return redirect()->back()->with('success', 'Course berhasil di tambahkan ke favorite!');
        } else {
            // Redirect atau kembali ke halaman sebelumnya dengan pesan error jika peserta tidak ditemukan
            return redirect()->back()->with('error', 'Gagal menyimpan data checkbox favorit. Peserta tidak ditemukan.');
        }
    }
    
    public function removeFavorite(Request $request)
    {
        // Ambil ID user yang sedang login dengan menggunakan guard 'peserta'
        $pesertaId = Auth::guard('peserta')->user()->id;

        // Cari peserta dan course berdasarkan ID mereka
        $peserta = Peserta::find($pesertaId);
        $course = Course::find($request->id);

        // Buatlah perkondisian
        if ($course) {
            // Ubah status favorite menjadi 'no'
            $peserta->course()->updateExistingPivot($course->id, ['favorite' => 'no']);
            return redirect()->back()->with('success', 'Course berhasil dihapus dari favorit.');
        } else {
            return redirect()->back()->with('error', 'Gagal menghapus kursus dari favorit.');
        }
    }
}
    

