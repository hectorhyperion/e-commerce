<?php

namespace App\Http\Controllers;

use Error;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Category;
use App\Mail\PasswordReset;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Mail;

use Illuminate\Support\Facades\Password;

class PasswordRestController extends Controller
{
    //
    public function resetPassword(Request $request)
    {
        //checking if email exist
        $formfields=    $request->validate(['email' => 'required|email|exists:users']);

        //generating random string
        $token= Str::random(100);

        //finding user email first
          $user = User::where('email', $formfields)->firstOrfail();
          //sending email if user email exist

        $this->sendmail($user, $token);

        //checking if user has already requesting token
        $userExists = DB::table('password_resets')->where('email', '=', $request->input('email'))->exists();


                //expire token
            $date=  now()->addminutes(15);


        if ($userExists) {
            //updating data if user already exist
            DB::table('password_resets')->update(['token' => $token, 'destroy_at' =>$date]);
        }

        else {

            //create new user token a
            DB::table('password_resets')->insert(['email' =>$request->email, 'token' => $token, 'created_at' => Carbon::now(),'destroy_at' =>$date ]);
        }


            return back()->with('message', 'A Password Reset Link Has Been Sent To Your Email');

        }

        public function sendmail($user, $token)
        {
                Mail::to($user)->send(new PasswordReset($token,$user));
                return back()->with('message', 'A Password Reset Link Has Been Sent To Your Email');
        }

        public function reset( $token)
        {


            $data = Category::all();
                return view('verification.reset-password', ['token' => $token], compact('data'));
        }
}
