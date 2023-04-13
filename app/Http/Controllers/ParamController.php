<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\LodgmentType;
use App\Models\Town;
use Illuminate\Http\Request;

class ParamController extends Controller
{
    public function cities()
    {
        $cities = City::all();
        return view('dashboard.pages.params.city', compact('cities'));
    }

    public function create_city()
    {
        return view('dashboard.pages.params.create_city');
    }

    public function towns()
    {
        $towns = Town::all();
        return view('dashboard.pages.params.town', compact('towns'));
    }

    public function create_town()
    {
        return view('dashboard.pages.params.create_town');
    }

    public function create_type()
    {
        return view('dashboard.pages.params.create_type');
    }

    public function store_city(Request $request)
    {
        $city = new City();

        $city->name = $request->name;

        $city->save();

        return redirect('/cities');
    }

    public function store_town(Request $request)
    {
        $town = new Town();

        $town->name = $request->name;

        $town->save();

        return redirect('/towns');
    }

    public function store_type(Request $request)
    {
        $type = new LodgmentType();

        $type->name = $request->name;

        $type->save();

        return redirect('/types');
    }


    public function types()
    {
        $types = LodgmentType::all();
        return view('dashboard.pages.params.type', compact('types'));
    }
}
