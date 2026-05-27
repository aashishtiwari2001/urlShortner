<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SuperAdminController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ShortUrlRedirectController;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/s/{code}', [
    ShortUrlRedirectController::class,
    'redirect'
])->name('shorturl.redirect');

Route::middleware(['auth', 'role:super_admin'])
    ->group(function () {

        Route::get(
            '/superadmin/dashboard',
            [SuperAdminController::class, 'dashboard']
        )->name('superadmin.dashboard');


        Route::get(
            '/superadmin/reports',
            [SuperAdminController::class, 'reports']
        )->name('superadmin.reports');


        Route::get(
            '/companies/create',
            [CompanyController::class, 'create']
        )->name('companies.create');

        Route::post(
            '/companies/store',
            [CompanyController::class, 'store']
        )->name('companies.store');


        Route::get(
            '/superadmin/urls',
            [SuperAdminController::class, 'allUrls']
        )->name('superadmin.urls');
    });



Route::middleware(['auth', 'role:admin'])
    ->group(function () {

        Route::get(
            '/admin/dashboard',
            [AdminController::class, 'dashboard']
        )->name('admin.dashboard');

        Route::get(
            '/users/create',
            [AdminController::class, 'createUser']
        )->name('users.create');

        Route::post(
            '/users/store',
            [AdminController::class, 'storeUser']
        )->name('users.store');
    });

Route::middleware(['auth', 'role:member'])
    ->group(function () {

        Route::get(
            '/member/dashboard',
            [MemberController::class, 'dashboard']
        )->name('member.dashboard');
    });

Route::middleware(['auth', 'role:admin,member'])
    ->group(function () {

        Route::get(
            '/urls/create',
            [AdminController::class, 'createUrl']
        )->name('urls.create');

        Route::post(
            '/urls/store',
            [AdminController::class, 'storeUrl']
        )->name('urls.store');
    });


// Logout Route
Route::post('/logout', [AuthController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');
