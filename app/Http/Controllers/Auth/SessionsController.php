<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;

class SessionsController extends Controller
{

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('/auth/login');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //VALIDATE
        $user = $request->validate([
            'email' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', Password::default()]
        ]);

        //ATTEMPT A LOGIN

        if (Auth::attempt($user))
        {
            $request->session()->regenerate();
            return redirect('/ideas');
        }
        return back()->withErrors([
            'email' => 'Provided Information is inavailable in our servers.'
        ]);

    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy()
    {
        Auth::logout();
        return redirect('/ideas');
    }
}
