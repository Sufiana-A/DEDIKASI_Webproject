<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peserta;

class AdminDashboardController extends Controller
{
    public function index(){
        $data_peserta = peserta::all();

        return view('dashboard.admin_dashboard', compact('data_peserta'));
    }
}
