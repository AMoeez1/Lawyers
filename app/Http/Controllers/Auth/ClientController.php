<?php
namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use App\Models\Client;
use Auth;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function showRegister()
    {
        return view('auth.client.register');
    }


    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'email|required|unique:clients,email',
            'password' => 'required|min:8'
        ]);

        $client = Client::create([
            "name" => $request->name,
            "email" => $request->email,
            "password" => bcrypt($request->password)
        ]);

        Auth::guard('client')->login($client);

        return redirect()->route('home');
    }

    public function showLogin()
    {
        return view('auth.client.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        
        if (Auth::guard('client')->attempt($credentials)) {
            return redirect()->route('home');
        }

        return back()->withErrors([
            'credentials' => 'Invalid user credentials',
        ]);
    }
}