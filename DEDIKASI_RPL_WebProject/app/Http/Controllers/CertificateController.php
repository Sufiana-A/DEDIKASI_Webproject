<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Certificate;
use App\Http\Requests\StoreCertificateRequest;
use App\Http\Requests\UpdateCertificateRequest;

class CertificateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return __METHOD__;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return __METHOD__;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCertificateRequest $request)
    {        
        // Validasi data input
        $request->validate([
            'nama' => 'required',
            'file' => 'required|file',
        ]);

        // Simpan file
        $file = $request->file('file');
        $namaFile = $file->getClientOriginalName();
        $file->move('sertifikat', $namaFile);

        // Simpan data sertifikat ke database
        Sertifikat::create([
            'nama' => $request->nama,
            'file' => $namaFile,
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
