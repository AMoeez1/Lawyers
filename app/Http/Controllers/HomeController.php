<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Posts;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $client = Auth::guard('client')->user();
        $allUser = User::inRandomOrder()->limit(3)->get();
        $posts = Posts::all();
        $lawyer = auth()->user();
        return view('home', ['client' => $client, 'AllUsers' => $allUser, 'lawyer' => $lawyer, 'posts' => $posts]);
    }

    public function showPost(){
        return view('post');
    }
    public function post(Request $request){
        $validation = $request->validate([
            'title' => 'required',
            'details' => 'required|max:150',
            'price' => 'required'
        ]);
            $client = auth()->guard('client')->user();
            if (!$client) {
                return redirect()->back()->withErrors(['msg' => 'You must be logged in to create a post.']);
            }
            Posts::create([  
                'email' => $client->email,
                'title' => $request->title,
                'details' => $request->details,
                'price' => $request->price
            ]);
            return redirect()->route('home');
    }

    // function bookLawyer(Request $request, $id){
    //     $user = User::find($id);

    // }

}
