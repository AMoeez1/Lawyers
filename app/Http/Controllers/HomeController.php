<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $client = Auth::guard('client')->user();
        $allUser = User::all();
        return view('home', ['client' => $client, 'AllUsers' => $allUser]);
    }
    public function profile()
    {
        $client = Auth::guard('client')->user();
        if($client){
            return view('profile', ['client' => $client]);
        } else{
            return redirect()->route('home');
        }
    }

}
