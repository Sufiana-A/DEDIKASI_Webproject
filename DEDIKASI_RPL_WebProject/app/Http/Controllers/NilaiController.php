<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Grades;
use App\Models\peserta;
use App\Models\Assignment;
use Illuminate\Support\Facades\DB;

class NilaiController extends Controller

{
    public function index()
    {
        // fix: get all assignments using query
        $assignments = DB::table('assignment_peserta')->get(); 
    // public function index(Request $request) {
    //     $query = Grades::query();

    //     // Check if uuid input is provided
    //     if ($request->has('uuid')) {
    //         $query->where('uuid', 'like', '%' . $request->uuid . '%');
    //     }

    //     // Check if title input is provided
    //     if ($request->has('title')) {
    //         $query->where('title', 'like', '%' . $request->title . '%');
    //     }

    //     // Check if class input is provided
    //     if ($request->has('class')) {
    //         $query->where('class', 'like', '%' . $request->class . '%');
    //     }

    //     // Get the results
    //     $assignment = $query->get();


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

    // public function store(Request $request) {
    //     $grade = new Grades();
    //     $grade->title = $request->title;
    //     $grade->description = $request->description;
    //     $grade->class = $request->class;
    //     $grade->save();

    //     $formattedId = sprintf("%03d", $grade->id);
    //     $grade->uuid = "CN$formattedId";
    //     $grade->update();

    //     return redirect(route('mentor.nilai.manageNilai.index'));
    // }
    // public function update(Request $request) {
    //     $grade = Grades::where('uuid', $request->uuid)->firstOrFail();
    //     $grade->title = $request->title;
    //     $grade->description = $request->description;
    //     $grade->class = $request->class;
    //     $grade->update();

    //     return redirect(route('mentor.niai.manageNilai.index'));
    // }


       //Update Nilai form
       Public function edit($id)
       {
        // $assignment = Assignment::findOrFail($assignment_id);
        // $peserta = Peserta::findOrFail($peserta_id);
        // $pivotData = $peserta->assignments()->wherePivot('assignment_id', $assignment_id)->first()->pivot;
        $pivotData = DB::table('assignment_peserta') 
            ->where('id', $id)
            ->first();
        $assignment = Assignment::findOrFail($pivotData->assignment_id); // fix: get assignment by pivot data

        return view('mentor.nilai.editNilai', compact('assignment', 'pivotData'));
    }
   
       //store data updat nilai
       public function update (Request $request, $id)
       {
       $request->validate([
           'nilai' => 'required|in:Belum Lulus,Lulus',
           'deskripsi' => 'nullable|string',
       ]);
   
    //    $peserta = Peserta::findOrFail($peserta_id);
   
       // Update nilai dan deskripsi pada tabel pivot
       DB::table('assignment_peserta') // fix: update pivot data using query builder
            ->where('id', $id)
            ->update([
                'nilai' => $request->nilai,
                'deskripsi' => $request->deskripsi,
            ]);
   
            return redirect()->route('mentor.manageNilai.index')->with('success', 'Assignment updated successfully');
        }
   }











