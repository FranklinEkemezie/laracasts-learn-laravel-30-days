<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{

    public function create()
    {
        return view('auth.login');
    }

    public function store(Request $request)
    {
        // Validate the form
        $attrs = $request->validate([
            'email'     => ['required'],
            'password'  => ['required']
        ]);

        // Attempt to log the user in
        if (! Auth::attempt($attrs)) {
            throw ValidationException::withMessages([
                'email' => 'Sorry, those credentials do not match'
            ]);
        }

        // Regenerate the session token
        $request->session()->regenerate();

        // Redirect to dashboard/home page
        $jobs = Job::with('employer')
            ->where('employer_id', $request->user()->employer->id)
            ->latest()
            ->paginate();
        return view('home', ['jobs' => $jobs]);
    }

    public function destroy()
    {
        Auth::logout();

        return redirect('/jobs');
    }
}
