<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Assignment;
use App\Models\Course;
use App\Models\Peserta;
// use App\Http\Controllers\Auth;
use Illuminate\Support\Facades\Auth;

class AssignmentController extends Controller
{
    public function index(){
        $assignments = Assignment::with('course')->get();
        return view('assignment.mentor.assignment-list', compact('assignments'));
    } 

    public function create(){
        $courses = Course::all();
        return view('assignment.mentor.assignment-create', compact('courses'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'pelatihan' => 'required|exists:courses,uuid',
            'id_tugas'     => 'required',
            'title'     => 'required',
            'description' => 'required',
            'addition' => 'mimes:pdf,doc,jpg,jpeg,png|max:2048', 
        ]);

        $assignments = new Assignment();
        $assignments->id_tugas = $request->id_tugas;
        $assignments->pelatihan = $request->pelatihan;
        $assignments->title = $request->title;
        $assignments->description = $request->description;
        

        if ($request->hasFile('addition')) {
            $tugas = $request->file('addition');
            $tugasname = time() . '-' . $tugas->getClientOriginalName();
            $tugas->storeAs('public/assignment', $tugasname);
            $assignments->addition = $tugasname;
        }
        
        $assignments->save();

        return redirect()->route('assignment_mentor')->with('success', 'Assignment berhasil ditambahkan');            
    }
    
    public function edit(Request $request, $id){
        $assignments = Assignment::where('id', $request->id)->firstOrFail();
        $courses = Course::all();
        return view('assignment.mentor.assignment-update', compact('assignments', 'courses'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'pelatihan' => 'required|exists:courses,uuid',
            'id_tugas' => 'nullable|string',
            'title' => 'nullable|string',
            'description' => 'nullable|string',
            'addition' => 'nullable|mimes:pdf,doc,jpg,jpeg,png|max:2048', 
        ]);

        $courses = Course::all();
        $courses->id_course = $request->id_course;

        $assignments = Assignment::findOrFail($id);
        $assignments->id_tugas = $request->id_tugas;
        $assignments->title = $request->title;
        $assignments->pelatihan = $request->pelatihan;
        $assignments->description = $request->description;

        if ($request->hasFile('addition')) {
            
            $tugaslama = public_path('storage/assignment/'.$assignments->addition);
            if (file_exists($tugaslama) && is_file($tugaslama)) {
                unlink($tugaslama);
            }
            
            $tugas = $request->file('addition');
            $tugasname = time() . '-' . $tugas->getClientOriginalName();
            $tugas->storeAs('public/assignment', $tugasname);
            $assignments->addition = $tugasname;
        }

        $assignments->update($request->all());

        return redirect()->route('assignment_mentor', [$assignments->id])->with('success', 'Assignment berhasil diperbarui');
    }

    public function delete(Request $request) {
        $assignment = Assignment::where('id_tugas', $request->id_tugas)->firstOrFail();
        $assignment->delete();
        return redirect(route('assignment_mentor'));
    }


    public function indexPeserta(Request $request, $uuid)
{
    $course = Course::where('uuid', $uuid)->firstOrFail();
    $assignments = Assignment::where('pelatihan', $course->uuid)->get();
    $pesertaId = Auth::guard('peserta')->user()->id;

    foreach ($assignments as $assignment) {
        $assignment->submitted = $assignment->peserta()->where('peserta_id', $pesertaId)->exists();
    }

    return view('assignment.peserta-list-assignment', compact('assignments'));
}


    

        // public function indexPeserta(Request $request, $uuid)
        // {
        //     $course = Course::where('uuid', $uuid)->firstOrFail();
        //     $assignment = Assignment::where('pelatihan', $course->uuid)->get();
        
        //     return view('assignment.peserta-list-assignment', compact('assignment'));
        // }

        // public function success(Request $request, $uuid)
        // {
        //     $course = Course::where('uuid', $uuid)->firstOrFail();
        //     $assignment = Assignment::where('pelatihan', $course->uuid)->get();
        
