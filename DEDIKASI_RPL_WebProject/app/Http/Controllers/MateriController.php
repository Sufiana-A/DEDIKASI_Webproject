<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Materi;
use App\Models\Course;

class MateriController extends Controller
{
    

    public function index(){
        $materi = Materi::with('course')->get();
        return view('materi/mentor/materi-list', ['materi' => $materi]);
    }
    
        

        public function create() {
            $courses = Course::all();
            return view('materi/mentor/materi-create', compact('courses'));
        }
    
        public function store(Request $request)
        {
            $request->validate([
                'pelatihan' => 'required|exists:courses,uuid', 
                'id_materi' => 'required',
                'judul_materi' => 'required',
                'deskripsi_materi' => 'required',
                'link_terkait' => 'required|mimes:pdf,doc,jpg,jpeg,png|max:4096',
                
            ]);
        
    
            $materi = new Materi;
            $materi->pelatihan = $request->pelatihan;
            $materi->id_materi = $request->id_materi;
            $materi->judul_materi = $request->judul_materi;
            $materi->deskripsi_materi = $request->deskripsi_materi;
    
            if ($request->hasFile('link_terkait')) {
                $file_materi = $request->file('link_terkait');
                $materiname = time() . '_' . $file_materi->getClientOriginalName();
                $file_materi->storeAs('public/materi', $materiname);
                $materi->link_terkait = $materiname;
            }
    
            $materi->save();
    
            return redirect()->route('materi_mentor')->with('success', 'Materi berhasil ditambahkan');
        }

    public function detailMateri(Request $request, $id)
        {
        $materi = Materi::where('id', $request->id)->firstOrFail();
        $courses = Course::all();
        return view('materi.mentor.materi-update', compact('materi', 'courses'));
        }


    public function update(Request $request, $id)
    {
        $request->validate([
            'pelatihan' => 'required|exists:courses,uuid', 
            'id_materi' => 'required',
            'judul_materi' => 'required',
            'deskripsi_materi' => 'required',
            'link_terkait' => 'sometimes|mimes:pdf,doc,jpg,jpeg,png|max:4096',
        ]);

    $materi = Materi::findOrFail($id);
    $materi->id_materi = $request->id_materi;
    $materi->judul_materi = $request->judul_materi;
    $materi->pelatihan = $request->pelatihan;
    $materi->deskripsi_materi = $request->deskripsi_materi;

    // save file baru
    if ($request->hasFile('link_terkait')) {
        $file = $request->file('link_terkait');
        $filename = time(). '_'. $file->getClientOriginalName();
        $file->storeAs('public/materi', $filename);
        $materi->link_terkait = $filename;
    }

    // Update materi lainnya
    $materi->update($request->except('link_terkait'));

    return redirect()->route('materi_mentor', $materi->id)->with('success', 'Materi berhasil diperbarui');
    }

        
        public function delete(Request $request) {
            $materi = Materi::where('id', $request->id)->firstOrFail();
            $materi->delete();
            return redirect(route('materi_mentor'));
        }
       
        public function indexPeserta(Request $request, $uuid)
        {
            // Cari course by UUID 
            $course = Course::where('uuid', $uuid)->firstOrFail();
        
            // Ambil materi terkait course
            $materi = Materi::where('pelatihan', $course->uuid)->get();
        
            return view('materi.peserta-materi-view', compact('materi'));
        }
        

    }
    