<?php

namespace App\Http\Controllers;
use App\Models\Artikel;
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
}
