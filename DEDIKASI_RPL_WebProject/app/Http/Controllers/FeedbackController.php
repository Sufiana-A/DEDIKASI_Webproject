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

}
