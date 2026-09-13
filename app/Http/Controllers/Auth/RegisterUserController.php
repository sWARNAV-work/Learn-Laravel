<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Hash; 
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class RegisterUserController extends Controller
{
    public function create()
    {
        return view('auth/register');
    }
    public function store(Request $request)
    {
        //Validate the request
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'], 
            'password' => ['required', Password::default()]
        ]);

        //store the details into db
        $user = User::create([
            'name' => request()->name,
            'email' => request()->email,
            'password' => Hash::make(request()->password)
        ]);

        //log in
        Auth::login($user);

        //redirect them back
        return redirect('/ideas');
    }
}
