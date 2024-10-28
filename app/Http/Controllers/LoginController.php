<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //render login page
    public function login(){
        return view(
            'pages.login'
        );
    }


    public function authenticate(){
        $attributes = request()->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        if(auth()->attempt($attributes)){
            return redirect('dashboard');
        }

        return back()->withErrors([
            'email' => 'Your provided credentials could not be verified'
        ]);
    }

    public function destroy(){
        try{
            Auth::logout();
        }
        catch(Exception $e){
            return back()->with('message', "Something went wrong");
        }

        return redirect("/");
    }
}
