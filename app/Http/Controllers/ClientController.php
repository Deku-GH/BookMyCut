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
       
        $services = Service::all();



        return view('client.dashboard', 
        compact('services'));
    }
}
