<?php

namespace App\Http\Controllers;

use App\Models\Lodgment;
use App\Models\User;

class HomeController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth')->except(['home', 'service', 'lodgment', 'about', 'contact']);
    }
    public function index()
    {
        $lodgment_number = Lodgment::all()->count();

        $users_number = User::all()->count();
        return view('client.pages.index', compact('lodgment_number', 'users_number'));
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
        return view('client.pages.lodgment');
    }

    public function service()
    {
        return view('client.pages.service');
    }
}
