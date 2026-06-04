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

            $user = Auth::user();

            $routes = [
                'super_admin' => 'superadmin.dashboard',
                'admin'       => 'admin.dashboard',
                'member'      => 'member.dashboard',
            ];

            return redirect()->route(
                $routes[$user->role] ?? 'login'
            );
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
