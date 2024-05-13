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

        return view('assignment.assignment-list', compact('assignments'));
    } 

    public function create(){
        return view('assignment/mentor/assignment-create');
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
            $tugasname = time() . '.' . $tugas->getClientOriginalExtension();
            $tugas->storeAs('/storage/app/public/assignment', $tugasname);
            $assignments->addition = $tugasname;
        }
        
        $assignments->save();

        return redirect()->route('assignment_mentor')->with('success', 'Assignment berhasil ditambahkan');            
    }
    
    public function update(Request $request, $id)
    {
        $request->validate([
            'id_tugas' => 'nullable|string',
            'title' => 'nullable|string',
            'description' => 'nullable|string',
            'addition' => 'nullable|mimes:pdf,doc,jpg,jpeg,png|max:2048', 
        ]);

        $assignment = Assignment::findOrFail($id);
        $assignment->update($request->all());

        return redirect()->route('assignment.index')->with('success', 'Assignment berhasil diperbarui');
    }

    public function delete(Request $request) {
        $assignment = Assignment::where('id_tugas', $request->id_tugas)->firstOrFail();
        $assignment->delete();
        return redirect(route('assignment_mentor'));
    }



    ///PESERTA
    public function indexPeserta(){
        return view('assignment/peserta-list-assignment');
    } 

    public function submit(Request $request)
    {
        $request->validate([
            'text_submission' => 'nullable|string',
            'file_submission' => 'nullable|file'
        ]);
    
        // Assign default assignment_id based on business logic
        $assignment_id = $this->getDefaultAssignmentId(); // Implement this method according to your business logic
    
        $submission = new Submission;
        $submission->assignment_id = $assignment_id;
        $submission->text_submission = $request->text_submission;
    
        if ($request->hasFile('file_submission')) {
            $filename = $request->file('file_submission')->store('submissions', 'public');
            $submission->file_submission = $filename;
        }
    
        $submission->save();
    
        return redirect()->back()->with('success', 'Tugas berhasil dikumpulkan!');
    }
    
    private function getDefaultAssignmentId()
    {
        $user = auth()->user();
            $assignment = $user->currentAssignment; 
    
        return $assignment ? $assignment->id : null;
    }

    public function updatePeserta(Request $request)
{
    $request->validate([
        'text_submission' => 'nullable|string',
        'file_submission' => 'nullable|file'
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
