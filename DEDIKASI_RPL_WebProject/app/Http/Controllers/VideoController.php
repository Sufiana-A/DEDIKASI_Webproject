<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Video;
use App\Models\Course;


class VideoController extends Controller
{
    public function index(){
        $video = Video::with('course')->get();
        return view('video.mentor.video-list', compact('video'));
    } 

    public function create(){
        $courses = Course::all();
        return view('video/mentor/video-create', compact('courses'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'pelatihan' => 'required|exists:courses,uuid',
            'id_video' => 'required',
            'judul_video'     => 'required',
            'deskripsi_video' => 'required',
            'link_terkait' => 'required',
        ]);
        
        $video = new Video();
        $video->id_video = $request->id_video;
        $video->pelatihan = $request->pelatihan;
        $video->judul_video = $request->judul_video;
        $video->deskripsi_video = $request->deskripsi_video;
        $video->link_terkait = $request->link_terkait;

        $video->save();

        return redirect()->route('video_mentor')->with('success', 'Video berhasil ditambahkan');
    }

    public function edit(Request $request, $id){
        $video = Video::where('id', $request->id)->firstOrFail();
        return view('video.mentor.video-update', compact('video'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_video' => 'nullable|string',
            'judul_video' => 'nullable|string',
            'pelatihan' => 'required|exists:courses,uuid', 
            'deskripsi_video' => 'nullable|string',
            'link_terkait' => 'nullable|string', 
        ]);

        $video = Video::findOrFail($id);
        $video->update($request->all());
        
        return redirect()->route('video_mentor', [$video->id])->with('success', 'Assignment berhasil diperbarui');
    }

    public function delete(Request $request) {
        $video = Video::where('id_video', $request->id_video)->firstOrFail();
        $video->delete();
        return redirect(route('video_mentor'));
    }


    #PESERTA
    public function indexPeserta(Request $request, $uuid){
        $course = Course::where('uuid', $uuid)->firstOrFail();
        $video = Video::where('pelatihan', $course->uuid)->get();
        return view('video.peserta-video-view', compact('video'));
    }

}
