<?php

namespace App\Http\Controllers;

use App\Models\User;
use Auth;
use Illuminate\Http\Request;

class ClController extends Controller
{
    public function index(){
        return view('Auth.login');
    }

    public function registerCl(Request $request){
        $validation = $request->validate([
            'name' => 'required|string',
            'email' => 'email|required|string',
            'password' => 'string|required|min: 8'
        ]);

        $user =  User::create([
            'name' => $validation['name'],
            'email' => $validation['email'],
            'password' => bcrypt($validation['password'])
        ]);

        // $token = $user->createToken('MyToken')->plainTextToken;
        // return redirect()->route('home', ['user' => $user]);
        return view('home', ['user' => $user]);
    }
    public function loginCl(Request $request){
        $credentials = $request->only('email', 'password');
        if(Auth::attempt($credentials)){
            $user = Auth::user();
            $token = $user->createToken('MyToken')->plainTextToken;
            return redirect()->route('/');
        } else{
            return response()->json(['message' => 'Invalid Credentials']);
        }
    }
}