<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Grades;

class NilaiController extends Controller
{
    public function index(Request $request) {
        $query = Grades::query();

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
        $grades = $query->get();


        return view('mentor.nilai.manageNilai', compact('grades'));
    }

    public function addCourse() {
        return view('mentor.addNilai');
    }

    public function editCourse($id) {
        $grade = Grades::where('uuid', $id)->firstOrFail();
        return view('mentor.nilai.editNilai', compact('grade'));
    }

    public function store(Request $request) {
        $grade = new Grades();
        $grade->title = $request->title;
        $grade->description = $request->description;
        $grade->class = $request->class;
        $grade->save();

        $formattedId = sprintf("%03d", $grade->id);
        $grade->uuid = "CN$formattedId";
        $grade->update();

        return redirect(route('mentor.nilai.manageNilai.index'));
    }
    public function update(Request $request) {
        $grade = Grades::where('uuid', $request->uuid)->firstOrFail();
        $grade->title = $request->title;
        $grade->description = $request->description;
        $grade->class = $request->class;
        $grade->update();

        return redirect(route('mentor.niai.manageNilai.index'));
    }
    public function delete(Request $request) {
        $grade = Grades::where('uuid', $request->uuid)->firstOrFail();
        $grade->delete();
        return redirect(route('mentor.nilai.manageNilai.index'));
    }
}

