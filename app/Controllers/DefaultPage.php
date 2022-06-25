<?php

namespace App\Controllers;

class DefaultPage extends BaseController
{
    public function index()
    {
        if(session()->get('id') && session()->get('username') && session()->get('role')){
            return redirect()->to('/app/home.html'); 
       }
       $data['title']='W-Clashroom | Home';
       $data['js']='home.js';
       $data['css']='home.css';
       return view('defaultPage/home',$data);
    }
}