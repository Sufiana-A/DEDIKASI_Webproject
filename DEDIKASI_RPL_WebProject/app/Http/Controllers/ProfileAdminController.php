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

        if ($request->password != '') {

            $request->validate([
                'password' => 'required|min:8',
                'password_confirm' => 'required|min:8|same:password' ,
            ]);

            $data_profile_admin->password = Hash::make($request->password_confirm);
            
        }

        $data_profile_admin->email = $request->email;
        $data_profile_admin->no_hp = $request->no_hp;
        $data_profile_admin->update();

        return redirect()->route('profil_admin')->with('success', 'Profil data has been updated successsfully !');

    }

    public function submit_photo(Request $request){

        $data_profil_admin = admin::where('nip', Auth::guard('admin')->user()->nip)->first();

        if ($request->hasFile('photo')) {
            
            $request->validate([
                'photo' => 'image|mimes:jpg,png,jpeg',
            ]);
            $time = time();
            unlink(public_path('profile/'.$data_profil_admin->foto_admin));
            $ext = $request->file('photo')->extension();
            $photo_name = $data_profil_admin->email.$time.$ext;
            $request->file('photo')->move(public_path('profile/'), $photo_name);
            $data_profil_admin->foto_admin = $photo_name;
        }  
        
        $data_profil_admin->update();

        return redirect()->route('profile_admin')->with('success', 'Profil data has been updated successfully !');
    }
    
}
