<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MateriController extends Controller
{
    
        public function index(){
            return view('materi/mentor/materi-list');
        } 
    
        public function create(){
            return view('materi/mentor/materi-create');
        }
    
        public function store(Request $request)
        {
            $request->validate([
                'judul'     => 'required',
                'deskripsi' => 'required',
                'file' => 'required|mimes:pdf|max:2048', // Validasi file PDF
                'urutan' => 'required|integer', // Validasi urutan
            ]);
    
            $materi = new Materi;
            $materi->deskripsi = $request->deskripsi;
            $materi->urutan = $request->urutan; // Simpan urutan
    
            if ($request->hasFile('file')) {
                $file = $request->file('file');
                $filename = time() . '.' . $file->getClientOriginalExtension();
                $path = $file->storeAs('uploads', $filename);
                $assignment->file = $path;
            }
    
            $materi->save();
    
            return redirect()->route('materi/mentor/materi-list')->with('success', 'Materi berhasil ditambahkan');
        }
    
    
    }
    