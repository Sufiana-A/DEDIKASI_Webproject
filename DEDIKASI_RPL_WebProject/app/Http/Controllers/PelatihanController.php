<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Pelatihan;

use Brian2694\Toastr\Facades\Toastr;

class PelatihanController extends Controller
{
    public function pelatihanList()
    {
        $pelatihanList = Pelatihan::all();
        return view('pelatihans.list_pelatihan',compact('pelatihanList'));
    }

    public function pelatihanAdd()
    {
        return view('pelatihans.create_pelatihan');
    }

    public function savePelatihan(Request $request)
=======
    /** save record */
    public function saveRecord(Request $request)

    {
        $request->validate([
            'nama_pelatihan' => 'required|string',
            'kategori'        => 'required|string',
        ]);
        
        DB::beginTransaction();
        try {
                $saveRecord = new Pelatihan;
                $saveRecord->nama_pelatihan   = $request->nama_pelatihan;
                $saveRecord->kategori          = $request->kategori;
                $saveRecord->save();

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

    public function pelatihanEdit($id_pelatihan)
    {
        $pelatihanEdit = Pelatihan::where('id_pelatihan',$id_pelatihan)->first();
        return view('pelatihans.update_pelatihan',compact('pelatihanEdit'));
    }


    public function updatePelatihan(Request $request)
=======
    /** update record */
    public function updateRecord(Request $request)
      
    {
        DB::beginTransaction();
        try {
            
            $updateRecord = [
                'nama_pelatihan' => $request->nama_pelatihan,
                'kategori'        => $request->kategori,
            ];

            Pelatihan::where('id_pelatihan',$request->id_pelatihan)->update($updateRecord);
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

    public function deletePelatihan(Request $request)
=======
    /** delete record */
    public function deleteRecord(Request $request)

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