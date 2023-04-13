<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Lodgment;
use App\Models\LodgmentType;
use App\Models\Town;
use App\Models\User;

class HomeController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth')->except(['home', 'service', 'lodgment', 'about', 'contact']);
    }
    public function index()
    {
        $lodgment = Lodgment::where('id', 1)->first();
        $lodgments = Lodgment::where('state', 1)->get();
        $lodgment_number = Lodgment::all()->count();

        $users_number = User::all()->count();
        return view('client.pages.index', compact('lodgment_number', 'users_number', 'lodgment', 'lodgments'));
    }

    public function contact()
    {
        return view('client.pages.contact');
    }

    public function about()
    {
        $lodgment_number = 500;

        $users_number = 160;
        return view('client.pages.about', compact('lodgment_number', 'users_number'));
    }

    public function lodgment()
    {
        $types = LodgmentType::all();
        $cities = City::all();
        $towns = Town::all();
        return view('client.pages.lodgment', compact('types', 'cities', 'towns'));
    }

    public function service()
    {
        return view('client.pages.service');
    }

    public function details($slug)
    {
        $lodgment = Lodgment::where('slug', $slug)->first();

        return view('client.pages.lodgment.details', compact('lodgment'));
    }
}
