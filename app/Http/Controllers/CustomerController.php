<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    public function reservations()
    {
        $reservations = Reservation::where("user_id", Auth::user()->id)->get();

        return view('dashboard.pages.client.reservations', compact('reservations'));
    }

    public function activities()
    {
        $activities = Activity::where("user_id", Auth::user()->id)->orderBy("id", "desc")->get();

        return view('dashboard.pages.client.activity', compact('activities'));
    }
}
