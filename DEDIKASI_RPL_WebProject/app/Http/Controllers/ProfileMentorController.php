<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class ProfileMentorController extends Controller
{
    public function show_profile(){

        return view('Mentor.profileMentor');
    }

    public function edit_profile(){

        return view('Mentor.profileMentorEdit');
    }

    public function submit_profile(Request $request){

        $data_profile_mentor = Mentor::where('nip', Auth::guard('mentor')->user()->nip)->first();

        $request->validate([
            'email' => 'required|email|max:255|unique:Mentor',
            'no_telp' => 'required|numeric',
        ]);

        if ($request->password != '') {

            $request->validate([
                'password' => 'required|min:8',
                'password_confirm' => 'required|min:8|same:password' ,
            ]);

            $data_profile_mentor->password = Hash::make($request->password_confirm);
            
        }

        $data_profile_mentor->email = $request->email;
        $data_profile_mentor->no_telp = $request->no_telp;
        $data_profile_mentor->update();

        return redirect()->route('profil_mentor')->with('success', 'Profil data has been updated successsfully !');


    }

    public function submit_photo(Request $request){

        $data_profil_mentor = Mentor::where('nip', Auth::guard('mentor')->user()->nip)->first();

        if ($request->hasFile('photo')) {
            
            $request->validate([
                'photo' => 'image|mimes:jpg,png,jpeg',
            ]);
            
            $time = time();
            unlink(public_path('profile/'.$data_profil_mentor->photo));
            $ext = $request->file('photo')->extension();
            $photo_name = $data_profil_mentor->email.$time.$ext;
            $request->file('photo')->move(public_path('profile/'), $photo_name);
            $data_profil_mentor->photo = $photo_name;
        }  
        
        $data_profil_mentor->update();

        return redirect()->route('profile_mentor')->with('success', 'Profil data has been updated successfully !');

    }
}