        //     return view('assignment.submit-berhasil', compact('assignment'));
        // }

        public function createPeserta($peserta_id, $id_tugas, $assignment_id)
        {
            $peserta = Peserta::where('id', $peserta_id)->first();
            $assignment = Assignment::where('id', $assignment_id)->first();
            var_dump($id_tugas);
            var_dump($assignment_id);
            return view('assignment.add-assignment', compact('peserta', 'assignment'));
        }

        public function submit(Request $request, $peserta_id, $id_tugas, $assignment_id)
        {
            $assignment = Assignment::where('id', $assignment_id)->first();

            $request->validate([
                'text_submission' => 'nullable|string',
                'file_submission' => 'nullable|mimes:pdf,doc,docx,jpg,jpeg,png|max:2048'
            ]);

            $peserta = Peserta::findOrFail($peserta_id);
            $filename = null;
            if ($request->hasFile('file_submission')) {
                $filename = $request->file('file_submission')->store('submissions', 'public');
            }

            $peserta->assignment()->attach($assignment_id, [
                'id_tugas' => $request->id_tugas,
                'file_assignments' => $filename,
                'deskripsi' => $request->text_submission,
                'nilai' => 'Belum Lulus', 
                'text_assignments' => $request->input('text_submission') 
            ]);

            return redirect()->back()->with('success', 'Assignment submitted successfully!');
        }

        // Update an existing assignment submission
        public function updatePeserta(Request $request, $peserta_id, $assignment_id)
        {
            $request->validate([
                'text_submission' => 'nullable|string',
                'file_submission' => 'nullable|mimes:pdf,doc,docx,jpg,jpeg,png|max:2048'
            ]);

            $peserta = Peserta::findOrFail($peserta_id);
            $pivot = $peserta->assignments()->where('assignment_id', $assignment_id)->first();

            if ($request->hasFile('file_submission')) {
                if ($pivot->pivot->file_assignments) {
                    Storage::delete($pivot->pivot->file_assignments);
                }
                $filename = $request->file('file_submission')->store('submissions', 'public');
                $pivot->pivot->file_assignments = $filename;
            }

            $pivot->pivot->text_assignments = $request->input('text_submission');
            $pivot->pivot->deskripsi = $request->input('text_submission');
            $pivot->pivot->save();

            return redirect()->route('peserta.assignments.index', $peserta_id)->with('success', 'Assignment updated successfully!');
        }

        public function deletePeserta($peserta_id, $assignment_id){
        $peserta = Peserta::findOrFail($peserta_id);
        $pivot = $peserta->assignments()->where('assignment_id', $assignment_id)->first();

        if ($pivot) {
            if ($pivot->pivot->file_assignments) {
                Storage::disk('public')->delete($pivot->pivot->file_assignments);
            }

            $peserta->assignments()->detach($assignment_id);

            return redirect()->route('peserta.assignments.index', $peserta_id)->with('success', 'Assignment deleted successfully!');
        } else {
            return redirect()->route('peserta.assignments.index', $peserta_id)->with('error', 'Assignment not found!');
        }
}
        // public function editSubmit(){
        //     $assignments = Assignment::with('peserta')->get();
        //     return view('assignment.submit-edit', compact('assignments'));
        // } 
        public function editSubmit()
    {
        $assignments = Assignment::with('peserta')->get();
        // Debugging to check data
        // dd($assignments);  
        return view('assignment.submit-edit', compact('assignments'));
    }

    // public function delete(Request $request)
    // {
    //     $id_tugas = $request->input('id_tugas');
    //     // Assuming a pivot table named 'assignment_peserta'
    //     \DB::table('assignment_peserta')->where('id_tugas', $id_tugas)->delete();

    //     return redirect()->route('assignments.list')->with('success', 'Assignment deleted successfully');
    // }

}