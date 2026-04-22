<?php

namespace App\Http\Controllers;

use App\Models\Barber;
use Illuminate\Http\Request;

use App\Models\Booking;
use App\Models\Service;
use App\Models\TimeSlot;

class ControllerBooking extends Controller
{
    /**
     * Display a listing of the resource.
     */


    public function planning()
    {
        $bookings = Booking::with(['timeSlot', 'service', 'user'])
            ->where('barber_id', auth()->id())
            ->whereRelation('timeSlot', 'date', '>=', now()->startOfWeek()->toDateString())
            ->whereRelation('timeSlot', 'date', '<=', now()->endOfWeek()->toDateString())
            ->orderBy('id')
            ->get();

        $result = [];

        foreach ($bookings->groupBy(function ($b) {
            return optional($b->timeSlot)->date;
        }) as $date => $dayBookings) {

            $formattedBookings = $dayBookings->map(function ($b) {

                $start = strtotime($b->timeSlot->start_time);
                $duration = $b->service->duration ?? 30;
                $end = $start + ($duration * 60);

                return [
                    'start_time' => date('H:i', $start),
                    'end_time' => date('H:i', $end),
                    'client_name' => $b->user->name ?? 'Client',
                    'service' => $b->service->name ?? 'Service',
                    'status' => $b->status,
                ];
            })->values()->toArray();

            $result[$date] = [
                'bookings' => $formattedBookings
            ];
        }
        // dd($result);
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
        //    dd($request->barber_id);


        $request->validate([
            'start_time' => 'required|date_format:H:i',
            'date' => 'required|date',
        ]);
        
        $time = TimeSlot::create([
            'start_time' => $request['start_time'],
            'date' => $request['date'],
            'barber_id' => $request['barber_id']
            ]);
            $booking = Booking::create([
                'user_id'=>$request['user_id'],
                'barber_id' => $request['barber_id'],
                'service_id' => $request['service_id'],
                'time_slot_id'=> $time->id,
                
                
                ]);
                dd($booking);

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
    public function updatebooking( $id)
    {
          $booking = Booking::find($id);
        $booking->status = $booking->status == 'confirmed' ? 'canceled' : 'confirmed';
        // dd($booking);
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
