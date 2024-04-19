<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
class HomeController extends Controller{
    public function studentDashboardIndex()
    {
        return view('dashboard.student_dashboard');
    }    
}
