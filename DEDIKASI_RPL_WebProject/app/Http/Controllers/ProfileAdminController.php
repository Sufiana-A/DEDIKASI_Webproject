<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileAdminController extends Controller
{
    public function show_profile(){

        return view('admin.profileAdmin');
    }
}
