<?php

namespace App\Http\Controllers;

use App\Models\Lodgment;
use App\Models\Reservation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function customers()
    {

        $customers = User::where('type', 'client')->orderBy('name', 'asc')->get();
        return view('dashboard.pages.customers.index', compact('customers'));
    }

    public function lessors()
    {

        $lessors = User::where('type', 'lessor')->orderBy('name', 'asc')->get();
        return view('dashboard.pages.lessors.index', compact('lessors'));
    }

    public function users()
    {

        $users = User::where('type', 'admin')->orderBy('name', 'asc')->get();
        return view('dashboard.pages.users.index', compact('users'));
    }

    public function customer_details($id)
    {
        $customer = User::find($id);
        $reservations = Reservation::where("user_id", $id)->get();
        return view('dashboard.pages.customers.details', compact('customer', 'reservations'));
    }

    public function lessor_details($id)
    {
        $lessor = User::find($id);
        $lodgments = $lodgments = Lodgment::where("user_id", $lessor->id)->where(function ($query) {
            $query->where('state', 1)->orWhere('state', 0);
        })->get();

        $requests = Lodgment::where("user_id", $lessor->id)->where(function ($query) {
            $query->where('state', 3)->orWhere('state', 4);
        })->get();
        return view('dashboard.pages.lessors.details', compact('lessor', 'lodgments', 'requests'));
    }

    public function user_details($id)
    {
        $user = User::find($id);

        $lodgments = $lodgments = Lodgment::where("user_id", $user->id)->where(function ($query) {
            $query->where('state', 1)->orWhere('state', 1);
        })->get();
        return view('dashboard.pages.users.details', compact('user', 'lodgments'));
    }

    public function profile()
    {
        return view('dashboard.pages.profile');
    }
}
