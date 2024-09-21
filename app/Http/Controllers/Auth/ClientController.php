<?php
namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use App\Models\Client;
use Auth;
use Illuminate\Http\Request;
use Storage;

class ClientController extends Controller
{
    public function showRegister()
    {
        $user = auth()->user();
        $client = Auth::guard('client')->user();
        if (!$user && !$client) {
            return view('auth.client.register');
        } else {
            return redirect()->route('home');
        }
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
        $user = auth()->user();
        $client = Auth::guard('client')->user();
        if (!$user && !$client) {
            return view('auth.client.login');
        } else {
            return redirect()->route('home');
        }
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

    public function logout()
    {
        Auth::guard('client')->logout();
        return redirect()->route('home');
    }

    public function profile($id)
    {
        $client = Auth::guard('client')->user();
        if ($client && $client->id == $id) {
            return view('profile', ['client' => $client]);
        } else {
            return redirect()->route('home');
        }
    }

    public function show_edit($id){
        $user = Client::find($id);
        if($user) {
            return view('edit_Profile');
        } else {
            return redirect()->route('home');
        }
    }

    public function edit_profile(Request $request, $id)
    {
        $validate = $request->validate([
            'name' => 'required',
            'email' => 'email|required|',
            'image' => 'required|mimes:jpg,png,jpeg,webp'
        ]);
        if ($validate) {
            $user = Client::find($id);
            if ($user) {
                $user->name = $request->input('name');
                $user->email = $request->input('email');
                if ($request->hasFile('image')) {
                    if ($user->image) {
                        Storage::disk('public')->delete($user->image);
                    }
                    $img_path = $request->file('image')->store('images', 'public');
                    $user->image = $img_path;
                } else {
                    return back()->withErrors(['Error' => 'No File Found']);
                }
                $user->save();
                return redirect()->route('client.profile', ['id' => $user->id]);
            } else {
                return back()->withErrors(['Error' => 'No user Found']);
            }
        } else {
            return back()->withErrors(['Error' => 'Validation Failed']);
        }
    }

    public function removeProfile($id) {
        $user = Client::find($id);
    
        if (!$user) {
            return back()->withErrors(['Error' => 'User not found']);
        }
    
        if ($user->image) {
            $removedImg = Storage::disk('public')->delete($user->image);
            $user->image = null;
            $user->save();
            if ($removedImg) {
                return redirect()->route('client.profile', ['id' => $user->id]);
            } else {
                return back()->withErrors(['Error' => 'Error Removing Img']);
            }
        }
    }
    
}