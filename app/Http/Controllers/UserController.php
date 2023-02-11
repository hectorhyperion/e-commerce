<?php

namespace App\Http\Controllers;

use log;
use App\Models\User;
use App\Models\UserTypes;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Exists;


class UserController extends Controller
{
    //
    public function store(Request $request){

        $data = $request->validate([
            'name' =>'required|min:3',
            'email' =>['required', 'email', Rule::unique('users','email')],
            'phone'=>'required',
            'address'=>'required',
            'usertype'=>'required',
            'password' => 'required|confirmed|min:6|max:16'
        ]);
        //hash password
        $data['password'] =Hash::make($data['password']);
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
                if(Auth::user()->usertype=='admin')
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
