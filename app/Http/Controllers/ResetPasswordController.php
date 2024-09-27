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
        $validate = $request->validate([
            'email' => 'required|email|exists:clients'
        ]);

        if($validate){
            $token = Str::random(64);
    
            DB::table('password_reset_token')->insert([
                'email' => $request->email,
                'token' => $token,
                'created_at' => Carbon::now()
            ]); 
    
            // Mail::send('email.forgetPassword', ['token' => $token], function($message) use($request){
                
            //     $message->to($request->email);
            //       $message->subject('Reset Password');
            // });
            return back()->withErrors('message', 'We have e-mailed your password reset link!');
            if (Mail::failures()) {
                return back()->withErrors(['Error' => 'Error Sending Mail']);
            }
        } else {
            return back()->withErrors(['Error' => 'Validation Failed']);
        }

        
    }
}

