<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Exception;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function create_feedback(){

        return view('peserta.feedbackPeserta');
    }

    public function submit_feedback(Request $request, $id){

        $feedbacks = new Feedback();
        $feedbacks->peserta_id = $id;
        $feedbacks->tipe_feedback = $request->tipe_feedback;
        $feedbacks->rating = $request->rating;
        $feedbacks->feedback = $request->feedback;

        $feedbacks->save();

        return redirect()->route('feedback_peserta')->with('success', 'Feedback submittes successfully !');

    }

    public function show_feedback_mentor(){

        try {
            $fiveMonthlate = now()->subMonths(5)->startOfMonth();
            $feedback_mentor = Feedback::where('tipe_feedback', 'Mentor')->whereBetween('created_at', [$fiveMonthlate, now()])->get();
            return view('mentor.feedbackMentor', compact('feedback_mentor'));
        }
        catch (Exception $e) {
            
            return view('error', ['message' => 'An error occurred while retrieving feedback.']);
        }

    }

    public function show_feedback_sistem(){

        try {
            $fiveMonthlate = now()->subMonths(5)->startOfMonth();
            $feedback_sistem = Feedback::where('tipe_feedback', 'Sistem')->whereBetween('created_at', [$fiveMonthlate, now()])->get();
            return view('admin.feedbackAdmin', compact('feedback_sistem'));
        }
        catch (Exception $e) {
            
            return view('error', ['message' => 'An error occurred while retrieving feedback.']);
        }

    }

    public function filter_feedback_sistem(Request $request){

        $oneMonthlate = now()->subMonths(1)->startOfMonth();
        $twoMonthlate = now()->subMonths(2)->startOfMonth();
        $threeMonthlate = now()->subMonths(3)->startOfMonth();
        $fiveMonthlate = now()->subMonths(5)->startOfMonth();

        $feedback = Feedback::where('tipe_feedback', 'Sistem');

        if ($request->has('timestamp_filter')) {
            if ($request->timestamp_filter == '1_bulan') {
                $feedback_sistem = $feedback->whereBetween('created_at', [$oneMonthlate, now()])->get();
            } elseif ($request->timestamp_filter == '2_bulan') {
                $feedback_sistem = $feedback->whereBetween('created_at', [$twoMonthlate, now()])->get();
            }elseif ($request->timestamp_filter == '3_bulan') {
                $feedback_sistem = $feedback->whereBetween('created_at', [$threeMonthlate, now()])->get();
            }else {
                $feedback_sistem = $feedback->whereBetween('created_at', [$fiveMonthlate, now()])->get();
            }
        }
        return view('admin.feedbackAdmin', compact('feedback_sistem'));

    }

}
