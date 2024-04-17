<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Peserta;
use Illuminate\Http\Request;

class ProfilePesertaController extends Controller
{
    public function show_profile(){

        return view('peserta.profilePeserta');
    }

    public function edit_profile(){

        return view('Peserta.profilePesertaEdit');
    }

    public function submit_photo(Request $request){

        $data_profil_peserta = peserta::where('nim', Auth::guard('peserta')->user()->nim)->first();
            
        if ($request->hasFile('photo')) {
        
            $request->validate([
                'photo' => 'image|mimes:jpg,png,jpeg',
            ]);
            $time = time();
            unlink(public_path('assets/img/profiles/'.$data_profil_peserta->foto_peserta));
            $ext = $request->file('photo')->extension();
            $photo_name = $data_profil_peserta->email.$time.$ext;
            $request->file('photo')->move(public_path('assets/img/profiles/'), $photo_name);
            $data_profil_peserta->foto_peserta = $photo_name;

        }  
        
        $data_profil_peserta->update();

        return redirect()->route('profile_peserta')->with('success', 'Profil data has been updated successsfully !');
    }

    //angkatan,jurusan, email,nomor telp,pw
    public function submit_profile(Request $request){

        $data_profil_peserta= peserta::where('nim', Auth::guard('peserta')->user()->nim)->first();

        $request->validate([
            'angkatan' => 'required|numeric',
            'jurusan' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:Peserta',
            'no_hp' => 'required|numeric',
        ]);

            
        if ($request->password != '') {
        
            $request->validate([
                'password' => 'required|min:8',
                'password_confirm' => 'required|min:8|same:password',
            ]);

            $data_profil_peserta->password = Hash::make($request->password_confirm);
        }

        $data_profil_peserta->angkatan = $request->angkatan;
        $data_profil_peserta->jurusan = $request->jurusan;
        $data_profil_peserta->email = $request->email;
        $data_profil_peserta->no_hp = $request->no_hp;
        $data_profil_peserta->update();

        return redirect()->route('profil_peserta')->with('success', 'Profil data has been updated successsfully !'); 

    }
}
