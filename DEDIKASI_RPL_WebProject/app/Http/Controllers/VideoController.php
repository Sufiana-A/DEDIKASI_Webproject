<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Video;


class VideoController extends Controller
{
    public function index(){
        $video = Video::get();
        return view('video.mentor.video-list', compact('video'));
    } 

    public function create(){
        return view('video/mentor/video-create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_video' => 'required',
            'judul_video'     => 'required',
            'deskripsi_video' => 'required',
            'link_terkait' => 'required',
        ]);
        
        $video = new Video();
        $video->id_video = $request->id_video;
        $video->judul_video = $request->judul_video;
        $video->deskripsi_video = $request->deskripsi_video;
        $video->link_terkait = $request->link_terkait;

        $video->save();

        return redirect()->route('video_mentor')->with('success', 'Video berhasil ditambahkan');
    }


}
