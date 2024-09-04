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
        $user = auth()->user();
        $client = Auth::guard('client')->user();
        if (!$user && !$client) {
            return view('auth.lawyer.register');
        } else{
            return redirect()->route('home');
        }
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
            'about' => 'required|max:150'
        ]);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'CNIC' => $request->CNIC,
            'proficiency' => $request->proficiency,
            'degree' => $request->degree,
            'about' => $request->about    
        ]);
        return redirect()->route('home', ['user' => $user]);
    }

    public function showLogin()
    {
        $user = auth()->user();
        $client = Auth::guard('client')->user();
        if (!$user && !$client) {
            return view('auth.lawyer.login');
        } else{
            return redirect()->route('home');
        }
    }

    public function login(Request $request){
        $credentials = $request->only('CNIC', 'email','password');
        if(Auth::attempt($credentials)){
            return redirect()->route('home');
        }
        return back()->withErrors([
            'credentials' => 'Invalid lawyer credentials',
        ]);
    }

    public function logout(){
        auth()->logout();
        return redirect()->route('home');
    }
}