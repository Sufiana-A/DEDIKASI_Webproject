<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Mentor;
use App\Models\Course;
use App\Models\Peserta;

class MentorDashboardController extends Controller
{
    public function index()
    {
        $mentorId = Auth::guard('mentor')->user()->id;
        
        // PKD-51
        $jumlah_peserta = DB::table('courses')
                        ->join('peserta_course', 'courses.id', '=', 'peserta_course.course_id')
                        ->join('peserta', 'peserta_course.peserta_id', '=', 'peserta.id')
                        ->select('courses.mentor_id', DB::raw('count(distinct peserta.id) as jumlah_diterima'))
                        ->where('peserta_course.status', 'Diterima')
                        ->where('courses.mentor_id', $mentorId)
                        ->groupBy('courses.mentor_id')
                        ->get();
    
        // PKD-52
        $courses = DB::table('courses')
                    ->join('peserta_course', 'courses.id', '=', 'peserta_course.course_id')
                    ->join('peserta', 'peserta_course.peserta_id', '=', 'peserta.id')
                    ->select('courses.id', 'courses.title', 'courses.class', 'courses.description', 'courses.mentor_id', DB::raw('count(distinct peserta.id) as jumlah_diterima'))
                    ->where('peserta_course.status', 'Diterima')
                    ->where('courses.mentor_id', $mentorId)
                    ->groupBy('courses.id', 'courses.title', 'courses.class', 'courses.description', 'courses.mentor_id')
                    ->get();
    
        return view('dashboard.mentor_dashboard', compact('jumlah_peserta', 'courses'));
    }    
}