<?php

namespace App\Http\Controllers;

use App\Models\Shorturl;

class ShortUrlRedirectController extends Controller
{
    public function redirect($code)
    {
        $url = Shorturl::where(
            'short_code',
            $code
        )->first();

        if (!$url) {

            abort(404, 'Short URL Not Found');
        }

        // Increase hit count

        $url->increment('hit_count');

        // Redirect to original URL

        return redirect()->away(
            $url->original_url
        );
    }
}
