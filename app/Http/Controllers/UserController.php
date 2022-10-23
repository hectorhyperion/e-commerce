<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use App\Models\UserTypes;
use Illuminate\Validation\Rules\Exists;
use log;


class UserController extends Controller
{
    //
    public function store(Request $request){

        $data = $request->validate([
            'name' =>'required|min:3',
            'email' =>['required', 'email', Rule::unique('users','email')],
            'phone'=>'required',
            'usertype'=>'required',
            'password' => 'required|confirmed|min:6|max:16'
            
        ]);
        //hash password
        $data['password'] = bcrypt($data['password']);
        //setting admin and user login fucntion
      
        
        $user = User::create($data);

        //login 
        auth()->login($user);

        return redirect('/')->with('message', 'User Created and logged in' ) ;    
    }
    //user login function
    public function verify(Request $request)
    {
        $data = $request->validate([
            'email' =>['required',' email'],
            'password'=>'required'
        ]);
        if (auth()->attempt($data)) {
            $request->session()->regenerate();
            if (Auth::id()) {
                if(Auth::user()->usertype=='1')
                {
                   return redirect('admin/Index');
                }
                else{
                   return redirect('users/dashboard');
                }
            }
        }
        return back()->withErrors(['errors'=>'Invalid Credentials']);
    }

    public function logout(Request $request)
    {
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/')->with('message', 'You Have Been Logged Out');
    }

}
