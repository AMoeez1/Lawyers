<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Mail;
class ResetPasswordController extends Controller
{
    public function showPasswordForm(){
        return view("auth.client.forgetPassword");
    }

    public function forgetPassword(Request $request){
        $request->validate([
            'email' => 'required|email|exists:clients'
        ]);

        $token = Str::random(64);

        DB::table('password_reset_token')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => Carbon::now()
        ]);

        Mail::send('email.forgetPassword', ['token' => $token], function($message) use($request){
            
            $message->to($request->email);
              $message->subject('Reset Password');
        });
        
        return back()->with('message', 'We have e-mailed your password reset link!');
    }
}

