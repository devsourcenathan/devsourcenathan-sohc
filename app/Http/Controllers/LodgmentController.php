<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Lodgment;
use App\Models\LodgmentType;
use Illuminate\Http\Request;

class LodgmentController extends Controller
{
    //

    public function index()
    {
        $lodgments = Lodgment::all();
        return view('dashboard.pages.lodgments.index', compact('lodgments'));
    }

    public function create()
    {
        $types = LodgmentType::all();
        $cities = City::all();
        return view('dashboard.pages.lodgments.create', compact('types', 'cities'));
    }

    public function show(Lodgment $lodgment)
    {
        return view('dashboard.pages.lodgments.details', compact('lodgment'));
    }

    public function publish(Lodgment $lodgment)
    {
        $lodgment->state = 1;
        return view('dashboard.pages.lodgments.details', compact('lodgment'));
    }

    public function unpublish(Lodgment $lodgment)
    {
        $lodgment->state = 0;
        return view('dashboard.pages.lodgments.details', compact('lodgment'));
    }

    public function reject(Lodgment $lodgment)
    {
        $lodgment->state = 3;
        return view('dashboard.pages.lodgments.details', compact('lodgment'));
    }

    public function requests()
    {
        $lodgments = Lodgment::where('state', 2)->get();
        return view('dashboard.pages.requests.index', compact('lodgments'));
    }

    public function reservations()
    {
        return view('dashboard.pages.reservations.index');
    }

    public function cities()
    {
        return view('dashboard.pages.params.city');
    }

    public function types()
    {
        return view('dashboard.pages.params.type');
    }

    public function store(Request $request)
    {

        $filename = time() . '.' . $request->image->extension();

        $path = $request->file('image')->storeAs(
            'lodgments',
            $filename,
            'public'
        );

        $lodgment = new Lodgment();
        $lodgment->title = $request->title;
        $lodgment->price = $request->price;
        $lodgment->description = $request->description;
        $lodgment->details = $request->details;
        $lodgment->pieces = $request->pieces;
        $lodgment->location = $request->location;
        // $lodgment->location = $request->location;
        $lodgment->description = $request->description;
        $lodgment->user_id = $request->user_id;
        $lodgment->slug = preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', $request->title));
        $lodgment->img_path = $path;

        $lodgment->save();

        return redirect('/lodgments');
    }
}
