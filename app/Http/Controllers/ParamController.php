<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\City;
use App\Models\LodgmentType;
use App\Models\Town;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

        $activity = new Activity();
        $activity->title = "Ajout d'une ville";
        $activity->user_id = Auth::user()->id;
        $activity->save();

        return redirect('/cities');
    }

    public function store_town(Request $request)
    {
        $town = new Town();

        $town->name = $request->name;

        $town->save();

        $activity = new Activity();
        $activity->title = "Ajout d'un quartier";
        $activity->user_id = Auth::user()->id;
        $activity->save();

        return redirect('/towns');
    }

    public function store_type(Request $request)
    {
        $type = new LodgmentType();

        $type->name = $request->name;

        $type->save();

        $activity = new Activity();
        $activity->title = "Ajout d'un type de logement";
        $activity->user_id = Auth::user()->id;
        $activity->save();

        return redirect('/types');
    }


    public function types()
    {
        $types = LodgmentType::all();
        return view('dashboard.pages.params.type', compact('types'));
    }

    public function hide_city($id)
    {
        $city = City::find($id);

        $city->state = 'disabled';
        $city->save();

        $cities = City::all();

        $activity = new Activity();
        $activity->title = "Masquer une ville";
        $activity->user_id = Auth::user()->id;
        $activity->save();

        return view('dashboard.pages.params.city', compact('cities'));
    }

    public function show_city($id)
    {
        $city = City::find($id);

        $city->state = 'active';
        $city->save();

        $cities = City::all();

        $activity = new Activity();
        $activity->title = "Afficher une ville";
        $activity->user_id = Auth::user()->id;
        $activity->save();

        return view('dashboard.pages.params.city', compact('cities'));
    }

    public function hide_town($id)
    {
        $town = Town::find($id);

        $town->state = 'disabled';
        $town->save();

        $towns = Town::all();

        $activity = new Activity();
        $activity->title = "Masquer une quartier";
        $activity->user_id = Auth::user()->id;
        $activity->save();

        return view('dashboard.pages.params.town', compact('towns'));
    }

    public function show_town($id)
    {
        $town = Town::find($id);

        $town->state = 'active';
        $town->save();

        $towns = Town::all();

        $activity = new Activity();
        $activity->title = "Afficher un quartier";
        $activity->user_id = Auth::user()->id;
        $activity->save();

        return view('dashboard.pages.params.town', compact('towns'));
    }

    public function hide_type($id)
    {
        $type = LodgmentType::find($id);

        $type->state = 'disabled';
        $type->save();

        $types = LodgmentType::all();

        $activity = new Activity();
        $activity->title = "Masquer un type de logement";
        $activity->user_id = Auth::user()->id;
        $activity->save();

        return view('dashboard.pages.params.type', compact('types'));
    }

    public function show_type($id)
    {
        $type = LodgmentType::find($id);

        $type->state = 'active';
        $type->save();

        $types = LodgmentType::all();

        $activity = new Activity();
        $activity->title = "Afficher un type de logement";
        $activity->user_id = Auth::user()->id;
        $activity->save();

        return view('dashboard.pages.params.type', compact('types'));
    }
}
