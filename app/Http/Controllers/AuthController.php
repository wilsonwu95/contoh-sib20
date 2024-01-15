<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //


    function viewRegister()
    {
        return view('auth.register');
    }

    function submitRegister(Request $request)
    {
        $user = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ];

        User::create($user);
        return redirect("login");
    }

    function viewLogin()
    {
        if (Auth::check()) {
            return redirect('/product');
        }
        return view("auth.login");
    }

    function submitLogin(Request $request)
    {
        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if (Auth::attempt($credentials)) {
            return redirect('/product');
        } else {
            return redirect('/login')->withErrors(['error' => "Email or password is invalid"]);
        }
    }

    function logout() 
    {
        Auth::logout();
        return redirect('/login');
    }
}
