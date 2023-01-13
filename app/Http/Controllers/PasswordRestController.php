<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;

class PasswordRestController extends Controller
{
    //
    public function resetPassword(Request $request)
    {
        //checking if email exist
        $request->validate(['email' => 'required|email']);
        //sending password reset link to one email
        $status = Password::sendResetLink(
            $request->only('email')
        );
        //returning errors or success message
        return $status === Password::RESET_LINK_SENT
                ? back()->with(['status' => __($status)])
                : back()->withErrors(['email' => __($status)]);
    }

    public function passwordreset($token)
    {
        //sending link from mail to view
        return view('verification.reset-password', ['token' => $token]);
    }
    public function passwordupdate(Request $request, $token)
    {
        //handlling password submit form
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:6|confirmed',
        ]);
        //reseting password and updating users tables
        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));

                $user->save();
                event(new PasswordReset($user));
            }
        );
        //returning error of success message
        return $status === Password::PASSWORD_RESET
                ? redirect()->route('login')->with('status', __($status))
                : back()->withErrors(['errors' => [__($status)]]);
    }
}
