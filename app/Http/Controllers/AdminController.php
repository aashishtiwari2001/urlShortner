<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Shorturl;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function dashboard()
    {
        $companyId = auth()->user()->company_id;

        $users = User::where(
            'company_id',
            $companyId
        )->latest()->get();

        $urls = Shorturl::where(
            'company_id',
            $companyId
        )->latest()->get();

        $totalUsers = User::where(
            'company_id',
            $companyId
        )->count();

        $totalUrls = Shorturl::where(
            'company_id',
            $companyId
        )->count();

        $totalHits = Shorturl::where(
            'company_id',
            $companyId
        )->sum('hit_count');

        return view(
            'admin.dashboard',
            compact(
                'users',
                'urls',
                'totalUsers',
                'totalUrls',
                'totalHits'
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
            'company_id' => auth()->user()->company_id,
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);

        return redirect()
            ->route('admin.dashboard')
            ->with('success', 'User Created Successfully');
    }


    public function createUrl()
    {
        if(auth()->user()->role == 'admin') {
            $urls = Shorturl::where(
                'company_id',
                auth()->user()->company_id
            )->latest()->get();
        } else {
            $urls = Shorturl::where(
                'user_id',
                auth()->user()->id
            )->latest()->get();
        }

        return view(
            'admin.create-url',
            compact('urls')
        );
    }

    public function storeUrl(Request $request)
    {
        $request->validate([
            'original_url' => 'required|url',
        ]);

        $short = Shorturl::create([

            'company_id' => auth()->user()->company_id,

            'user_id' => auth()->id(),

            'original_url' => $request->original_url,

            'short_code' => strtolower(
                Str::random(6)
            ),

            'hit_count' => 0,
        ]);

        return redirect()
            ->route('urls.create')
            ->with([
                'success' => 'Short URL Created Successfully',
                'short_url' => url('/s/' . $short->short_code)
            ]);
    }
}
