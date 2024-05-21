<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Event;
use App\Models\Peserta;
use App\Models\Course;
use Carbon\Carbon;

class EventController extends Controller
{
    //
    public function myCalendar(Request $request)
    {
        // Ambil ID user yang sedang login dengan menggunakan guard 'peserta'
        $pesertaId = Auth::guard('peserta')->user()->id;

        // Ambil data pelatihan yang dienroll dengan status "acc" untuk user yang sedang login
        $peserta = Peserta::find($pesertaId);
        $pelatihanAcc = $peserta->course()->wherePivot('status', 'Diterima')->get();

        return view('peserta_kalendar.viewKalendar', compact('pelatihanAcc'));
    }

    public function addEvent(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'enrolledCourses' => 'required|exists:courses,id',
            'rangepick' => 'required',
        ]);
    
        $range = $request->input("rangepick");
        $dates = explode(' - ', $range);
        $start_datetime = Carbon::parse($dates[0]);
        $end_datetime = Carbon::parse($dates[1]);

        $peserta_id = Auth::guard('peserta')->user()->id;
    
        $event = new Event();
        $event->title = $request->input("title");
        $event->peserta_id = $peserta_id;
        $event->course_id = $request->input("enrolledCourses");
        $event->start = $start_datetime;
        $event->end = $end_datetime;
    
        if ($event->save()) {
            return redirect()->back()->with('success', 'Event added successfully');
        } else {
            return redirect()->back()->with('error', 'There was an error adding the event');
        }
    }    

    public function updateEvent(Request $request)
    {
        $title = $request->input("edittitle");
        $eventid = $request->input("eventid");
        $range2 = $request->input("rangepick2");
        $dates = explode(' - ', $range2);
        $start_datetime = Carbon::parse($dates[0]);
        $end_datetime = Carbon::parse($dates[1]);
        $event = Event::where('id','=',$eventid)->first();
        $event->title = $title;
        $event->start = $start_datetime;
        $event->end = $end_datetime;
        $event->save();
        return response()->json([
            'success' => true,
            'data' => $event
        ]);
    }

    public function deleteEvent(Request $request)
    {
        $id = $request->id;
        DB::table("events")->where('id',"=",$id)->delete();
        return response()->json([
            'success' => true
        ]);
    }

    public function getEvents(Request $request){
        $events = Event::with('course')->get();
        $eventsArray = [];
    
        foreach ($events as $event) {
            $eventsArray[] = [
                'id' => $event->id,
                'title' => $event->title,
                'course' => $event->course->title,
                'course_id' => $event->course_id,
                'start' => $event->start,
                'end' => $event->end
            ];
        }
    
        return response()->json($eventsArray);
    }
}