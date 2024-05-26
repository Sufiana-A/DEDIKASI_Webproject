<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Timeline;
use App\Models\Peserta;
use App\Models\Course;

class TimelineController extends Controller
{
    //
    public function index(Request $request) {
        $query = Timeline::query();
    
        // Check if title input is provided
        if ($request->has('title')) {
            $query->where('title', 'like', '%' . $request->title . '%');
        }
    
        // Check if class input is provided
        if ($request->has('class')) {
            $query->where('class', 'like', '%' . $request->class . '%');
        }
    
        // Get the results
        $timelines = $query->get();
    
        // If there is only one timeline, pass it to the view
        $timeline = count($timelines) == 1 ? $timelines->first() : null;
    
        return view('peserta.timeline.listTimeline', compact('timelines', 'timeline'));
    }    

    public function add() {
        $pesertaId = Auth::guard('peserta')->user()->id;
    
        // Ambil data pelatihan yang dienroll dengan status "acc" untuk user yang sedang login
        $peserta = Peserta::find($pesertaId);
        $pelatihanAcc = $peserta->course()->wherePivot('status', 'Diterima')->get();
    
        // Mengubahnya menjadi array agar bisa diakses di JavaScript
        $pelatihanAccArray = $pelatihanAcc->mapWithKeys(function ($course) {
            return [$course->id => ['class' => $course->class, 'description' => $course->description]];
        })->toArray();
    
        return view('peserta.timeline.addTimeline', compact('pelatihanAcc', 'pelatihanAccArray'));
    }    

    public function store(Request $request) {
        $request->validate([
            'title' => 'required|exists:courses,id',
            'tugas' => 'required|string|max:255',
            'deadline' => 'required|date_format:Y-m-d\TH:i',
            'status' => 'required|in:OPEN,IN PROGRESS,DONE',
        ]);

        $course = Course::find($request->title);

        $timelines = new Timeline();
        $timelines->title = $course->title;
        $timelines->class = $course->class;
        $timelines->description = $course->description;
        $timelines->tugas = $request->tugas;
        $timelines->deadline = $request->deadline;
        $timelines->status = $request->status;
        $timelines->peserta_id = Auth::guard('peserta')->user()->id;
        $timelines->course_id = $request->title;
        $timelines->save();

        if ($timelines) {
            return redirect(route('timeline_index'))->with('success', 'Timeline berhasil ditambahkan');
        } else {
            return redirect(route('timeline_index'))->with('error', 'Timeline gagal ditambahkan');
        }
    }

    public function edit($id) {
        $pesertaId = Auth::guard('peserta')->user()->id;
        $peserta = Peserta::find($pesertaId);
        $pelatihanAcc = $peserta->course()->wherePivot('status', 'Diterima')->get();
        $pelatihanAccArray = $pelatihanAcc->mapWithKeys(function ($course) {
            return [$course->id => ['class' => $course->class, 'description' => $course->description]];
        })->toArray();
    
        $timelines = Timeline::where('id', $id)->firstOrFail();
        return view('peserta.timeline.editTimeline', compact('timelines', 'pelatihanAcc', 'pelatihanAccArray'));
    }
    
    public function update(Request $request, $id) {
        $request->validate([
            'title' => 'required|exists:courses,id',
            'tugas' => 'required|string|max:255',
            'deadline' => 'required|date_format:Y-m-d\TH:i',
            'status' => 'required|in:OPEN,IN PROGRESS,DONE',
        ]);
    
        $course = Course::find($request->title);
    
        $timelines = Timeline::where('id', $id)->firstOrFail();
        $timelines->title = $course->title;
        $timelines->class = $course->class;
        $timelines->description = $course->description;
        $timelines->tugas = $request->tugas;
        $timelines->deadline = $request->deadline;
        $timelines->status = $request->status;
        $timelines->peserta_id = Auth::guard('peserta')->user()->id;
        $timelines->course_id = $request->title;
        $updateTimeline = $timelines->update();

        if ($updateTimeline) {
            return redirect(route('timeline_index'))->with('success', 'Timeline berhasil diperbarui');
        } else {
            return redirect(route('timeline_index'))->with('error', 'Timeline gagal diperbaharui');
        }
    }

    public function delete($id, Request $request) {
        $timeline = Timeline::where('id', $id)->firstOrFail();
        $deleteTimeline = $timeline->delete();

        if ($deleteTimeline) {
            return redirect(route('timeline_index'))->with('success', 'Timeline berhasil dihapus');
        } else {
            return redirect(route('timeline_index'))->with('error', 'Timeline gagal dihapus');
        }
    }
}
