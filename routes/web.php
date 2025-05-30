<?php

use App\Http\Controllers\JobController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Arr;

Route::view('/', 'home', [
    'greeting'  => 'Yo',
    'name'      => 'Ifeanyi'
]);
Route::view('/about', 'about');
Route::view('/contact', 'contact');

// Using Route controller
//Route::controller(JobController::class)->group(function () {
//    Route::get('/jobs', 'index');
//    Route::get('/jobs/create', 'create');
//    Route::get('/jobs/{job}', 'show');
//    Route::post('/jobs', 'store');
//    Route::get('/jobs/{job}/edit', 'edit');
//    Route::patch('/jobs/{job}', 'update');
//    Route::delete('/jobs/{job}', 'destroy');
//});

// Generate a resource controller
Route::resource('jobs', JobController::class);

// Specify options to generate a resource controller
//Route::resource('jobs', JobController::class, [ // specify which action to:
////    'only' => ['index', 'show', 'create'], // include, or
////    'except' => ['edit'], // exclude
//]);


// Index
//Route::get('/jobs', [JobController::class, 'index']);
//Route::get('/jobs', function () {
//
//    // Lazy loads the jobs:
//    // Any relationship leads to an extra query
//    // causing N + 1 query
////     $jobs = Job::all();
//
//    // Eagerly loads the jobs:
//    // Loads the 'employer' relationship at once
//    // preventing N + 1 query
////    $jobs = Job::with('employer')->get();
//
//    // Paginate
//    $jobs = Job::with('employer')->latest()->paginate();
//
//    // Simple pagination: remove the page number 1, 2, 3, ... in the pagination link
////    $jobs = Job::with('employer')->simplePaginate(3);
//
//    // Cursor based pagination: does not use page numbers (1, 2, 3, ...) for pagination
////    $jobs = Job::with('employer')->cursorPaginate(3);
//
//    return view('jobs.index', [
//        'jobs' => $jobs
//    ]);
//});
//
//// Create
//Route::get('/jobs/create', function () {
//   return view('jobs.create');
//});

// Create
//Route::get('/jobs/create', [JobController::class, 'create']);

// Show
//Route::get('/jobs/{job}', [JobController::class, 'show']);

// Store
//Route::post('/jobs', [JobController::class, 'store']);

// Edit
//Route::get('/jobs/{job}/edit', [JobController::class, 'edit']);

// Update
// You can use Laravel Route Model Binding feature so that
// Laravel automatically resolves the job from the id
// Example:
// Route::patch('/jobs/{job}', function (Job $job) { ... });
//Route::patch('/jobs/{job}', function (Job $job) {
//
//    // Validate the request
//    request()->validate([
//        'title'     => 'required|min:3',
//        'salary'    => 'required'
//    ]);
//
//    // TODO: Authorize the request
//
//    // Update the fields and persist changes
//    $job->title     = request('title');
//    $job->salary    = request('salary');
//    $job->save();
//
//    // Redirect to the job page
//    return redirect('/jobs/' . $job->id);
//});

// Update
//Route::patch('/jobs{job}', [JobController::class, 'update']);

// Delete
//Route::delete('/jobs/{job}', [JobController::class, 'destroy']);
