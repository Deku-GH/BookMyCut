<?php

namespace App\Http\Controllers;

use App\Models\Barber;
use App\Models\Booking;
use App\Models\Category;
use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;

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
        $todayBookings = Booking::whereDate('created_at', now())->count();
        $totalServices = Service::count();
        $totalBookings = Booking::count();

        $bookings = Booking::with(['user', 'service', 'timeSlot'])
            ->latest()
            ->take(5)
            ->get();

        return view('barber.dashboard', compact(
            'todayBookings',
            'totalServices',
            'totalBookings',
            'bookings'
        ));
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
