<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    function login(Request $request){
        $username = $request->username;
        $password = $request->password;

        $data = [
          'email' =>$username,
          'password'=> $password
        ];

        if (Auth::attempt()) {
            return redirect()->route('home');
        } else {
            return redirect('login');
        }
    }
}
