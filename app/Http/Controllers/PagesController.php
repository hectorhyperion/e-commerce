<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\User;
use App\Models\UserTypes;
use Illuminate\Http\Request;
use Spatie\FlareClient\View;
use Illuminate\Support\Facades\Auth;

class PagesController extends Controller
{
    //
    public function index()
    {
        if(Auth::id())
        {
            return redirect()->back();
        }
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
         public function adminIndex(){
                      return view('admin/Index');
            
        } 
        public function contact(){
            return view('users.contact');
        }
        public function dashboard(){
                return view('users.dashboard');
         
        }
        //show category 
        public function category(){
            $data= Category::all();
            return view('admin.view-category', compact('data'))->with('no',1);
        }
        //show category edit page
        public function categoryEdit($id)
        {
                       $data = Category::find($id);
                    return view('admin.edit_category',compact('data'));
        }
}

