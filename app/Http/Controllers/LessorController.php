<?php

namespace App\Http\Controllers;

use App\Models\Lodgment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LessorController extends Controller
{
    public function requests()
    {
        $requests = Lodgment::where("user_id", Auth::user()->id)->where('state', 0)->get();
        return view('dashboard.pages.lessor.requests', compact('requests'));
    }

    public function lodgment()
    {
        $lodgments = Lodgment::where("user_id", Auth::user()->id)->where('state', 1)->get();
        return view('dashboard.pages.lessor.requests', compact('lodgments'));
    }
}
