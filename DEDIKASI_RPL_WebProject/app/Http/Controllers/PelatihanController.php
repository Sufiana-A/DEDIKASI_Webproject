<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Pelatihan;

use Brian2694\Toastr\Facades\Toastr;

class PelatihanController extends Controller
{
    /** index page */
    public function pelatihanList()
    {
        $pelatihanList = Pelatihan::all();
        return view('pelatihan.list_pelatihan',compact('pelatihanList'));
    }

    /** Pelatihan add */
    public function pelatihanAdd()
    {
        return view('pelatihan.create_pelatihan');
    }

    /** save Pelatihan */
    public function savePelatihan(Request $request)
    {
        $request->validate([
            'nama_pelatihan' => 'required|string',
            'kategori_pelatihan'    => 'required|string',
        ]);
        
        DB::beginTransaction();
        try {
                $savePelatihan = new Pelatihan;
                $savePelatihan->nama_pelatihan  = $request->nama_pelatihan;
                $savePelatihan->kategori_pelatihan  = $request->kategori_pelatihan;
                $savePelatihan->save();

                Toastr::success('Pelatihan Berhasil Ditambahkan','Sukses');
                DB::commit();
            return redirect()->back();
           
        } catch(\Exception $e) {
            \Log::info($e);
            DB::rollback();
            Toastr::error('Pelatihan Gagal Ditambahkan','Error');
            return redirect()->back();
        }
    }

    /** Pelatihan edit view */
    public function pelatihanEdit($id_pelatihan)
    {
        $pelatihanEdit = Pelatihan::where('id_pelatihan',$id_pelatihan)->first();
        return view('pelatihan.update_pelatihan',compact('pelatihanEdit'));
    }

    /** update Pelatihan */
    public function updatePelatihan(Request $request)
    {
        DB::beginTransaction();
        try {
            
            $updatePelatihan = [
                'nama_pelatihan'    => $request->nama_pelatihan,
                'kategori_pelatihan'    => $request->kategori_pelatihan,
            ];

            Pelatihan::where('id_pelatihan',$request->id_pelatihan)->update($updatePelatihan);
            Toastr::success('Pelatihan Berhasil Diubah','Sukses');
            DB::commit();
            return redirect()->back();
           
        } catch(\Exception $e) {
            \Log::info($e);
            DB::rollback();
            Toastr::error('Pelatihan Gagal Diubah','Error');
            return redirect()->back();
        }
    }

    /** delete Pelatihan */
    public function deletePelatihan(Request $request)
    {
        DB::beginTransaction();
        try {
            Pelatihan::where('id_pelatihan',$request->id_pelatihan)->delete();
            DB::commit();
            Toastr::success('Pelatihan Berhasil Dihapus','Sukses');
            return redirect()->back();
        } catch(\Exception $e) {
            DB::rollback();
            Toastr::error('Pelatihan Gagal Dihapus','Error');
            return redirect()->back();
        }
    }

}
