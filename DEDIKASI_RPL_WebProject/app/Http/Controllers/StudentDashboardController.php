<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Timeline;
use Illuminate\Http\Request;

class StudentDashboardController extends Controller
{
    public function index() {
        $courses = Course::all()->sortByDesc('created_at');
        $timeline = Timeline::all();

        return view('dashboard.student_dashboard', compact('courses', 'timeline'));
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