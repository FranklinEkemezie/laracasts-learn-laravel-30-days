<?php

use Illuminate\Support\Facades\Route;

$jobs = [
    [
        'id'    => 1,
        'title' => 'Director',
        'salary'=> '$50,000'
    ],
    [
        'id'    => 2,
        'title' => 'Programmer',
        'salary'=> '$10,000'
    ],
    [
        'id'    => 3,
        'title' => 'Teacher',
        'salary'=> '$40,000'
    ]
];

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

Route::get('/jobs', function () use ($jobs) {
    return view('jobs', [
        'jobs' => $jobs
    ]);
});

Route::get('/jobs/{id}', function (int $id) use ($jobs) {
    $job = \Illuminate\Support\Arr::first($jobs, fn(array $job) => $job['id'] === $id);

    return view('job', ['job' => $job]);
});
