<?php 
namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;

class LawyerController extends Controller
{
    public function showRegister()
    {
        return view('auth.lawyer.register');
    }


    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8',
            'CNIC' => 'required|max:15|min:12',
            'proficiency' => 'required',
            'degree' => 'required',
        ]);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'CNIC' => $request->CNIC,
            'proficiency' => $request->proficiency,
            'degree' => $request->degree    
        ]);
        return redirect()->route('home', ['user' => $user]);
    }

    public function showLogin()
    {
        return view('auth.lawyer.login');
    }

    public function login(Request $request){
        $credentials = $request->only('CNIC', 'email','password');
        if(Auth::attempt($credentials)){
            return redirect()->route('home');
        }
    }
}