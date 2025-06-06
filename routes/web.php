<?php

use App\Http\Controllers\JobController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SessionController;
use App\Http\Middleware\GuestMiddleware;
use App\Jobs\TranslateJob;
use App\Models\Job;
use Illuminate\Support\Facades\Route;

Route::get('/test', function () {

    // Dispatch the TranslateJob Job
    // NB: Once the worker is running, the existing code is loaded into memory
    // Always restart the worker after making changes in your codebase
    TranslateJob::dispatch(Job::first());

    return 'Done';
});

Route::get('/', function () {
    $user = auth()->user();
    $jobs = Job::with('employer')
        ->where('employer_id', $user?->employer->id)
        ->latest()
        ->paginate();

    return view('home', ['jobs' => $jobs]);
});
Route::view('/about', 'about');
Route::view('/contact', 'contact');

// Jobs
Route::prefix('jobs')->controller(JobController::class)->group(function () {
    Route::get('/', 'index');
    Route::get('/create', 'create')->middleware('auth');
    Route::get('/{job}', 'show');
    Route::post('/', 'store')->middleware('auth');
    Route::get('/{job}/edit', 'edit')->middleware('can:edit,job');
    Route::patch('/{job}', 'update')->middleware('can:edit,job');
    Route::delete('/{job}/delete', 'destroy')->middleware('can:edit,job');
});

// Auth
Route::middleware(GuestMiddleware::class)->group(function () {
    // Register
    Route::controller(RegisteredUserController::class)->group(function () {
        Route::get('/register', 'create');
        Route::post('/register', 'store');
    });

    // Login
    Route::controller(SessionController::class)->group(function () {
        Route::get('/login', 'create')->name('login');
        Route::post('/login', 'store');
    });
});
Route::post('/logout', [SessionController::class, 'destroy']);
