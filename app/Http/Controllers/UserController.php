<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\User;

class UserController extends Controller
{
    public function login(){
        return view('login');
        
    }

    public function register(){
        return view('registration');
    }

    public function loginPost(Request $req){
        $req->validate([
            'email'=>'required|email',
            'password'=>'required'
        ]);

    
    $credentials = $req->only('email','password');
    if(UserAuth::attempt($credentials)){
        return redirect()->intended(route('home'));
    }
        return redirect(route('login'))->with('error','login details are not valid');
}


    public function registerPost(Request $req){
        $req->validate([
            'name'=>'required',
            'email'=>'required|email',
            'password'=>'required'
        ]);
        $data['name']= $req->name;
        $data['email']= $req->email;
        $data['email']=$req->password;
        $user= User::create($data);


        if(!$user){
            return redirect(route('register'))->with('error','Register details are not valid');
        }
        return redirect(route('login'));

    }

    function logout(){
        Session::flush();
        User::logout();
        return redirect(route('login'));
    }







    
}
