<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Assignment;
use App\Models\Course;
use App\Models\Peserta;

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
        return view('assignment.mentor.assignment-update', compact('assignments'));
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



    ///PESERTA
//     public function indexPeserta(Request $request, $uuid){
//         $course = Course::where('uuid', $uuid)->firstOrFail();
//         $assignments = Assignment::where('pelatihan', $course->uuid)->get();
//         return view('assignment.peserta-list-assignment', compact('assignments'));
//     }

//     public function createPeserta(){
//         return view('assignment.peserta-add-assignment');
//     }

//     public function submit(Request $request)
//     {
//         $request->validate([
//             'text_submission' => 'nullable|string',
//             'file_submission' => 'nullable|mimes:pdf,doc,jpg,jpeg,png'
//         ]);
    
//         $assignment_id = $this->getDefaultAssignmentId(); 
    
//         $submission = new Submission;
//         $submission->assignment_id = $assignment_id;
//         $submission->text_submission = $request->text_submission;
        
//         if ($request->hasFile('file_submission')) {
//             $filename = $request->file('file_submission')->store('submission', 'public');
//             $submission->file_submission = $filename;
//         }
    
//         $submission->save();
    
//         return redirect()->back()->with('success', 'Tugas berhasil dikumpulkan!');
//     }

//     public function updatePeserta(Request $request)
// {
//     $request->validate([
//         'text_submission' => 'nullable|string',
//         'file_submission' => 'nullable|mimes:pdf,doc,jpg,jpeg,png'
//     ]);

//     $assignment_id = $this->getDefaultAssignmentId();

//     $submission = Submission::updateOrCreate(
//         [
//             'assignment_id' => $assignment_id,
//             'user_id' => auth()->id() 
//         ],
//         [
//             'text_submission' => $request->text_submission,
//         ]
//     );

//     if ($request->hasFile('file_submission')) {
//         // Hapus file lama jika ada
//         if ($submission->file_submission) {
//             Storage::delete($submission->file_submission);
//         }
//         // Simpan file baru
//         $filename = $request->file('file_submission')->store('submissions', 'public');
//         $submission->file_submission = $filename;
//     }

//     $submission->save();

//     return redirect()->back()->with('success', 'Tugas berhasil diperbarui!');
// }


        public function indexPeserta(Request $request, $peserta_id)
        {
            $peserta = Peserta::with('assignments')->findOrFail($peserta_id);
            return view('assignment.peserta-list-assignment', compact('peserta'));
        }

        public function createPeserta($peserta_id, $assignment_id)
        {
            $assignment = Assignment::findOrFail($assignment_id);
            return view('assignment.peserta-add-assignment', compact('assignment', 'peserta_id'));
        }

        public function submit(Request $request, $peserta_id, $assignment_id)
        {
            $request->validate([
                'text_submission' => 'nullable|string',
                'file_submission' => 'nullable|mimes:pdf,doc,docx,jpg,jpeg,png|max:2048'
            ]);

            $peserta = Peserta::findOrFail($peserta_id);
            $filename = null;
            if ($request->hasFile('file_submission')) {
                $filename = $request->file('file_submission')->store('submissions', 'public');
            }

            $peserta->assignments()->attach($assignment_id, [
                'file_assignments' => $filename,
                'deskripsi' => $request->text_submission,
                'nilai' => 'Belum Lulus', // Default valuenya 'Belum Lulus'
                'text_assignments' => $request->input('text_submission') 
            ]);

            return redirect()->route('peserta.assignments.index', $peserta_id)->with('success', 'Assignment submitted successfully!');
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

}
