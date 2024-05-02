<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peserta;
use App\Models\Course;

class AdminDashboardController extends Controller
{
    public function index(){
        $data_peserta = peserta::all();
        $courses = Course::with('peserta')->get();
        return view('dashboard.admin_dashboard', compact('data_peserta','courses'));
    }
}
