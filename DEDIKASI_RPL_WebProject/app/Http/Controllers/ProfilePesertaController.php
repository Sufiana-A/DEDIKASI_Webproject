<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfilePesertaController extends Controller
{
    public function show_profile(){

        return view('peserta.profilePeserta');
    }
}
