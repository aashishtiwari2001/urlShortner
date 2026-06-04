<?php

namespace App\Http\Controllers;

use App\Models\Shorturl;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class MemberController extends Controller
{
    public function dashboard()
    {
        $urls = Shorturl::where(
            'user_id',
            Auth::id()
        )->latest()->get();

        $totalUrls = $urls->count();

        $totalHits = $urls->sum('hit_count');

        return view(
            'member.dashboard',
            compact(
                'urls',
                'totalUrls',
                'totalHits'
            )
        );
    }
}
