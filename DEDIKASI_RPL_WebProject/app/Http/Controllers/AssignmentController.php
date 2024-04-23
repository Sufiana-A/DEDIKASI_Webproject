<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AssignmentController extends Controller
{
    public function index(){
        return view('assignment/mentor/assignment-list');
    } 

    public function create(){
        return view('assignment-create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul'     => 'required',
            'deskripsi' => 'required',
            'file' => 'required|mimes:pdf|max:2048', // Validasi file PDF
            'urutan' => 'required|integer', // Validasi urutan
        ]);

        $assignment = new Assignment;
        $assignment->deskripsi = $request->deskripsi;
        $assignment->urutan = $request->urutan; // Simpan urutan

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('uploads', $filename);
            $assignment->file = $path;
        }

        $assignment->save();

        return redirect()->route('pelatihan_assignments')->with('success', 'Assignment berhasil ditambahkan');
    }
    
    public function update(Request $request, $id)
    {
        $request->validate([
            'id_tugas' => 'nullable|string',
            'judul_tugas' => 'nullable|string',
            'deskripsi_tugas' => 'nullable|string',
            'link_terkait' => 'nullable|string',
            'tugas_dibuka' => 'nullable|date',
            'batas_pengumpulan' => 'nullable|date',
        ]);

        $assignment = Assignment::findOrFail($id);
        $assignment->update($request->all());

        return redirect()->route('assignments.index')->with('success', 'Assignment berhasil diperbarui');
    }

    public function destroy($id){
        $assignment = Assignment::findOrFail($id);
        $assignment->delete();
    }

}
