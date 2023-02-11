<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\PasswordReset;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Throwable;

class RecoveryController extends Controller
{
    //
    public function passwordupdate(Request $request ,$token)
    {
        //handlling password submit form
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:6|confirmed',
        ]);


        try
{
    $password_reset =PasswordReset:: where('token', $request->token)->firstOrFail();

    $user_email = $password_reset->email;

        $user = User::where('email', $user_email)->firstOrFail();
        $user->password=Hash::make($request->password);

        $user->save();
          $id = PasswordReset::where('email', '=', $request->email);
        $id->delete();
        return redirect()->route('login')->with('status', 'Password Change Sucessfully');
}
// catch(Exception $e) catch any exception
catch(Throwable $e)
{
    return redirect()->back()->with('status', 'Link Expired Please Request for a new link');
}




}
}

