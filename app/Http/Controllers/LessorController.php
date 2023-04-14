<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Lodgment;
use App\Models\LodgmentType;
use App\Models\Town;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LessorController extends Controller
{
    public function requests()
    {
        $requests = Lodgment::where("user_id", Auth::user()->id)->where(function ($query) {
            $query->where('state', 3)->orWhere('state', 4);
        })->get();
        return view('dashboard.pages.lessor.requests', compact('requests'));
    }

    public function lodgment()
    {
        $lodgments = Lodgment::where("user_id", Auth::user()->id)->where(function ($query) {
            $query->where('state', 1)->orWhere('state', 0);
        })->get();
        return view('dashboard.pages.lessor.lodgment', compact('lodgments'));
    }

    public function propose()
    {
        $types = LodgmentType::all();
        $cities = City::all();
        $towns = Town::all();
        return view('dashboard.pages.lessor.propose', compact('types', 'cities', 'towns'));
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
        $lodgment->town = $request->town;
        $lodgment->description = $request->description;
        $lodgment->user_id = $request->user_id;
        $lodgment->slug = preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', $request->title));
        $lodgment->img_path = $path;
        $lodgment->state = 3;

        $lodgment->save();

        return redirect('/lessor/propose');
    }

    public function details($slug, $id)
    {
        $lodgment = Lodgment::where('id', $id)->first();

        return view('dashboard.pages.lessor.details', compact('lodgment'));
    }

    public function publish($slug, $id)
    {
        $lodgment = Lodgment::where('id', $id)->first();
        $lodgment->state = 1;
        $lodgment->save();
        return view('dashboard.pages.lessor.details', compact('lodgment'));
    }

    public function unpublish($slug, $id)
    {
        $lodgment = Lodgment::where('id', $id)->first();
        $lodgment->state = 0;
        $lodgment->save();
        return view('dashboard.pages.lessor.details', compact('lodgment'));
    }

    public function cancel($slug, $id)
    {
        $lodgment = Lodgment::where('id', $id)->first();
        $lodgment->state = 5;
        $lodgment->save();

        $requests = Lodgment::where("user_id", Auth::user()->id)->where(function ($query) {
            $query->where('state', 3)->orWhere('state', 4);
        })->get();
        return view('dashboard.pages.lessor.requests', compact('requests'));
    }
}
