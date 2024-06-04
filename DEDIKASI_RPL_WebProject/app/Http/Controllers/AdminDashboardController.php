<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Peserta;
use App\Models\Course;

class AdminDashboardController extends Controller
{
    public function index(){
        $data_peserta = peserta::all();
        // $pesertas = peserta::with('courses')->get();
        $courses = DB::table('courses')
                    ->join('peserta_course', 'courses.id', '=', 'peserta_course.course_id')
                    ->join('peserta', 'peserta_course.peserta_id', '=', 'peserta.id')
                    ->select('courses.id', 'courses.title', DB::raw('count(peserta.id) as total_accepted'))
                    ->where('peserta_course.status', 'Diterima')
                    ->groupBy('courses.id', 'courses.title')
                    ->get();

        return view('dashboard.admin_dashboard', compact('data_peserta', 'courses'));
        // return view('dashboard.admin_dashboard', compact('data_peserta','pesertas'));
    }
}
