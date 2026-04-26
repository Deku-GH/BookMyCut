<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Barber;
use App\Models\Booking;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
   


class ClientController extends Controller
{
    public function dashboard()
    {

        $services = Service::all();
        return view(
            'client.dashboard',
            compact('services')
        );

    }
    public function mybooking()
    {
        $bookings = booking::where('user_id', Auth::user()->id)
            ->where('status', 'pending')
            ->get();
        $bookingTermine = Booking::with('timeSlot', 'barber')
            ->where('user_id', Auth::id())
            ->where('status', 'confirmed')
            ->whereRelation(
                'timeSlot',
                'end_time',
                '<',
                now()->format('H:i')
            )
            ->whereDoesntHave('rating')
            ->get();
        // dd($bookingTermine);
        return view(
            'client.mybooking',
            compact('bookings', 'bookingTermine')
        );
    }
    public function profile()
    {

        return view("client.profile");
    }
    public function barbers()
    {
        $barbers = Barber::with('address', 'user')->get();
        // dd($barbers);
        return view('client.barber', compact('barbers'));
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
