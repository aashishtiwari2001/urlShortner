<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Shorturl;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Company;

class AdminController extends Controller
{
    public function dashboard()
    {
        $company = Company::withCount([
            'users',
            'shortUrls'
        ])
            ->withSum(
                'shortUrls',
                'hit_count'
            )
            ->findOrFail(
                Auth::user()->company_id
            );

            // dd($company);

        $users = $company->users()
            ->latest()
            ->get();

        $urls = $company->shortUrls()
            ->latest()
            ->paginate(10);

        return view(
            'admin.dashboard',
            compact(
                'users',
                'urls',
                'company'
            )
        );
    }

    public function createUser()
    {
        return view('admin.create-user');
    }

    public function storeUser(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'role' => 'required|in:admin,member',
        ]);

        User::create([
            'company_id' => Auth::user()->company_id,
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);

        return redirect()
            ->route('admin.dashboard')
            ->with('success', 'User Created Successfully');
    }
}
