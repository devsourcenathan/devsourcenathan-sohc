<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class PaymentController extends Controller
{
    public function initialize(Request $request)
    {


        // $response = Http::withHeaders([
        //     'Accept' => 'application/json',
        //     'Authorization' => 'b.KyH8x667RmILBmQ8xDWy2alZHwPPIuVA'
        // ])->post("https://api.notchpay.co/payments/initialize", [
        //     'email' => Auth::user()->email,
        //     'phone' => $request->phone,
        //     'name' => Auth::user()->name,
        //     'customer_id' => Auth::user()->id,
        //     'amount' => $request->amount,
        //     'currency' => "FCFA",
        //     'description' => "Lodgment reservation to sohc.cm",
        //     'callback' => "http://127.0.0.1:8000/lodgments"
        // ]);


        $reservation = new Reservation();
        $reservation->lodgment_id = $request->id_lodgment;
        $reservation->price = 5000;
        $reservation->phone = $request->phone;
        $reservation->message = $request->message;
        $reservation->date = $request->date;
        $reservation->user_id = Auth::user()->id;

        $reservation->save();

        $activity = new Activity();
        $activity->title = "Reservation d'un logement";
        $activity->user_id = Auth::user()->id;
        $activity->save();

        return view('client.pages.lodgment.validate', compact('reservation'));
    }
}
