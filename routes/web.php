<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ListingController;
use App\Http\Controllers\RequestController;
use App\Http\Controllers\TransactionController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//HOME PAGE
Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

//USER MODEL PAGE ROUTES

//USER DASHBOARD ROUTES
Route::get('/dashboard', [ProfileController::class, 'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard/settings', function () {
    return Inertia::render('Settings');
})->middleware(['auth', 'verified'])->name('dashboard.settings');

Route::controller(ProfileController::class)->group(function(){
    Route::middleware(['auth', 'verified'])->group(function () {
        Route::get('/profile/dashboard', 'dashboard')->name('dashboard');
        //Route::get('/profile/setup', 'create')->name('profile.create');
        //Route::get('/profile/edit', 'edit')->name('profile.edit');
    });
});

//USER PROFILE ROUTE
Route::get('/users/{user}/profile', [ProfileController::class, 'show'])->name('profile');


require __DIR__.'/auth.php';
