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

// Index
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
    $jobs = Job::with('employer')->latest()->paginate();

    // Simple pagination: remove the page number 1, 2, 3, ... in the pagination link
//    $jobs = Job::with('employer')->simplePaginate(3);

    // Cursor based pagination: does not use page numbers (1, 2, 3, ...) for pagination
//    $jobs = Job::with('employer')->cursorPaginate(3);

    return view('jobs.index', [
        'jobs' => $jobs
    ]);
});

// Create
Route::get('/jobs/create', function () {
   return view('jobs.create');
});

// Show
Route::get('/jobs/{id}', function (int $id) {
    $job = Job::find($id);
    if (! $job) abort(404);

    return view('jobs.show', ['job' => Job::find($id)]);
});

// Store
Route::post('/jobs', function () {

    request()->validate([
        'title'     => ['required', 'min:3'],
        'salary'    => ['required']
    ]);

    // TODO: Validate request

    // Create job
    Job::create([
        'title'         => request('title'),
        'salary'        => request('salary'),
        'employer_id'   => 1
    ]);

    return redirect('/jobs');
});

// Edit
Route::get('/jobs/{id}/edit', function ($id) {

    $job = Job::find($id);
    if (! $job) abort(404);

    return view('jobs.edit', ['job' => $job]);
});

// Update
// You can use Laravel Route Model Binding feature so that
// Laravel automatically resolves the job from the id
// Example:
// Route::patch('/jobs/{id}', function (Job $job) { ... });
Route::patch('/jobs/{id}', function ($id) {

    // Validate the request
    request()->validate([
        'title'     => 'required|min:3',
        'salary'    => 'required'
    ]);

    // TODO: Authorize the request

    // Find the job
    $job = Job::findOrFail($id);

    // Update the fields and persist changes
    $job->title     = request('title');
    $job->salary    = request('salary');
    $job->save();

    // Redirect to the job page
    return redirect('/jobs/' . $job->id);
});


// Delete
Route::delete('/jobs/{id}', function ($id) {

    // TODO: Authorize the request

    // Delete the job
    Job::findOrFail($id)->delete();

    return redirect('/jobs');
});
