<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Announcement;

class AnnouncementController extends Controller
{
    public function index(Request $request) {
        $query = Announcement::query();

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
        $announcements = $query->get();

        return view('admin.Announcement.manage', compact('announcements'));
    }

    public function addAnnouncement() {
        return view('admin.Announcement.add');
    }

    public function editAnnouncement($id) {
        $announcement = Announcement::where('uuid', $id)->firstOrFail();
        return view('admin.Announcement.edit', compact('announcement'));
    }

    public function store(Request $request) {
        $announcement = new Announcement();
        $announcement->title = $request->title;
        $announcement->image = $request->image;
        $announcement->description = $request->description;
        $announcement->save();

        $formattedId = sprintf("%03d", $announcement->id);
        $announcement->uuid = "ANN$formattedId";
        $announcement->update();

        return redirect()->route('admin.manage.index');
    }

    public function update(Request $request) {
        $announcement = Announcement::where('uuid', $request->uuid)->firstOrFail();
        $announcement->title = $request->title;
        $announcement->image = $request->image;
        $announcement->description = $request->description;
        $announcement->update();

        return redirect()->route('admin.manage.index');
    }

    public function delete(Request $request) {
        $announcement = Announcement::where('uuid', $request->uuid)->firstOrFail();
        $announcement->delete();
        return redirect()->route('admin.manage.index');
    }

    public function showAnnouncements()
    {
        // Ambil data pengumuman dari database
        $announcements = Announcement::all();

        // Tampilkan view 'announcements.index' dan kirimkan data pengumuman
        return view('peserta.pengumuman.index', compact('announcements'));
    }
    public function showAnnouncementDetail($id)
{
    // Ambil data pengumuman berdasarkan ID
    $announcement = Announcement::findOrFail($id);

    // Tampilkan view 'announcements.detail' dan kirimkan data pengumuman
    return view('peserta.pengumuman.detail', compact('announcement'));
}

public function destroy($id) {
    $announcement = Announcement::findOrFail($id);
    $announcement->delete();
    return redirect()->back()->with('success', 'Announcement deleted successfully.');
}

}



  