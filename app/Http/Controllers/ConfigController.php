<?php

namespace App\Http\Controllers;

use App\Models\Config;
use Illuminate\Http\Request;

class ConfigController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $configs = Config::all()->last();
        return view('dashboard.pages.configs.index', compact('configs'));
    }

    public function store(Request $request)
    {

        $configs = new Config();

        $configs->phone = $request->phone;
        $configs->contact_email = $request->contact_email;
        $configs->booking_email = $request->booking_email;
        $configs->tech_email = $request->tech_email;
        $configs->location = $request->location;

        $configs->save();

        return redirect('/configs');
    }
}
