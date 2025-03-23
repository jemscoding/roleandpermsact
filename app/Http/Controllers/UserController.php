<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //
    public function showLoginForm() // show login form
    {
        return view('user.login'); //login.blade.php view
    }

    public function login(Request $request) //function for login for request email and password to login
    {
        $credentials = $request->only('email', 'password'); // get email and password to request

        if(Auth::attempt($credentials)) // check if credential values are correct
        {
            return redirect()->intended(''); // redirect to post after verifying
        }
            // redirect back to login page with an error message
            return back()->withErrors(['password' => 'Invalid Email or Password.']);
    }

    public function logout(Request $request) // function for logout user
    {
        Auth::logout(); // logout user

        $request->session()->invalidate(); // invalidate session

        $request->session()->regenerateToken(); // regenerate session token

        return redirect('/login'); // redirect to login page
    }

    public function showRegistrationForm() // directly show registration form
    {
        return view('user.register'); // Registration form - register.blade.php
    }

    public function register(Request $request) // function for registration
    {
        $validator = Validator::make($request->all(), [ // Validation rules
            'name' => 'required|string|max:255', // Check for name
            'email' => 'required|string|email|max:255|unique:users', // Check for unique email
            'password' => 'required|string|min:8|confirmed', // Password confirmation
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput(); // Return with validation errors
        }

        $user = User::create([ // Create the user
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password) // Hash the password!
        ]);

        Auth::login($user); // Optionally log the user in after registration

        return redirect('/login'); // Redirect to login page after successfully create account
    }

}
