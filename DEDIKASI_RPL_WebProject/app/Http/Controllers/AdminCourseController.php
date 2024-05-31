<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Course;
use App\Models\Mentor;

class AdminCourseController extends Controller
{
    public function index(Request $request) {
        $query = Course::query();

        // Check if uuid input is provided
        if ($request->has('uuid')) {
            $query->where('uuid', 'like', '%' . $request->uuid . '%');
        }

        // Check if title input is provided
        if ($request->has('title')) {
            $query->where('title', 'like', '%' . $request->title . '%');
        }

        // Check if class input is provided
        if ($request->has('class')) {
            $query->where('class', 'like', '%' . $request->class . '%');
        }

        // Get the results
        $courses = $query->get();


        return view('admin.managePelatihan', compact('courses'));
    }

    public function addCourse() {
        $mentorId = Auth::guard('mentor')->user()->id;
        $mentor = mentor::find($mentorId);
        $idMentor = $mentor->get();
        return view('admin.addCourse', compact('idMentor'));
    }

    public function editCourse($id) {
        $course = Course::where('uuid', $id)->firstOrFail();
        $mentorId = Auth::guard('mentor')->user()->id;
        $mentor = mentor::find($mentorId);
        $idMentor = $mentor->get();
        return view('admin.editCourse', compact('course', 'idMentor'));
    }

    public function store(Request $request) {
        $course = new Course();
        $course->title = $request->title;
        $course->description = $request->description;
        $course->class = $request->class;
        $course->mentor_id = Auth::guard('mentor')->user()->id;
        $course->save();

        $formattedId = sprintf("%03d", $course->id);
        $course->uuid = "CN$formattedId";
        $course->update();

        return redirect(route('admin.manageCourse.index'));
    }
    public function update(Request $request) {
        $course = Course::where('uuid', $request->uuid)->firstOrFail();
        $course->title = $request->title;
        $course->description = $request->description;
        $course->class = $request->class;
        $course->mentor_id = $request->id_mentor;
        $course->update();

        return redirect(route('admin.manageCourse.index'));
    }
    public function delete(Request $request) {
        $course = Course::where('uuid', $request->uuid)->firstOrFail();
        $course->delete();
        return redirect(route('admin.manageCourse.index'));
    }
}

