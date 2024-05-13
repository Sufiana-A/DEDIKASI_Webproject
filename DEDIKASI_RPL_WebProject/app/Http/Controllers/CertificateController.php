<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Certificate;
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
        $sertifikat = Certificate::all();
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
        $certificate = $request->file('file');
        $certificate -> storeAs('public/certificates', $certificate->hashName());

        // Simpan data sertifikat ke database
        Certificate::create([
            'peserta_id' => $request->id_peserta,
            'course_id' => $request->id_pelatihan,
            'nama_file' =>  $certificate->hashName(),
        ]);

        return redirect()->back()->with('success', 'Sertifikat berhasil diunggah.');
    }   

    
    /**
     * Display the specified resource.
     */
    public function show(Certificate $certificate)
    {
        return __METHOD__;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Certificate $certificate)
    {
        return __METHOD__;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCertificateRequest $request, Certificate $certificate)
    {
        return __METHOD__;
    }

    /**
     * Remove the specified resource from storage.
     */
    // public function destroy(Certificate $certificate)
    // {
    //     // return __METHOD__;
    //     Certificate::findOrFail($certificate);
        
    //     $certificate = Certificate::where('id', $certificate->id)->firstOrFail();
    //     $certificate->delete();
    //     return redirect(route('sertifikat.create'));
    // }

    public function destroy(Certificate $certificate)
    {
        try {
            Certificate::findOrFail($certificate->id);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return redirect()->back()->with('error', 'Certificate not found.');
        }
        
        // Jika Certificate ditemukan, lanjutkan dengan menghapusnya
        $certificate->delete();
        
        // Redirect ke halaman tertentu setelah penghapusan
        return redirect(route('sertifikat.create'))->with('success', 'Certificate deleted successfully.');
    }
    

}
