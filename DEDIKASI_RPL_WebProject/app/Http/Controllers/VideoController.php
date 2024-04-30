<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VideoController extends Controller
{
    public function index(){
        return view('video/mentor/video-list');
    } 

    public function create(){
        return view('video/mentor/video-create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul'     => 'required',
            'deskripsi' => 'required',
            'file' => 'required|mimes:pdf|max:2048', // Validasi file PDF
            'urutan' => 'required|integer', // Validasi urutan
        ]);

        $video = new Video;
        $video->deskripsi = $request->deskripsi;
        $video->urutan = $request->urutan; // Simpan urutan

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('uploads', $filename);
            $assignment->file = $path;
        }

        $video->save();

        return redirect()->route('video/mentor/video-list')->with('success', 'Video berhasil ditambahkan');
    }


}
