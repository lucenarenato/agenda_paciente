<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(){
        return view('index');
    }

    public function login(){
        return view('auth.login');
    }

    public function register(){
        return view('auth.register');
    }    
}
