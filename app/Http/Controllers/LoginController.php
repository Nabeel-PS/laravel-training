<?php

namespace App\Http\Controllers;

class LoginController 
{
    public function login()
    {
        return view("login");
    }
    public function doLogin()
    {
    $input  = [  
    "email"=> request("email"),
    "password"=> request("password")
    ];
   
     if(auth()->attempt($input,true))

     {
        // return "login success";
        return redirect()->route('home');
    }
    else
    {
        // return "login failed";

        return redirect()->route('login')->with('message', 'login failed');
    }
    }
    public function logout(){
        // return "logout";
        auth()->logout();
        return redirect()->route('login')->with('message', 'logout success');
        // return redirect()->route('login');
    }     

}

