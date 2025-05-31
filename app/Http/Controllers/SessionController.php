<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{

    public function create()
    {
        return view('auth.login');
    }

    public function store(Request $request)
    {
        dump($request);
    }
}
