<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProfilePesertaController;

class LoginController extends Controller
{
    public function index(){
        return view('login');
    }

    public function loginvalid(Request $request){
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', '']
        ]);
        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];
        if (Auth::guard('peserta')->attempt($credentials)){
            $request->session()->regenerate();
            return redirect()->intended('profil-peserta');
        };
        if (Auth::guard('admin')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('profil-admin');
        };
        if (Auth::guard('mentor')->attempt($credentials)){
            $request->session()->regenerate();
            return redirect()->intended('profil-mentor');
        };
        return redirect()->back()->with('sukses', 'Proses login berhasil.');
    }


}
