<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Loker;


class LokerController extends Controller
{
    public function index(){
        $loker = Loker::all();
        return view('loker/admin/loker-list', ['loker' => $loker]);
    }    

        public function create() {
            $loker = Loker::all();
            return view('loker/admin/loker-create', compact('loker'));
        }
    
        public function store(Request $request)
        {
            $request->validate([
                'nama_perusahaan' => 'required',
                'posisi' => 'required',
                'tipe_pekerjaan' => 'required',
                'kota' => 'required',
                'kategori_pekerjaan' => 'required',
                'deskripsi_loker' => 'required',
                'link_loker' => 'required',
                
            ]);
        
    
            $loker = new Loker;
            $loker->nama_perusahaan = $request->nama_perusahaan;
            $loker->posisi = $request->posisi;
            $loker->tipe_pekerjaan = $request->tipe_pekerjaan;
            $loker->kota = $request->kota;
            $loker->kategori_pekerjaan = $request->kategori_pekerjaan;
            $loker->deskripsi_loker = $request->deskripsi_loker;
            $loker->link_loker = $request->link_loker;
    
            $loker->save();
    
            return redirect()->route('loker_admin')->with('success', 'Loker berhasil ditambahkan');
        }

        public function detailLoker(Request $request, $id)
        {
            $loker = Loker::findOrFail($id);
            return view('loker/admin/loker-update', compact('loker'));
        }
        


        public function update(Request $request, $id)
        {
            $request->validate([
                'nama_perusahaan' => 'required',
                'posisi' => 'required',
                'tipe_pekerjaan' => 'required',
                'kota' => 'required',
                'kategori_pekerjaan' => 'required',
                'deskripsi_loker' => 'required',
                'link_loker' => 'required',
            ]);
        
            $loker = Loker::findOrFail($id);
            $loker->nama_perusahaan = $request->nama_perusahaan;
            $loker->posisi = $request->posisi;
            $loker->tipe_pekerjaan = $request->tipe_pekerjaan;
            $loker->kota = $request->kota;
            $loker->kategori_pekerjaan = $request->kategori_pekerjaan;
            $loker->deskripsi_loker = $request->deskripsi_loker;
            $loker->link_loker = $request->link_loker;
        
            $loker->update();
        
            return redirect()->route('loker_admin')->with('success', 'Loker berhasil diperbarui');
        }
        

        
        public function delete(Request $request) {
            $loker = Loker::where('id', $request->id)->firstOrFail();
            $loker->delete();
            return redirect(route('loker_admin'));
        }
        
        public function indexPeserta(){
            $loker = Loker::latest()->get();
            return view('loker/peserta-loker-view', compact('loker')) ;
        }
        

}
