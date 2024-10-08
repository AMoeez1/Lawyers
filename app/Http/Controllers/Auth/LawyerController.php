<?php
namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use App\Mail\LawyersEmail;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class LawyerController extends Controller
{

    public function showRegister()
    {
        $user = auth()->user();
        $client = Auth::guard('client')->user();
        if (!$user && !$client) {
            return view('auth.lawyer.register');
        } else {
            return redirect()->route('home');
        }
    }


    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8',
            'CNIC' => 'required',
            'proficiency' => 'required',
            'degree' => 'required',
            'about' => 'required'
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

        if ($user) {
            Auth::login($user);
            return redirect()->route('home', ['user' => $user]);
        }
        return back()->withErrors([
            'register' => "there's something wrong registering account. Make sure to fill all the fields"
        ]);
    }


    public function showLogin()
    {
        $user = auth()->user();
        $client = Auth::guard('client')->user();
        if (!$user && !$client) {
            return view('auth.lawyer.login');
        } else {
            return redirect()->route('home');
        }
    }

    public function login(Request $request)
    {
        $credentials = $request->only('CNIC', 'email', 'password');
        if ($credentials) {
            if (Auth::attempt($credentials)) {
                return redirect()->route('home', );
            } else {
                return back()->withErrors([
                    'credentials' => 'Invalid lawyer credentials',
                ]);
            }
        } else {
            return back()->withErrors(['Error' => 'Credentials cant be null']);
        }
    }

    public function logout()
    {
        auth()->logout();
        return redirect()->route('home');
    }

    public function profile($id)
    {
        $lawyer = User::find($id);
        if ($lawyer && $lawyer->id == $id) {
            return view('profile');
        } else {
            return redirect()->route('home');
        }
    }

    public function other_profile($id){
        $lawyer = User::find($id);
        $loggedUser = auth()->user();
        if($loggedUser && $loggedUser->id == $lawyer->id){
            return redirect()->route('lawyer.profile', ['id' => auth()->user()->id]);
        } else{
            return view('other_profile', ['user' =>$lawyer]);
        }
    }

    public function show_edit($id)
    {
        $user = User::find($id);
        if ($user && $user->id == $id) {
            return view('edit_Profile');
        } else {
            return redirect()->route('home');
        }
    }

    public function edit_profile(Request $request, $id)
    {
        $validate = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'CNIC' => 'required',
            'proficiency' => 'required',
            'degree' => 'required',
            'about' => 'required',
            'image' => 'required|mimes:jpg,png,jpeg,webp'
        ]);
        $user = User::find($id);
        if ($validate) {
            if ($user) {
                $user->name = $request->input(key: 'name');
                $user->email = $request->input('email');
                $user->CNIC = $request->input('CNIC');
                $user->proficiency = $request->input('proficiency');
                $user->degree = $request->input('degree');
                $user->about = $request->input('about');

                if ($request->hasFile('image')) {
                    if ($user->image) {
                        Storage::disk('public')->delete($user->image);
                    }
                    $img_path = $request->file('image')->store('lawyers', 'public');
                    $user->image = $img_path;
                }
                $user->save();
                return redirect()->route('lawyer.profile', ['id' => $user->id]);
            } else {
                return back()->withErrors(['Error' => 'No User Found']);
            }
        } else {
            return back()->withErrors(['Error' => 'Validation Failed']);
        }
    }

    public function removeProfile($id)
    {
        $user = User::find($id);
        if (!$user) {
            return back()->withErrors(['Error' => 'No User Found']);
        }

        if ($user->image) {
            $rem_img = Storage::disk('public')->delete($user->image);
            $user->image = null;
            $user->save();
            if ($rem_img) {
                return redirect()->route('lawyer.profile', ['id' => $user->id]);
            } else {
                return back()->withErrors(['Error' => 'Error Removing Image']);
            }
        }
    }

    public function sendEmail(){
        $message = 'Hello';
        $subject = 'Lawyers Connect';
        $toUser = auth()->user()->email;

        $mail = Mail::to($toUser)->send(new LawyersEmail($message, $subject));
        if($mail) {
            return redirect()->route('lawyer.profile', ['id' => auth()->user()->id])->with('response', 'Verification link sent');
        } else {
            return back()->withErrors(['Error' => 'Error Sending Mail']);
        }
    }

    public function verifyEmail(){
        $user = auth()->user();
        
        if($user) {
            $user->email_verified_at = now();
            $user->save();
            return redirect()->route('lawyer.profile', ['id'=> $user->id])->with('response', 'You are now Verified');
        } else {    
            return back()->withErrors(['Error' => 'Something Went Wrong Verifying']);
        }
    }
}