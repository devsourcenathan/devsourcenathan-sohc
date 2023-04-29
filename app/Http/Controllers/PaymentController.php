<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Lodgment;
use App\Models\Reservation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;

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
        $lodgment = Lodgment::find($request->id_lodgment);

        $reservation = new Reservation();
        $reservation->lodgment_id = $request->id_lodgment;
        $reservation->price = $lodgment->reservation_price;
        $reservation->phone = $request->phone;
        $reservation->message = $request->message;
        $reservation->date = $request->date;
        $reservation->user_id = Auth::user()->id;

        $reservation->save();

        $activity = new Activity();
        $activity->title = "Reservation d'un logement";
        $activity->user_id = Auth::user()->id;
        $activity->save();

        // $lodgment = Lodgment::find($request->id_lodgment);

        $user = User::find($reservation->user_id);
        $details = [
            'title' => 'Mail from House Online Company',
            'body' => 'Votre demande de reservation a été enregistré'
        ];

        Mail::to($user->email)->send(new \App\Mail\NotifyMail($details));


        return view('client.pages.lodgment.validate', compact('reservation', 'lodgment'));
    }

    public function confirm(Request $request)
    {
        $reservation = Reservation::find($request->id_reservation);
        $reservation->id_trans = $request->id_trans;

        $reservation->save();


        $activity = new Activity();
        $activity->title = "Confirmation d'une reservation";
        $activity->user_id = Auth::user()->id;
        $activity->save();
        return redirect('/dashboard/reservations');
    }

    public function confirmed($id)
    {
        $reservation = Reservation::find($id);

        $reservation->state = "approved";

        $reservation->save();

        $user = User::find($reservation->user_id);
        $details = [
            'title' => 'Mail from House Online Company',
            'body' => 'Votre demande de reservation a été rejeté'
        ];

        Mail::to($user->email)->send(new \App\Mail\NotifyMail($details));

        return redirect("/reservations");
    }

    public function reject($id)
    {
        $reservation = Reservation::find($id);

        $reservation->state = "rejected";
        $reservation->save();

        $user = User::find($reservation->user_id);
        $details = [
            'title' => 'Mail from House Online Company',
            'body' => 'Votre demande de reservation a été approuvé'
        ];

        Mail::to($user->email)->send(new \App\Mail\NotifyMail($details));

        return redirect("/reservations");
    }
}
