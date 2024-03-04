<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    // REGISTER PAGE
    public function register(){
        return view('users.register');
    }
    //CREATE NEW USER
    public function store(Request $request){
        $formFields = $request->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email', Rule::unique('users','email')],
            'password' => 'required | confirmed|min:6'
        ]);
        // HASH PASSWORD
        $formFields['password'] = bcrypt($formFields['password']);
        // CREATE USER
        $user = User::create($formFields);
        // LOGIN
        auth()->login($user);

        return redirect('/')->with('message', 'User Created and logged In');
    }

    public function logout(Request $request){
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('home')->with('message', 'User Logged Out');
    }

    //LOGIN PAGE
    public function login(){
        return view('users.login');
    }

    // AUTHENTICATE USER
    public function authenticate(Request $request){
        $formFields = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        if(auth()->attempt($formFields)){
            $request->session()->regenerate();
            return redirect()->route('home')->with('message', 'User Logged In');
        }

        return back()->withErrors([
            'email' => 'Invalid Credentials',
        ])->onlyInput('email');
    }
}
