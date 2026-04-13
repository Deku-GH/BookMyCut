<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Category;
use App\Models\Barber;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
{
    // ── Dashboard ────────────────────────────────────────────────
    public function dashboard()
    {
        $user     = Auth::user();
        $bookings = Booking::where('client_id', $user->id)
                           ->with(['service', 'barber.user'])
                           ->latest('date')
                           ->get();

        $nextBooking     = $bookings->where('status', 'pending')
                                    ->where('date', '>=', today())
                                    ->sortBy('date')
                                    ->first();

        $upcomingBookings = $bookings->where('status', 'pending')
                                     ->where('date', '>=', today());

        return view('client.dashboard', [
            'totalRdv'        => $bookings->count(),
            'upcomingCount'   => $upcomingBookings->count(),
            'pastCount'       => $bookings->where('status', 'done')->count(),
            'nextBooking'     => $nextBooking,
            'upcomingBookings'=> $upcomingBookings,
            'recentBookings'  => $bookings->take(6),
        ]);
    }

    // ── All bookings ─────────────────────────────────────────────
    public function rdvs()
    {
        $bookings = Booking::where('client_id', Auth::id())
                           ->with(['service', 'barber.user'])
                           ->latest('date')
                           ->paginate(10);

        return view('client.rdvs', compact('bookings'));
    }

    // ── Cancel booking ───────────────────────────────────────────
    public function cancelBooking($id)
    {
        $booking = Booking::where('id', $id)
                          ->where('client_id', Auth::id())
                          ->firstOrFail();

        $booking->update(['status' => 'cancelled']);

        return redirect()->route('client.dashboard')
                         ->with('success', '✦ Rendez-vous annulé avec succès.');
    }

    // ── Services list ────────────────────────────────────────────
    public function services(Request $request)
    {
        $categories = Category::withCount('services')->get();

        $query = Service::with('category')->where('active', true);

        if ($request->filled('category')) {
            $query->where('category_id', $request->category);
        }

        $services = $query->get();

        return view('client.services', compact('services', 'categories'));
    }

    // ── Barbers list ─────────────────────────────────────────────
    public function barbers()
    {
        $barbers = Barber::with(['user', 'services'])
                         ->withCount(['bookings', 'services'])
                         ->get();

        return view('client.barbers', compact('barbers'));
    }

    // ── Reservation form ─────────────────────────────────────────
    public function reservation(Request $request)
    {
        $services = Service::with('category')->where('active', true)->get();
        $barbers  = Barber::with(['user', 'services'])->get();
        $categories = Category::all();

        $selectedService = $request->filled('service')
            ? Service::find($request->service)
            : null;

        $selectedBarber  = $request->filled('barber')
            ? Barber::with('user')->find($request->barber)
            : null;

        return view('client.reservation', compact(
            'services', 'barbers', 'categories', 'selectedService', 'selectedBarber'
        ));
    }

    // ── Store reservation ────────────────────────────────────────
    public function storeReservation(Request $request)
    {
        $request->validate([
            'service_id' => 'required|exists:services,id',
            'barber_id'  => 'required|exists:barbers,id',
            'date'       => 'required|date|after_or_equal:today',
            'time'       => 'required',
        ]);

        Booking::create([
            'client_id'  => Auth::id(),
            'service_id' => $request->service_id,
            'barber_id'  => $request->barber_id,
            'date'       => $request->date,
            'time'       => $request->time,
            'status'     => 'pending',
        ]);

        return redirect()->route('client.dashboard')
                         ->with('success', '✦ Réservation confirmée ! Nous vous attendons.');
    }

    // ── Profil ───────────────────────────────────────────────────
    public function profil()
    {
        $totalRdv = Booking::where('client_id', Auth::id())->count();
        return view('client.profil', compact('totalRdv'));
    }

    public function updateProfil(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'firstname' => 'required|string|max:255',
            'lastname'  => 'required|string|max:255',
            'email'     => 'required|email|unique:users,email,' . $user->id,
            'telephone' => 'nullable|string|max:20',
            'password'  => 'nullable|min:8|confirmed',
        ]);

        $user->update([
            'firstname'  => $request->firstname,
            'lastname'   => $request->lastname,
            'email'      => $request->email,
            'telephone'  => $request->telephone,
        ]);

        if ($request->filled('password')) {
            $user->update(['password' => bcrypt($request->password)]);
        }

        return redirect()->route('client.profil')
                         ->with('success', '✦ Profil mis à jour avec succès !');
    }
}
