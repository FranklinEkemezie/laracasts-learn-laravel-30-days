<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;

class RegisteredUserController extends Controller
{
    //

    public function create()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        // Validate the form
        $attributes = $request->validate([
            'first_name'    => ['required'],
            'last_name'     => ['required'],
            'email'         => ['required', 'email'],
            'password'      => ['required', Password::min(6), 'confirmed']
        ]);

        // Create the user in the database
        $user = User::create($attributes);

        // Log them in
        Auth::login($user);

        // Redirect to dashboard/home page
        return redirect('/');
    }
}
