<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Register;

class Registration extends Controller
{
    public function register()
    {
        return view('registration');
    }

    public function registration(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'required|email|unique:registers,email',
            'name' => 'required',
            'password' => 'required|confirmed',
        ]);

        $register = new Register();
        $register->name = $request->input('name');
        $register->password = bcrypt($request->input('password'));
        $register->email = $request->input('email');

        if ($register->save()) {
            return view('login')->with('message', 'Registration successful');
        } else {
            return view('register')->withErrors('Registration failed');
        }
    }

    public function login()
    {
        return view('login');
    }

    public function loginpost(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            // Authentication was successful...
            return redirect()->intended('dashboard');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }
  
    public function dashboard()
    {
        $user = Auth::user();
        return view('dashbord', compact('user'));
    }
    public function logout()
    {
        Auth::logout(); // Log the user out
        return redirect()->route('login'); // Redirect to the login page or any other page
    }
}
