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
//    $jobs = Job::with('employer')->get();

    // Paginate
    $jobs = Job::with('employer')->paginate();

    // Simple pagination: remove the page number 1, 2, 3, ... in the pagination link
//    $jobs = Job::with('employer')->simplePaginate(3);

    // Cursor based pagination: does not use page numbers (1, 2, 3, ...) for pagination
//    $jobs = Job::with('employer')->cursorPaginate(3);

    return view('jobs', [
        'jobs' => $jobs
    ]);
});

Route::get('/jobs/{id}', function (int $id) {
    return view('job', ['job' => Job::find($id)]);
});
