<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Galery;
use App\Models\Lodgment;
use App\Models\LodgmentType;
use App\Models\Reservation;
use App\Models\Town;
use App\Models\User;
use App\Models\Activity;
use App\Models\Config;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth')->except(['home', 'service', 'lodgment', 'about', 'contact']);
    }

    public function dashboard()
    {
        $demands = Lodgment::where(function ($query) {
            $query->where('state', 3)->orWhere('state', 4);
        })->get();

        $users = User::all();

        $reservations = Reservation::limit(10)->get();

        $activities = Activity::where('user_id', Auth::user()->id)->orderBy("id", 'desc')->limit(10)->get();

        return view('dashboard.dashboard', compact('demands', 'users', 'reservations', 'activities'));
    }

    public function index()
    {
        $lodgments = Lodgment::where('state', 1)->limit(6)->get();
        $lodgment_number = Lodgment::all()->count();

        $users_number = User::all()->count();
        return view('client.pages.index', compact('lodgment_number', 'users_number', 'lodgments'));
    }

    public function contact()
    {
        $config = Config::all()->last();
        return view('client.pages.contact', compact('config'));
    }

    public function about()
    {
        $lodgment_number = Lodgment::all()->count();

        $users_number = User::all()->count();
        return view('client.pages.about', compact('lodgment_number', 'users_number'));
    }

    public function lodgment()
    {
        $types = LodgmentType::where('state', 'active')->get();
        $cities = City::where('state', 'active')->get();
        $towns = Town::where('state', 'active')->get();
        $lodgments = Lodgment::where('state', 1)->get();
        return view('client.pages.lodgment', compact('types', 'cities', 'towns', 'lodgments'));
    }


    public function search(Request $request)
    {

        $types = LodgmentType::alwhere('state', 'active')->getl();
        $cities = City::where('state', 'active')->get();
        $towns = Town::where('state', 'active')->get();

        $lodgments = Lodgment::where(function ($query) use ($request) {
            $query->where('state', 1)->orWhere('type', $request->type)->orWhere('location', $request->location)->orWhere('town', $request->town)->orWhere('stars', $request->stars);
        })->get();

        // $lodgments = Lodgment::search()


        return view('client.pages.lodgment', compact('types', 'cities', 'towns', 'lodgments'));
    }

    public function service()
    {
        return view('client.pages.service');
    }

    public function details($slug, $id)
    {
        $lodgment = Lodgment::where('id', $id)->first();
        $images = Galery::where("lodgment_id", $lodgment->id)->get();
        return view('client.pages.lodgment.details', compact('lodgment', 'images'));
    }

    public function conditions()
    {
        return view('client.pages.condition');
    }

    public function policy()
    {
        $config = Config::all()->last();
        return view('client.pages.policy', compact('config'));
    }
}
