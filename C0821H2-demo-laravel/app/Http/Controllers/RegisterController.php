<?php

namespace App\Http\Controllers;

use App\Models\User;
use Dotenv\Validator;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'require|max:255',
            'email' => 'require|email|max:255|unique:users',//email la gia tri duy nhat a khong trung de dang nhap so sanh trong bang users
            'password' => 'require|min:6',
        ]);
    }

    public function create()
    {
        return view('register');
    }

//    public function store(array $data){
//
//        return User::create([
//            'name' => $data['name'],
//            'email' => $data['email'],
//            'role'=>0,
//            'password' => bcrypt($data['password']),
//        ]);
//    }

    public function store(Request $request)
    {
        $account = new User();
        $account->name = $request->name;
        $account->email = $request->email;
        $account->role = '2';
        $account->password = $request->password;

        $account->save();
        return redirect()->route('showFormLogin');
    }
}
