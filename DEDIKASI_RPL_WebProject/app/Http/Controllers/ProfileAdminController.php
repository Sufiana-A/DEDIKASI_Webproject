<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\admin;
use Illuminate\Http\Request;

class ProfileAdminController extends Controller
{
    public function show_profile(){

        return view('Admin.profileAdmin');
    }

    public function edit_profile(){

        return view('Admin.profileAdminEdit');
    }

    public function submit_profile(Request $request){

        $data_profile_admin = admin::where('nip', Auth::guard('admin')->user()->nip)->first();
        $request->validate([
            'email' => 'required|email|max:255|unique:admin',
            'no_hp' => 'required|numeric',
        ]);

        $no_hp = $request->no_hp;

        // Cek apakah nomor telepon sudah memiliki angka 0 di depannya
        if (substr($no_hp, 0, 1) !== '0') {
            // Jika tidak, tambahkan angka 0 di depannya
            $no_hp = '0' . $no_hp;
        }

        if ($request->password != '') {
            $request->validate([
                'password' => 'required',
                'password_confirm' => 'required|same:password' ,
            ]);
            
            $data_profile_admin->password = Hash::make($request->password_confirm);
            
        }

        $data_profile_admin->email = $request->email;
        $data_profile_admin->no_hp = $no_hp;
        $data_profile_admin->update();

        return redirect()->route('profile_admin')->with('success', 'Profil data has been updated successsfully !');
    }

    public function submit_photo(Request $request){

        $data_profil_admin = admin::where('nip', Auth::guard('admin')->user()->nip)->first();

        if ($request->hasFile('photo')) {
            
            $request->validate([
                'photo' => 'image|mimes:jpg,png,jpeg',
            ]);

            if ($data_profil_admin->foto_admin != 'default_image.jpg') {
                
                unlink(public_path('assets/img/profiles/'.$data_profil_admin->foto_admin));
            }

            $time = time();
            $ext = $request->file('photo')->extension();
            $photo_name = $data_profil_admin->email.$time.'.'.$ext;
            $request->file('photo')->move(public_path('assets/img/profiles/'), $photo_name);
            $data_profil_admin->foto_admin = $photo_name;
        }  
        
        $data_profil_admin->update();

        return redirect()->route('profile_admin')->with('success', 'Profil data has been updated successfully !');
    }
    
}