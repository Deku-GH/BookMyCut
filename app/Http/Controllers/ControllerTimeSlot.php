<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Timeslot;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ControllerTimeSlot extends Controller
{
    public function index()
    {
        $timeslots = Timeslot::where('barber_id', Auth::user()->barber->id)->get();
        $categories =Category::all();
        // dd($timeslots);
        return view('barber.timeslots', compact('timeslots','categories'));
    }

    public function create()
    {
        $barbers = User::where('role', 'barber')->get();
        return view('timeslots.create', compact('barbers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'barber_id' => 'required',
            'day' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
        ]);

        Timeslot::create([
            'barber_id' => $request->barber_id,
            'day' => $request->day,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
        ]);

        return redirect()->back()->with('success', 'Timeslot created successfully');
    }

    public function edit(string $id)
    {
        $timeslot = Timeslot::findOrFail($id);
        $barbers = User::where('role', 'barber')->get();

        return view('timeslots.edit', compact('timeslot', 'barbers'));
    }

    public function update(Request $request, string $id)
    {
        $timeslot = Timeslot::findOrFail($id);

        $request->validate([
            'barber_id' => 'required',
            'day' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
        ]);

        $timeslot->update([
            'barber_id' => $request->barber_id,
            'day' => $request->day,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
        ]);

        return redirect()->back()->with('success', 'Timeslot updated successfully');
    }

    public function destroy(string $id)
    {
        $timeslot = Timeslot::findOrFail($id);
        $timeslot->delete();

        return redirect()->back()->with('success', 'Timeslot deleted successfully');
    }
}