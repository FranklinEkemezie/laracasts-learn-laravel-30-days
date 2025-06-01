<?php

namespace App\Http\Controllers;

use App\Mail\JobPosted;
use App\Models\Job;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Mail;

class JobController extends Controller
{
    //

    public function index()
    {
        $jobs = Job::with('employer')->latest()->paginate();
        return view('jobs.index', ['jobs' => $jobs]);
    }

    public function create()
    {
        return view('jobs.create');
    }

    public function show(Job $job)
    {
        return view('jobs.show', ['job' => $job]);
    }

    public function store()
    {
        request()->validate([
            'title'     => ['required', 'min:3'],
            'salary'    => ['required']
        ]);

        // Create job
        $job = Job::create([
            'title'         => request('title'),
            'salary'        => request('salary'),
            'employer_id'   => Auth::user()->employer->id
        ]);

        // Send mail
        Mail::to($job->employer->user)->send(new JobPosted($job));

        return redirect('/');
    }

    public function edit(Job $job)
    {
        // Use the 'edit-job' Gate defined in AppServiceProvider
        // to ensure the user is authorised to edit the job
//        Gate::authorize('edit-job', $job);

        // Using the 'can' and 'cannot' method to determine if
        // the user is allowed to perform an action.
        // Laravel provides the @can('gate-ability') and @cannot('gate-ability')
        // directives that can be used in Blade component
//        Auth::user()->can('edit-job', $job);

        return view('jobs.edit', ['job' => $job]);
    }

    public function update(Job $job)
    {
        // Validate the request
        request()->validate([
            'title'     => 'required|min:3',
            'salary'    => 'required'
        ]);

        // TODO: Authorize the request

        // Update the fields and persist changes
        $job->title     = request('title');
        $job->salary    = request('salary');
        $job->save();

        // Redirect to the job page
        return redirect('/jobs/' . $job->id);
    }

    public function destroy(Job $job)
    {
        // TODO: Authorize the request

        // Delete the job
        $job->delete();

        return redirect('/jobs');
    }
}
