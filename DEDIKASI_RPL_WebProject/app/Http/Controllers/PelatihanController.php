<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
<<<<<<< HEAD
=======
    
    /** save record */
    // public function saveRecord(Request $request)

>>>>>>> 0f9bf6b81477026d5883be29c59e6f51fca2c8c8
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

               
                DB::commit();
            return redirect()->back();
           
        } catch(\Exception $e) {
            
            DB::rollback();
            
            return redirect()->back();
        }
    }

    public function pelatihanEdit($id_pelatihan)
    {
        $pelatihanEdit = Pelatihan::where('id_pelatihan',$id_pelatihan)->first();
        return view('pelatihans.update_pelatihan',compact('pelatihanEdit'));
    }


    public function updatePelatihan(Request $request)
<<<<<<< HEAD
=======

    /** update record */
    // public function updateRecord(Request $request)
      
>>>>>>> 0f9bf6b81477026d5883be29c59e6f51fca2c8c8
    {
        DB::beginTransaction();
        try {
            
            $updateRecord = [
                'nama_pelatihan' => $request->nama_pelatihan,
                'kategori'        => $request->kategori,
            ];

            Pelatihan::where('id_pelatihan',$request->id_pelatihan)->update($updateRecord);
            
            DB::commit();
            return redirect()->back();
           
        } catch(\Exception $e) {
            
            DB::rollback();
            
            return redirect()->back();
        }
    }

    public function deletePelatihan(Request $request)
<<<<<<< HEAD
=======

    /** delete record */
    // public function deleteRecord(Request $request)

>>>>>>> 0f9bf6b81477026d5883be29c59e6f51fca2c8c8
    {
        DB::beginTransaction();
        try {

            Pelatihan::where('id_pelatihan',$request->id_pelatihan)->delete();
            DB::commit();
      
            return redirect()->back();
        } catch(\Exception $e) {
            DB::rollback();
         
            return redirect()->back();
        }
    }

}