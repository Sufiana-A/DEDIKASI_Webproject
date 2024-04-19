<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;

class StudentDashboardController extends Controller
{
    public function index() {
        $courses = Course::all()->sortByDesc('created_at');
        return view('dashboard.student_dashboard', compact('courses'));
    }

    public function showCourse($id) {
        $course = Course::where('uuid', $id)->firstOrFail();
        return view('dashboard.showCourse', compact('course'));
    }
}