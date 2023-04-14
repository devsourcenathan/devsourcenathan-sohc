<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Lodgment;
use App\Models\LodgmentType;
use App\Models\Town;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth')->except(['home', 'service', 'lodgment', 'about', 'contact']);
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
        $lodgments = Lodgment::where('state', 1)->get();
        return view('client.pages.lodgment', compact('types', 'cities', 'towns', 'lodgments'));
    }


    public function search(Request $request)
    {

        $types = LodgmentType::all();
        $cities = City::all();
        $towns = Town::all();


        $type = $request->type;
        $location = $request->location;
        $town = $request->town;
        $stars = $request->stars;

        $lodgments = Lodgment::all();

        // $lodgments = Lodgment::where(function ($query) {
        //     $query->where('state', 1)->orWhere('type', $request->type)->orWhere('location', $request->location)->orWhere('town', $request->town)->orWhere('stars', $request->stars);
        // })->get();

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

        return view('client.pages.lodgment.details', compact('lodgment'));
    }
}
