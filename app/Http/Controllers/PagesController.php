<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserTypes;
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
      if (User::where('usertype', '1')->exists()) 
      {
            $user= UserTypes::where('id', 2)->get();
      }
      else{
         $user = UserTypes:: all();
      }
       
        return view('verification.register', compact('user'));
        }
        public function login(){
            return view('verification.login');
        }
        public function contact(){
            return view('users.contact');
        }
}

