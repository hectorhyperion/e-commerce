<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\FlareClient\View;

class PagesController extends Controller
{
    //
    public function index()
    {
        return View('Index');
    }
    public function register(){
        return view('verification.register');
        }
        public function login(){
            return view('verification.login');
        }
        public function contact(){
            return view('users.contact');
        }
}

