<?php
namespace App\Http\Controllers;

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
            'password' => 'required|min:4|confirmed'
        ]);
        $validate['password'] = Hash::make($validate['password']);
        $role = Role::find($validate['role_id']);
        // dd($role);
        $user = User::create($validate);
        $userId = $user->id;
        //    dd($role);

        if ($role->name == "Barber") {
            $barber = Barber::create([
                'user_id' => $userId,
            ]);
            //    dd($barber);
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

        return redirect()->route('welcome')->with('success', 'Logged out');
    }
}