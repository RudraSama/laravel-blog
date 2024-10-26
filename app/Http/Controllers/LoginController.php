<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    //render login page
    public function login(){
        return view(
            'page.login'
        );
    }
}
