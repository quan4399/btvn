<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    function login(Request $request)
    {
        $email = $request->username;
        $password = $request->password;

        $data = [
            'email' => $email,
            'password' => $password
        ];

        if (Auth::attempt($data)) {
            return redirect()->route('home');
        } else {
            Session::flash('errorLogin', 'Tai khoan khong chinh xac');
            return redirect('login');
        }
    }

    function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('showFormLogin');
    }
}
