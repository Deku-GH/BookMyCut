<?php
namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Barber;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{

    public function showRegister()
    {
        $role = Role::where('name', '!=', 'admin')->get();

        return view('Auth.register', compact('role'));
    }


    public function register(Request $request)
    {
        $validate = $request->validate([
            'ferstname' => 'required|string|max:191',
            'lastname' => 'required|string|max:191',
            'email' => 'required|email|unique:users',
            'telephone' => 'required',
            'role_id' => 'required',
            'password' => 'required|min:4|confirmed',
            'photo' => 'required|image|mimes:jpg,jpeg,png|max:2048'
        ]);
        $validate['password'] = Hash::make($validate['password']);
        $role = Role::find($validate['role_id']);
         if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $name = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('photo', $name,'public');

            $validate['photo'] = $path;
        }
        $user = User::create($validate);
        $userId = $user->id;

        if ($role->name == "Barber") {
            $barber = Barber::create([
                'user_id' => $userId,
            ]);
            $request->validate([
                'city' => 'required|string|max:191',
                'street' => 'required|string|max:191',
                'zip' => 'required|string|max:10',
            ]);
            $address = Address::create([
                'barber_id' => $barber->id,
                'city' => $request->city,
                'street' => $request->street,
                'code_post' => $request->zip,
            ]);
        }
       

        Auth::login($user);

        return match ($role->name) {
            'Barber' => redirect()->route('barber.dashboard'),
            'Admin' => redirect()->route('admin.dashboard'),
            default => redirect()->route('client.dashboard'),
        };
    }


    public function showLogin()
    {
        return view('auth.login');
    }


    public function login(Request $request)
    {   
        // dd($request);
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (!Auth::attempt($credentials)) {
            return back()->withErrors([
                'email' => 'Invalid credentials'
            ])->withInput();
        }

        $request->session()->regenerate();

        $user = Auth::user();
        // dd($user->status);
        if ($user->status != "Acteve") {
            Auth::logout();

            return back()->withErrors([
                'email' => 'Your account is inactive'
            ]);
        }
        $role = $user->role;
        return match ($role->name) {

            'Barber' => redirect()->route('barber.dashboard'),
            'Admin' => redirect()->route('admin.dashboard'),
            default => redirect()->route('client.dashboard'),
        };
    }


    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('welcome');
    }
}