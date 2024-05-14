<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Assignment;

class AssignmentController extends Controller
{
    public function index(){
        $assignments = Assignment::get();

        return view('assignment.mentor.assignment-list', compact('assignments'));
    } 

    public function create(){
        return view('assignment.mentor.assignment-create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_tugas'     => 'required',
            'title'     => 'required',
            'description' => 'required',
            'addition' => 'mimes:pdf,doc,jpg,jpeg,png|max:2048', 
        ]);

        $assignments = new Assignment();
        $assignments->id_tugas = $request->id_tugas;
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
        return view('assignment.mentor.assignment-update', compact('assignments'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_tugas' => 'nullable|string',
            'title' => 'nullable|string',
            'description' => 'nullable|string',
            'addition' => 'nullable|mimes:pdf,doc,jpg,jpeg,png|max:2048', 
        ]);

        $assignments = Assignment::findOrFail($id);

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



    ///PESERTA
    public function indexPeserta(){
        $assignments = Assignment::get();

        return view('assignment.peserta-list-assignment', compact('assignments'));
    } 

    public function createPeserta(){
        return view('assignment.peserta-add-assignment');
    }

    public function submit(Request $request)
    {
        $request->validate([
            'text_submission' => 'nullable|string',
            'file_submission' => 'nullable|mimes:pdf,doc,jpg,jpeg,png'
        ]);
    
        $assignment_id = $this->getDefaultAssignmentId(); 
    
        $submission = new Submission;
        $submission->assignment_id = $assignment_id;
        $submission->text_submission = $request->text_submission;
        
        if ($request->hasFile('file_submission')) {
            $filename = $request->file('file_submission')->store('submission', 'public');
            $submission->file_submission = $filename;
        }
    
        $submission->save();
    
        return redirect()->back()->with('success', 'Tugas berhasil dikumpulkan!');
    }

    public function updatePeserta(Request $request)
{
    $request->validate([
        'text_submission' => 'nullable|string',
        'file_submission' => 'nullable|mimes:pdf,doc,jpg,jpeg,png'
    ]);

    $assignment_id = $this->getDefaultAssignmentId();

    $submission = Submission::updateOrCreate(
        [
            'assignment_id' => $assignment_id,
            'user_id' => auth()->id() 
        ],
        [
            'text_submission' => $request->text_submission,
        ]
    );

    if ($request->hasFile('file_submission')) {
        // Hapus file lama jika ada
        if ($submission->file_submission) {
            Storage::delete($submission->file_submission);
        }
        // Simpan file baru
        $filename = $request->file('file_submission')->store('submissions', 'public');
        $submission->file_submission = $filename;
    }

    $submission->save();

    return redirect()->back()->with('success', 'Tugas berhasil diperbarui!');
}

}
