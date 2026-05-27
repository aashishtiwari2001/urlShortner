<?php

namespace App\Http\Controllers;

use App\Models\Shorturl;

class MemberController extends Controller
{
    public function dashboard()
    {
        $urls = Shorturl::where(
            'user_id',
            auth()->id()
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
