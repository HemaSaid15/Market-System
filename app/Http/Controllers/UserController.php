<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function register ()
    {
        return view('Users.register');
    }


    public function handleRegister (Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'address' => 'required|string|max:100',
            'email' => 'required|email|max:100',
            'password' => 'required|string|max:50|min:5',
        ]);

        $user = User::create([
            'name' => $request->name,
            'address' => $request->address,
            'email' => $request->email,
            'password' => Hash::make( $request->password ),
        ]);

        // login
        Auth::login($user);

        return redirect( route('home') );
    }

    public function login ()
    {
        return view('Users.login');
    }


    public function handleLogin (Request $request)
    {
        $request->validate([
            'email' => 'required|email|max:100',
            'password' => 'required|string|max:50|min:5',
        ]);

        $is_login = Auth::attempt([
            'email' => $request->email ,
            'password' => $request->password,
        ]);

        if (! $is_login)
        {
            return back();
        }
        return redirect( route('home') );
    }

    public function logout ()
    {
        Auth::logout();

        return redirect( route('home') );
    }


    public function index()
    {
        $users = User::all();

        return view('Users.index' , compact('users'));

    }
}
