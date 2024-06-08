<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Course;
use App\Models\Timeline;
use App\Models\Peserta;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class StudentDashboardController extends Controller
{
    public function index() {
        $courses = Course::all()->sortByDesc('created_at');
        // Mendapatkan tanggal sekarang
        $now = Carbon::now();

        // Menghitung tanggal satu minggu ke depan
        $oneWeekAhead = $now->copy()->addDays(7);

        // Memfilter data event berdasarkan tanggal yang berada dalam interval satu minggu ke depan
        $upcomingEvents = Timeline::where('deadline', '>=', $now)
                               ->where('deadline', '<=', $oneWeekAhead)
                               ->get();
        $pesertaId = Auth::guard('peserta')->user()->id;
                               // Ambil data pelatihan yang dienroll dengan status "acc" untuk user yang sedang login
        $peserta = Peserta::find($pesertaId);
        $pelatihanAcc = $peserta->course()->wherePivot('favorite', 'yes')->get();

        return view('dashboard.student_dashboard', compact('courses', 'upcomingEvents','pelatihanAcc'));
    }

    public function showCourse($id) {
        $course = Course::where('uuid', $id)->firstOrFail();
        return view('dashboard.showCourse', compact('course'));
    }

    

    // public function showTimeline($id) {
    //     $timeline = Timeline::where('id', $id)->firstOrFail();
    //     return view('dashboard.showTimeline', compact('timeline'));
    // }
}