<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //

        return view('register.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validated = $request->validate([
                'name'=>['required'],
                'email'=>['required','email'],
                'password'=>['required','confirmed'],
        ]);
        dump($validated);

        $user = User::create($validated);

        Auth::login($user);

        // make new session

        return redirect('/jobs');
    }

}
