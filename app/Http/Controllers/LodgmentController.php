<?php

namespace App\Http\Controllers;

use App\Models\Lodgment;
use Illuminate\Http\Request;

class LodgmentController extends Controller
{
    //

    public function index()
    {
        return view('dashboard.pages.lodgments.index');
    }

    public function requests()
    {
        return view('dashboard.pages.requests.index');
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
        $lodgment = new Lodgment();
        $lodgment->title = $request->title;
        $lodgment->price = $request->price;
        $lodgment->description = $request->description;
        $lodgment->details = $request->details;
        $lodgment->description = $request->description;
        $lodgment->user_id = $request->user_id;


        $lodgment->slug = str_replace(" ", "-", Str::lower($lodgment->title));

        $lodgment->save();

        return redirect('/lodgments');
    }
}
