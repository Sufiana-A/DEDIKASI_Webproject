<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Certificate;
use App\Http\Requests\StoreCertificateRequest;
use App\Http\Requests\UpdateCertificateRequest;

class CertificateController extends Controller
{
    public function index()
    {
        $sertifikat = Certificate::all();
        return true;
    }

    public function create()
    {
        return view('certificate.addCertificate');
    }

    public function store(StoreCertificateRequest $request)
    {        
        // Validasi data inputan
        $request->validate([
            'id_peserta' => 'required|exists:peserta,id',
            'id_pelatihan' => 'required|exists:pelatihans,id',
            'file' => 'required|file|mimes:pdf',
        ]);

        // Simpan file
        $certificate = $request->file('file');
        $certificate -> storeAs('public/certificates', $certificate->hashName());

        // Simpan data sertifikat ke database
        Certificate::create([
            'peserta_id' => $request->id_peserta,
            'pelatihan_id' => $request->id_pelatihan,
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
    public function destroy(Certificate $certificate)
    {
        return __METHOD__;
    }
}
