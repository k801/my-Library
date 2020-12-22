<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthControl extends Controller
{


    public function register()
    {
return view('Auth/register');
    }




    public function registerData(Request $request)
    {


$data=$request->validate([

         'name'=>'required|string|max:20',
         'email'=>'required|email',
         'password'=>'required|confirmed|min:5'

]);

  $data['password']=Hash::make($data['password']);

   User::create($data);



   return redirect('login');
}


public function getLoginForm()
{

    return view('Auth/loginForm');
}



public function loginData(Request $request)
{

    $request->validate([

        'email'=>'required|email',
        'password'=>'required'

]);

$isLogin=Auth::attempt(['email' => $request->email, 'password' => $request->password]);
if($isLogin)
{

return redirect('books');
}else{

    return redirect('login');

}
}



public function logout()
{

    Auth::logout();

    return redirect('login');
}

}
