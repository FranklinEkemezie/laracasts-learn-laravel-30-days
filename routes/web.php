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
    return view('jobs', ['jobs' => Job::all()]);
});

Route::get('/jobs/{id}', function (int $id) {
    return view('job', ['job' => Job::find($id)]);
});
