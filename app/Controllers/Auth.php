<?php

namespace App\Controllers;

class Auth extends BaseController
{
    public function index()
    {
        if(session()->get('id') && session()->get('username') && session()->get('role')){
            return redirect()->to('/app/home.html'); 
       }
       $data['title']='W-Clashroom | Login';
       $data['js']='login.js';
       $data['css']='login.css';
       return view('auth/login',$data);
    }
    public function register()
    {
        if(session()->get('id') && session()->get('username') && session()->get('role')){
            return redirect()->to('/app/home.html'); 
       }
       $data['title']='W-Clashroom | Register';
       $data['js']='register.js';
       $data['css']='register.css';
       return view('auth/register',$data);
    }
}