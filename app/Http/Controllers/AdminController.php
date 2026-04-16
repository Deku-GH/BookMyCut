<?php

namespace App\Http\Controllers;

use App\Models\Barber;
use App\Models\Booking;
use App\Models\Category;
use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;

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
        $totalBookings =Booking::all()->count();
       $latestUsers=User::latest()->take(5)->get();
        $services = Service::latest()->take(5)->get();

        return view('admin.dashboard', compact('latestUsers','totalClients','totalBarbers','totalCategories','totalServices','totalBookings', 'services'));
    }

    // Users page
    public function users()
    {
        $users = User::all();

        return view('admin.users', compact('users'));
    }
public function updateuser($id){
    $user= User::find($id);
    $user->status = $user->status== 'Acteve'?'dexacteve':'Acteve';
    // dd($user);
    $user->save();

    return back()->with('success', 'Status updated');

}
    // Categories page
    public function categories()
    {
        $categories = Category::all();

        return view('admin.categories', compact('categories'));
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
        //
    }
}
