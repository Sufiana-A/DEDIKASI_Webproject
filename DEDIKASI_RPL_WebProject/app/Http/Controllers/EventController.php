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
        $title = $request->input("title");
        $range = $request->input("rangepick");
        $dates = explode(' - ', $range);
        $start_datetime = Carbon::parse($dates[0]);
        $end_datetime = Carbon::parse($dates[1]);

        $event = new Event();
        $event->title = $title;
        $event->start = $start_datetime;
        $event->end = $end_datetime;
        $event->save();
        return response()->json([
            'success' => true,
            'data' => $event
        ]);
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
        $events = Event::whereDate('start_date', '>=', $request->start)
            ->whereDate('end_date', '<=', $request->end)
            ->get();
        return response()->json($events);
    }
}