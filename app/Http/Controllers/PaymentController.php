<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class PaymentController extends Controller
{
    public function initialize(Request $request)
    {
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => env('PUBLIC_KEY')
        ])->post("https://api.notchpay.co/payments/initialize", [
            'email' => Auth::user()->email,
            'phone' => $request->phone,
            'name' => Auth::user()->name,
            'customer_id' => Auth::user()->id,
            'amount' => $request->amount,
            'currency' => "FCFA",
            'description' => "Lodgment reservation to sohc.cm",
            'callback' => "http://127.0.0.1:8000/lodgments"
        ]);

        dd($response);
    }
}
