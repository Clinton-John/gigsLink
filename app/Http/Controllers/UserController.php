<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Auth\User;;

class UserController extends Controller
{
    public function create(){
        // show th register/create form
        return view('users.register');
    }
    
        // create a new user
    public function store(Request $request){
        $formFields = $request->validate([
            'name' => ['required', 'min:3'] ,
            'email' => ['required' , 'email' , Rule::unique('users' , 'email')] , // the email must be unique to the users table and to the email field
            'password' => 'required|confirmed|min:6' // confirmed makes sure that it matches another ffield 
        ]);

        // hashing the password using bcrypt
        $formFields['password'] = bcrypt($formFields['password']);

        // creating a user and automatically gets logged in
        $user = User::create($formFields);

        // login 
        auth()->login($user);
        return redirect('/')->with('message' , 'User created and loggedIn !'); // if it successfull then a user has been created successfully and a session has been started
    }

    
    public function logout(Request $request){
          auth()->logout(); // removes the authentication information from the users request

          $request->session()->invalidate();
          $request->session()->regenerateToken();

          return redirect('/')->with('message' , 'You have been logged out !'); 
    }


    public function login(){
               return view('users.login');
    }

    //authenticate user
    public function authenticate(Request $request){
        $formFields = $request->validate([
            'email' => ['required' , 'email'] , 
            'password' => 'required' // confirmed makes sure that it matches another ffield 
        ]);

        if(auth()->attempt($formFields)){
            $request->session()->regenerate();

            return redirect('/')->with('message' , 'You are logged in !');
        } 

        return back()->withErrors(['email' => 'invalid Credentials !'])->onlyInput('email');

    }
}



