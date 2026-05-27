<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CompanyController extends Controller
{
    public function create()
    {
        return view('superadmin.create-company');
    }

    public function store(Request $request)
    {
        $request->validate([
            'company_name' => 'required',
            'company_email' => 'required|email|unique:companies,email',

            'admin_name' => 'required',
            'admin_email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
        ]);

        $company = Company::create([
            'name' => $request->company_name,
            'email' => $request->company_email,
        ]);

        User::create([
            'company_id' => $company->id,
            'name' => $request->admin_name,
            'email' => $request->admin_email,
            'password' => Hash::make($request->password),
            'role' => 'admin',
        ]);

        return redirect()
            ->route('superadmin.dashboard')
            ->with('success', 'Company Created Successfully');
    }
}