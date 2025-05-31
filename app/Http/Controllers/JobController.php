<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

        // TODO: Validate request

        // Create job
        Job::create([
            'title'         => request('title'),
            'salary'        => request('salary'),
            'employer_id'   => 1
        ]);

        return redirect('/jobs');
    }

    public function edit(Job $job)
    {
        // Ensure the user is signed in
        if (Auth::guest()) {
            return redirect('/login');
        }

        // Ensure the user is authorised to do so
        if ($job->employer->user->isNot(Auth::user())) {
            abort(403);
        }


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
