<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Galery;
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
        $lodgment_number = Lodgment::all()->count();

        $users_number = User::all()->count();
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

        $lodgments = Lodgment::where(function ($query) use ($request) {
            $query->where('state', 1)->where('type', $request->type)->where('location', $request->location)->where('town', $request->town)->where('stars', $request->stars);
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
}
