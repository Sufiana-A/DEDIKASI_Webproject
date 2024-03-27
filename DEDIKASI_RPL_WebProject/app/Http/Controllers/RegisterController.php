<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peserta;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function register(Request $request)
    {
        // Validasi data yang diterima dari form pendaftaran
        $request->validate([
            'first_name'    => 'required|string',
            'last_name'     => 'required|string',
            'tanggal_lahir' => 'required|string',
            'nim'           => 'required|string',
            'jurusan'       => 'required|string',
            'angkatan'      => 'required|string',
            'no_hp'         => 'required|string', 
            'email'         => 'required|email|unique:peserta',
            'password'      => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required',
        ]);

        $peserta = new Peserta();

        $peserta->first_name = $request->first_name;
        $peserta->last_name = $request->last_name;
        $peserta->tanggal_lahir = $request->tanggal_lahir;
        $peserta->nim = $request->nim;
        $peserta->jurusan = $request->jurusan;
        $peserta->angkatan = $request->angkatan;
        $peserta->no_hp = $request->no_hp;
        $peserta->email = $request->email;
        $peserta->password = Hash::make($request->password);
        $peserta->save();

    
        // Redirect ke halaman login setelah pendaftaran berhasil
        return redirect()->route('login');
    }
}


