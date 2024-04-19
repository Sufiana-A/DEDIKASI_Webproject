<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Course;

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
        return view('admin.addCourse');
    }

    public function editCourse($id) {
        $course = Course::where('uuid', $id)->firstOrFail();
        return view('admin.editCourse', compact('course'));
    }

    public function store(Request $request) {
        $course = new Course();
        $course->title = $request->title;
        $course->description = $request->description;
        $course->class = $request->class;
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
        $course->update();

        return redirect(route('admin.manageCourse.index'));
    }
    public function delete(Request $request) {
        $course = Course::where('uuid', $request->uuid)->firstOrFail();
        $course->delete();
        return redirect(route('admin.manageCourse.index'));
    }
}

