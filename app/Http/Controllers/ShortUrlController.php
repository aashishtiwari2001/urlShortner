<?php

namespace App\Http\Controllers;

use App\Models\Shorturl;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class ShortUrlController extends Controller
{
    public function redirect(string $code)
    {
        $url = ShortUrl::where('short_code', $code)
            ->firstOrFail();

        $url->increment('hit_count');

        return redirect()->away($url->original_url);
    }


    public function createUrl()
    {
        if (Auth::user()->role == 'admin') {
            $urls = Shorturl::where(
                'company_id',
                Auth::user()->company_id
            )->latest()->get();
        } else {
            $urls = Shorturl::where(
                'user_id',
                Auth::user()->id
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

            'company_id' => Auth::user()->company_id,

            'user_id' => Auth::user()->id,

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


    public function allUrls()
    {
        $urls = Shorturl::with('user')
            ->latest()
            ->get();

        return view(
            'superadmin.urls',
            compact('urls')
        );
    }
}
