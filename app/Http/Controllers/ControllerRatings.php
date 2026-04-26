<?php

namespace App\Http\Controllers;

use App\Models\Barber;
use App\Models\Ratings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ControllerRatings extends Controller
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
        // dd($request);
        $request->validate([
            'stars' => 'required|integer',
            'comment' => 'required|string',
            'booking_id' => 'required|exists:bookings,id',
        ]);

        $user_id = Auth::user()->id;

        Ratings::create([
            'stars' => $request['stars'],
            'comment' => $request['comment'],
            'user_id' => $user_id,
            'barber_id' => $request['barber_id'],
            'booking_id' => $request['booking_id'],
        ]);
        $averageRating = Ratings::where('barber_id',  $request['barber_id'])
            ->avg('stars');
            $barber=Barber::find($request['barber_id']);
            $barber->rating=$averageRating;

          $barber->save();
        return redirect()->back()->with('success', 'Rating added successfully');
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
