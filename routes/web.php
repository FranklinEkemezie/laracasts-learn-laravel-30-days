<?php

use App\Models\Job;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Arr;

Route::get('/', function () {
    return view('home', [
        'greeting'  => 'Yo',
        'name'      => 'Ifeanyi'
    ]);
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', function () {
   return view('contact');
});

Route::get('/jobs', function () {

    // Lazy loads the jobs:
    // Any relationship leads to an extra query
    // causing N + 1 query
//     $jobs = Job::all();

    // Eagerly loads the jobs:
    // Loads the 'employer' relationship at once
    // preventing N + 1 query
    $jobs = Job::with('employer')->get();

    return view('jobs', [
        'jobs' => $jobs
    ]);
});

Route::get('/jobs/{id}', function (int $id) {
    return view('job', ['job' => Job::find($id)]);
});
