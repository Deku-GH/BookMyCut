<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ControllerNotification extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $notifications = Notification::where('user_id', auth()->id())
            ->latest()
            ->get();

        return view('client.notifications', compact('notifications'));
    }
    public function send($id)
    {
        $booking = Booking::with('user')->find($id);
        if ($booking->status == 'confirmed') {

            Mail::raw(
                'Your booking has been confirmed.',
                function ($message) use ($booking) {

                    $message->to($booking->user->email)
                        ->subject('Booking Confirmed');
                }

            );

            return redirect()->route('notification.store', [
                'booking_id' => $booking->id
            ]);


        } elseif ($booking->status == 'cancelled') {

            Mail::raw(
                'Your booking has been cancelled.',
                function ($message) use ($booking) {

                    $message->to($booking->user->email)
                        ->subject('Booking Cancelled');
                }
            );
        }
        return back()->with('success', 'Email sent');

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


        $booking = Booking::with('timeSlot')->findOrFail($request->booking_id);

        $date = $booking->timeSlot->date;
        $time = $booking->timeSlot->end_time;

        $sendTime = date('Y-m-d H:i:s', strtotime($date . ' ' . $time . ' -15 minutes'));

        Notification::create([
            'user_id' => $booking->user_id,
            'booking_id' => $booking->id,
            'message' => 'Reminder: your booking is soon.',
            'send_time' => $sendTime,
            'is_sent' => false,
        ]);

        return redirect()->route('barber.dashboard')
            ->with('success', 'Reminder created successfully');

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
