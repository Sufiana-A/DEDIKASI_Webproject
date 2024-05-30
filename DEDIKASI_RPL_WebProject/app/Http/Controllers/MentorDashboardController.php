<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Mentor;
use App\Models\Course;
use App\Models\Peserta;

class MentorDashboardController extends Controller
{
    public function index()
    {
        $mentorId = Auth::guard('mentor')->user()->id;
        $courses = Course::where('mentor_id', $mentorId)->get();

        $pesertaId = [];
        foreach ($courses as $course) {
            $pesertaId = array_merge($pesertaId, $course->Peserta()->wherePivot('status', 'Diterima')->pluck('peserta_id')->toArray());
        }

        $jumlah_peserta = count(array_unique($pesertaId));

        return view('dashboard.mentor_dashboard', compact('courses', 'jumlah_peserta'));
    }    
}