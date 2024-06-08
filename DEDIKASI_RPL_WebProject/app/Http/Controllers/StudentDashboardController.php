<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Course;
use App\Models\Timeline;
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

        return view('dashboard.student_dashboard', compact('courses', 'upcomingEvents'));
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