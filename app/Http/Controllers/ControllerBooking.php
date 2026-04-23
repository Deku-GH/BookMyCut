<?php

namespace App\Http\Controllers;

use App\Models\Barber;
use Illuminate\Http\Request;

use App\Models\Booking;
use App\Models\Service;
use App\Models\TimeSlot;
use Illuminate\Support\Facades\Auth;

class ControllerBooking extends Controller
{
    /**
     * Display a listing of the resource.
     */


    public function planning()
    {
         $barber =Auth::user()->barber->id;
        $bookings = Booking::with(['timeSlot', 'service', 'user'])
            ->where('barber_id',$barber )
            ->where('status', 'confirmed')
            ->whereRelation('timeSlot', 'date', '>=', now()->startOfWeek()->toDateString())
            ->whereRelation('timeSlot', 'date', '<=', now()->endOfWeek()->toDateString())
            ->get();

        $bookings = $bookings->sortBy(fn($b) => $b->timeSlot->date);

        $result = [];

        foreach ($bookings->groupBy(fn($b) => $b->timeSlot->date) as $date => $dayBookings) {

            $formattedBookings = [];

            foreach ($dayBookings->sortBy(fn($b) => $b->timeSlot->start_time) as $booking) {

                $start = strtotime($booking->timeSlot->start_time);

                $formattedBookings[] = [
                    'start_time' => date('H:i', $start),
                    'end_time' => date('H:i', $start + ($booking->service->duration * 60)),
                    'client_name' => $booking->user->ferstname,
                    'service' => $booking->service->titre,
                    'status' => $booking->status,
                ];
            }

            $result[$date] = [
                'bookings' => $formattedBookings
            ];
        }

        return view('barber.planning', compact('result'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        $service = Service::with('barber.user')->find($id);

        // dd($service->barber->user->ferstname);
        return view('client.booking', compact('service'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'start_time' => 'required|date_format:H:i',
            'date' => 'required|date',
        ]);

        $check = TimeSlot::where('barber_id', $request->barber_id)
            ->where('date', $request->date)
            ->where('start_time', $request->start_time)
            ->exists();
                    // dd($check);
        if ($check) {
            return back()->withErrors([
                'start_time' => 'This time is already booked.'
            ]);
        }

        $time = TimeSlot::create([
            'start_time' => $request->start_time,
            'date' => $request->date,
            'barber_id' => $request->barber_id
        ]);

        $booking = Booking::create([
            'user_id' => $request->user_id,
            'barber_id' => $request->barber_id,
            'service_id' => $request->service_id,
            'time_slot_id' => $time->id,
        ]);
        // dd($booking);
        return redirect()->back()
            ->with('success', 'booking success ');


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
    public function updatebooking(Request $request ,int $id)
    {
    // dd($request);
        $booking = Booking::find($id);
        $booking->status = $request['status'];
        // dd($booking)
        $booking->save();

        return back()->with('success', 'Status updated');
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
