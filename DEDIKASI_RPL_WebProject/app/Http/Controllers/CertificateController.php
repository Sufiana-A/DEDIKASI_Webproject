<?php

namespace App\Http\Controllers;

use App\Models\Certificate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreCertificateRequest;
use App\Http\Requests\UpdateCertificateRequest;
use Illuminate\Database\Eloquent\ModelNotFoundException;


class CertificateController extends Controller
{
    public function index()
    {
        $sertifikat = Certificate::all();
        return true;
    }

    public function create()
    {
        $sertifikat = Certificate::with(['peserta', 'Course'])->get();
        return view('certificate.addCertificate', ['sertifikat' => $sertifikat]);
    }

    public function store(StoreCertificateRequest $request)
    {        
        // Validasi data inputan
        $request->validate([
            'id_peserta' => 'required|exists:peserta,id',
            'id_pelatihan' => 'required|exists:courses,id',
            'file' => 'required|file|mimes:pdf',
        ]);

        // Simpan file
        $sertifikat = $request->file('file');
        $sertifikat -> storeAs('public/certificates', $sertifikat->hashName());

        // Simpan data sertifikat ke database
        Certificate::create([
            'peserta_id' => $request->id_peserta,
            'course_id' => $request->id_pelatihan,
            'nama_file' =>  $sertifikat->hashName(),
        ]);

        return redirect()->back()->with('success', 'Sertifikat berhasil diunggah.');
    }   

    
    /**
     * Kirim data sertifikat ke view
     */
    public function show(Certificate $sertifikat)
    {
        return view('certificate.showCertificate', ['sertifikat' => $sertifikat]);
    }

    public function download($fileName)
    {
        // dd(Auth::user());
        return Storage::download('public/certificates/'.$fileName, 'Sertifikat-' . Auth::guard('peserta')->user()->first_name . '.pdf');
        
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Certificate $sertifikat)
    {
        return __METHOD__;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCertificateRequest $request, Certificate $sertifikat)
    {
        return __METHOD__;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Certificate $sertifikat)
    {
        Storage::disk('local')->delete('public/certificates/'.$sertifikat->nama_file);
        $sertifikat->delete();
        return redirect(route('sertifikat.create'));
    }

    // public function destroy(Certificate $sertifikat)
    // {
    //     try {
    //         Certificate::findOrFail($sertifikat->id);
    //     } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
    //         return redirect()->back()->with('error', 'Certificate not found.');
    //     }
        
    //     // Jika Certificate ditemukan, lanjutkan dengan menghapusnya
    //     $sertifikat->delete();
        
    //     // Redirect ke halaman tertentu setelah penghapusan
    //     return redirect(route('sertifikat.create'))->with('success', 'Certificate deleted successfully.');
    // }
    
}
