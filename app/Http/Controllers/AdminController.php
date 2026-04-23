<?php

namespace App\Http\Controllers;

use App\Models\Barber;
use App\Models\Booking;
use App\Models\Category;
use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // Dashboard
    public function dashboard()
    {
        $totalClients = User::all()->count();
        $totalBarbers = Barber::all()->count();
        // dd( $totalBarbers );
        $totalCategories = Category::all()->count();
        $totalServices = Service::all()->count();
        $totalBookings = Booking::all()->count();
        $latestUsers = User::latest()->take(5)->get();
        $services = Service::latest()->take(5)->get();

        return view('admin.dashboard', compact('latestUsers', 'totalClients', 'totalBarbers', 'totalCategories', 'totalServices', 'totalBookings', 'services'));
    }

    // Users page
    public function users()
    {
        $users = User::all();

        return view('admin.users', compact('users'));
    }
    public function updateuser($id)
    {
        $user = User::find($id);
        $user->status = $user->status == 'Acteve' ? 'dexacteve' : 'Acteve';
        // dd($user);
        $user->save();

        return back()->with('success', 'Status updated');

    }
    // Categories page
    public function categories()
    {
        $categories = Category::withCount('services')->get();
        //   dd($categories);
        return view('admin.categories', compact('categories'));
    }
    public function profile()
    {

        return view("admin.profile");
    }
    public function updateProfile(Request $request)
    {
        $user = Auth::user();

        $data = $request->validate([
            'ferstname' => 'required|string|max:191',
            'lastname' => 'required|string|max:191',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'telephone' => 'required|string',
            'password' => 'nullable|min:4|confirmed'
            ]);
            
            // dd($request);
        $user->ferstname = $data['ferstname'];
        $user->lastname = $data['lastname'];
        $user->email = $data['email'];
        $user->telephone = $data['telephone'];


        if (!empty($data['password'])) {
            $user->password = Hash::make($data['password']);
        }
        //   dd($data);
        $user->save();

        return back()->with('success', 'Profil mis à jour ✅');
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $user = Auth::user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('success', 'Your account has been deleted');

    }
}
