<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    // login function
    public function login()
    {
        return view('auth.login');
    }


    // login submit function
    public function loginSubmit(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {

            $request->session()->regenerate();

            $user = auth()->user();

            if ($user->role == 'super_admin') {

                return redirect()->route('superadmin.dashboard');
            }

            if ($user->role == 'admin') {

                return redirect()->route('admin.dashboard');
            }

            if ($user->role == 'member') {

                return redirect()->route('member.dashboard');
            }
        }

        return back()->withErrors([
            'email' => 'Invalid credentials'
        ]);
    }


    // logout function
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
