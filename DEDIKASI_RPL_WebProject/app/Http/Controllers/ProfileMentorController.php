<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileMentorController extends Controller
{
    public function show_profile(){

        return view('mentor.profileMentor');
    }
}
