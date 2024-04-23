<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AssignmentController extends Controller
{
    public function index(){
        return view('assignment/mentor/assignment-list');
    } 

    public function create(){
        return view('assignment-create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul'     => 'required',
            'deskripsi' => 'required',
            'file' => 'required|mimes:pdf|max:2048', // Validasi file PDF
            'urutan' => 'required|integer', // Validasi urutan
        ]);

        $assignment = new Assignment;
        $assignment->deskripsi = $request->deskripsi;
        $assignment->urutan = $request->urutan; // Simpan urutan

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('uploads', $filename);
            $assignment->file = $path;
        }

        $assignment->save();

        return redirect()->route('pelatihan_assignments')->with('success', 'Assignment berhasil ditambahkan');
    }
    
    public function update(Request $request, $id)
    {
        $request->validate([
            'id_tugas' => 'nullable|string',
            'judul_tugas' => 'nullable|string',
            'deskripsi_tugas' => 'nullable|string',
            'link_terkait' => 'nullable|string',
            'tugas_dibuka' => 'nullable|date',
            'batas_pengumpulan' => 'nullable|date',
        ]);

        $assignment = Assignment::findOrFail($id);
        $assignment->update($request->all());

        return redirect()->route('assignments.index')->with('success', 'Assignment berhasil diperbarui');
    }

    public function destroy($id){
        $assignment = Assignment::findOrFail($id);
        $assignment->delete();
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
