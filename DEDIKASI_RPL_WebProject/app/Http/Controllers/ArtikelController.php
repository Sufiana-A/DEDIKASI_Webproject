<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Artikel;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ArtikelController extends Controller
{
    public function index(){
        $artikel = Artikel::get();

        return view('admin.listArtikel', compact('artikel'));
    } 

    public function create(){
        return view('admin.addArtikel');
    }

    public function store(Request $request){
        $request->validate([
            'id_artikel'     => 'required',
            'judul'     => 'required',
            'penulis' => 'required',
            'waktu' => 'required',
            'konten' => 'required',
        ]);
    
        $artikel = new Artikel();
        $artikel->id_artikel = $request->id_artikel;
        $artikel->judul = $request->judul;
        $artikel->penulis = $request->penulis;
        $artikel->waktu = $request->waktu;
        $artikel->konten = $request->konten;

        $artikel->save();

        return redirect()->route('list_artikel')->with('success', 'Artikel berhasil diunggah');
    }

    public function edit(Request $request, $id){
        $artikel = Artikel::where('id', $request->id)->firstOrFail();
        return view('admin.editArtikel', compact('artikel'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_artikel' => 'nullable|string',
            'judul' => 'nullable|string',
            'penulis' => 'nullable|string',
            'waktu' => 'nullable|date',
            'konten' => 'nullable|string',
        ]);

        $artikel = Artikel::findOrFail($id);
        $artikel->update($request->all());
        return redirect()->route('list_artikel', [$artikel->id])->with('success', 'Artikel berhasil diperbarui');
    }

    public function delete(Request $request) {
        $artikel = Artikel::where('id_artikel', $request->id_artikel)->firstOrFail();
        $artikel->delete();
        return redirect(route('list_artikel'));
    }

    public function indexView(){
        $artikel = Artikel::get();

        return view('peserta.artikel', compact('artikel'));
    }
    
    public function detailView(Request $request, $id){
        $artikel = Artikel::where('id', $request->id)->firstOrFail();
        return view('peserta.detailArtikel', compact('artikel'));
    }

    public function indexMentor(){
        $artikel = Artikel::get();
        return view('mentor.artikel', compact('artikel'));
    }
    
    public function detailMentor(Request $request, $id){
        $artikel = Artikel::where('id', $request->id)->firstOrFail();
        return view('mentor.detailArtikel', compact('artikel'));
    }
}