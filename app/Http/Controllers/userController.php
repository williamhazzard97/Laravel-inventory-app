<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Validation\Rule;

class userController extends Controller
{
    //Show register/create form
    public function create() {
        return view('register');
    }

    //Create new user
    public function store(Request $request) {
        $formFields = $request->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => 'required | confirmed | min:6'
        ]);

        //Hash password
        $formFields['password'] = bcrypt($formFields['password']);

        $user = User::create($formFields);

        //Login
        auth()->login($user);

        return redirect('/')->with('message', 'User created and logged in');
    }
}
