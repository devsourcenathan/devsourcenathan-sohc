<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Config;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ConfigController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $configs = Config::find(1);
        return view('dashboard.pages.configs.index', compact('configs'));
    }

    public function store(Request $request)
    {

        $configs = Config::find(1);

        $configs->phone = $request->phone;
        $configs->contact_email = $request->contact_email;
        $configs->booking_email = $request->booking_email;
        $configs->tech_email = $request->tech_email;
        $configs->location = $request->location;

        $configs->om_name = $request->om_name;
        $configs->om_number = $request->om_number;
        $configs->momo_name = $request->momo_name;
        $configs->momo_number = $request->momo_number;

        $configs->update();

        $activity = new Activity();
        $activity->title = "Modification des parametres du site";
        $activity->user_id = Auth::user()->id;
        $activity->save();


        return redirect('/configs');
    }
}
