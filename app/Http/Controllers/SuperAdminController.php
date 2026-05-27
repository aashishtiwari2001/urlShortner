<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\Shorturl;
use Carbon\Carbon;

class SuperAdminController extends Controller
{
    public function dashboard()
    {
        $companies = Company::withCount([
            'shortUrls',
            'users',
        ])->withSum(
            'shortUrls',
            'hit_count'
        )->latest()->get();

        return view(
            'superadmin.dashboard',
            compact('companies')
        );
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


    public function reports(Request $request)
    {
        $filter = $request->filter;

        $urls = Shorturl::query();

        if ($filter == 'this_week') {

            $urls->whereBetween('created_at', [
                Carbon::now()->startOfWeek(),
                Carbon::now()->endOfWeek()
            ]);
        }

        if ($filter == 'last_week') {

            $urls->whereBetween('created_at', [
                Carbon::now()->subWeek()->startOfWeek(),
                Carbon::now()->subWeek()->endOfWeek()
            ]);
        }

        if ($filter == 'this_month') {

            $urls->whereMonth(
                'created_at',
                Carbon::now()->month
            );
        }

        if ($filter == 'last_month') {

            $urls->whereMonth(
                'created_at',
                Carbon::now()->subMonth()->month
            );
        }

        $urls = $urls->latest()->get();

        return view(
            'superadmin.reports',
            compact('urls')
        );
    }
}
