<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peserta;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function register(Request $request)
    {
        // Validasi data dari form pendaftaran
        $request->validate([
            'first_name'    => 'required|string',
            'last_name'     => 'required|string',
            'tanggal_lahir' => 'required|string',
            'nim'           => 'required|numeric',
            'jurusan'       => 'required|string',
            'angkatan'      => 'required|numeric',
            'no_hp'         => 'required|numeric', 
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
        $peserta->foto_peserta = 'default_image.jpg';
        $peserta->save();

        return redirect()->route('login');
    }
}


