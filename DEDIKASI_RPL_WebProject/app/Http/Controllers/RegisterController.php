<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\peserta;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function register(Request $request)
    {
        // Validasi data yang diterima dari form pendaftaran
        $request->validate([
            'first_name'    => 'required|string|max:255',
            'last_name'     => 'required|string|max:255',
            'tanggal_lahir' => 'required|string|max:255',
            'nim'           => 'required|string|max:255',
            'jurusan'       => 'required|string|max:255',
            'angkatan'      => 'required|string|size:4',
            'no_hp'         => 'required|string|numeric', 
            'email'         => 'required|email|unique:users',
            'password'      => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required',
        ]);

        // Buat entri baru dalam tabel Peserta
        peserta::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'tanggal_lahir' => $request->tanggal_lahir,
            'nim' => $request->nim,
            'jurusan' => $request->jurusan,
            'angkatan' => $request->angkatan,
            'no_hp' => $request->no_hp,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        

        // Redirect ke halaman login setelah pendaftaran berhasil
        return redirect()->route('login')->with('success', 'Registrasi berhasil! Silakan login.');
    }
}
