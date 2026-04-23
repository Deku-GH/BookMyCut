<?php

namespace App\Http\Controllers;

use App\Models\Barber;
use App\Models\Booking;
use App\Models\Category;
use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ControllerBarber extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function dashboard()
    {
        $barber =Auth::user()->barber->id;
        // dd($barber);
        $todayBookings = Booking::whereDate('created_at', now())->count();
        $totalServices = Service::where('barber_id', $barber )->count();

        $totalBookings = Booking::where('barber_id',  $barber )->count();

        $bookings = Booking::with(['user', 'service', 'timeSlot'])
            ->where('barber_id',$barber) 
            ->where('status','pending') 
            ->get();
             
        return view('barber.dashboard', compact(
            'todayBookings',
            'totalServices',
            'totalBookings',
            'bookings'
        ));
    }

    public function profile()
    {
        $bookings = Booking::where('barber_id', Auth::user()->barber->id)->get();
        // dd($bookings);
        return view("barber.profile", compact('bookings'));
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
    public function destroy(Request $request)
    {
        $user = Auth::user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('success', 'Your account has been deleted');
    }
}
