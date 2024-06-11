<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProfilePesertaController;

class LoginController extends Controller
{
    public function index(){
        return view('login');
    }

    public function loginvalid(Request $request) {
        // Validate the request
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);
    
        // Prepare credentials
        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];
    
        // Attempt to login with different guards
        if (Auth::guard('peserta')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('student.dashboard.index');
        }
    
        if (Auth::guard('admin')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('dashboard_admin');
        }
    
        if (Auth::guard('mentor')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('dashboard_mentor');
        }
    
        // If authentication fails, return back with error message
        return redirect()->back()->withErrors(['email' => 'Invalid email or password.'])->withInput();
    }

    public function logout(Request $request)
    {
        Auth::guard('peserta')->logout();
        Auth::guard('admin')->logout();
        Auth::guard('mentor')->logout();

        // Invalidate the session
        $request->session()->invalidate();

        // Regenerate the CSRF token
        $request->session()->regenerateToken();

        return redirect('/login');
    }

}
