<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Grades;
use App\Models\peserta;
use App\Models\Assignment;

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
        $assignment = $query->get();


        return view('mentor.nilai.manageNilai', compact('assignments'));
    }

    public function addNilai() {
        $data_peserta = peserta::all();
        $assignment = Assignment::with('peserta')->get();
       
    
        return view('mentor.nilai.addNilai',compact('data_peserta','assignment'));
    }

    public function editCourse($id) {
        $assignment = Grades::where('uuid', $id)->firstOrFail();
        return view('mentor.nilai.editNilai', compact('assignment'));
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
    // public function update(Request $request) {
    //     $grade = Grades::where('uuid', $request->uuid)->firstOrFail();
    //     $grade->title = $request->title;
    //     $grade->description = $request->description;
    //     $grade->class = $request->class;
    //     $grade->update();

    //     return redirect(route('mentor.niai.manageNilai.index'));
    // }


       //Update Nilai
       Public function edit($peserta_id, $assignment_id)
       {
       $assignment = Assignment::findOrFail($assignment_id);
       $peserta = Peserta::findOrFail($peserta_id);
       $pivotData = $peserta->assignments()->wherePivot('assignment_id', $assignment_id)->first()->pivot;
       
       return view('assignments.edit', compact('assignment', 'pivotData'));
       }
   
   
       //store data
       public function update (Request $request, $peserta_id, $assignment_id)
       {
       $request->validate([
           'nilai' => 'required|in:Belum Lulus,Lulus',
           'deskripsi' => 'nullable|string',
       ]);
   
       $peserta = Peserta::findOrFail($peserta_id);
   
       // Update nilai dan deskripsi pada tabel pivot
       $peserta->assignments()->updateExistingPivot($assignment_id, [
           'nilai' => $request->nilai,
           'deskripsi' => $request->deskripsi,
       ]);
   
       return redirect()->route('assignments.index')->with('success', 'Assignment updated successfully');
   }
    public function delete(Request $request) {
        $assignment = Grades::where('uuid', $request->uuid)->firstOrFail();
        $assignment->delete();
        return redirect(route('mentor.manageNilai.index'));
    }









}

