<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\City;
use App\Models\Config;
use App\Models\Galery;
use App\Models\Lodgment;
use App\Models\LodgmentType;
use App\Models\Payment;
use App\Models\Reservation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Image;

class LodgmentController extends Controller
{
    //

    public function index()
    {
        $lodgments = Lodgment::where(function ($query) {
            $query->where('state', 1)->orWhere('state', 0);
        })->get();;
        return view('dashboard.pages.lodgments.index', compact('lodgments'));
    }

    public function booking($id)
    {
        $lodgment = Lodgment::where('id', $id)->first();
        $images = Galery::where("lodgment_id", $lodgment->id)->get();
        return view('client.pages.lodgment.reservation', compact('lodgment', 'images'));
    }

    public function create()
    {
        $types = LodgmentType::where('state', 'active')->get();
        $cities = City::where('state', 'active')->get();
        return view('dashboard.pages.lodgments.create', compact('types', 'cities'));
    }

    public function update(Lodgment $lodgment)
    {
        $types = LodgmentType::where('state', 'active')->get();
        $cities = City::where('state', 'active')->get();

        return view('dashboard.pages.lodgments.update', compact('lodgment', 'types', 'cities'));
    }

    public function show(Lodgment $lodgment)
    {
        $images = Galery::where("lodgment_id", $lodgment->id)->get();
        return view('dashboard.pages.lodgments.details', compact('lodgment', 'images'));
    }

    public function publish($id)
    {
        $lodgment = Lodgment::find($id);
        $lodgment->state = 1;
        $lodgment->save();

        $activity = new Activity();
        $activity->title = "Publication d'un de logement";
        $activity->user_id = Auth::user()->id;
        $activity->save();

        $images = Galery::where("lodgment_id", $lodgment->id)->get();
        return view('dashboard.pages.lodgments.details', compact('lodgment', 'images'));
    }

    public function unpublish(Lodgment $lodgment)
    {
        $lodgment->state = 0;
        $lodgment->save();
        $images = Galery::where("lodgment_id", $lodgment->id)->get();

        $activity = new Activity();
        $activity->title = "Supression en ligne logement";
        $activity->user_id = Auth::user()->id;
        $activity->save();
        return view('dashboard.pages.lodgments.details', compact('lodgment', 'images'));
    }

    public function reject(Lodgment $lodgment)
    {
        $lodgment->state = 4;
        $lodgment->save();

        $activity = new Activity();
        $activity->title = "Rejet d'une demande de logement";
        $activity->user_id = Auth::user()->id;
        $activity->save();


        return view('dashboard.pages.lodgments.details', compact('lodgment'));
    }

    public function requests()
    {
        $lodgments = Lodgment::where(function ($query) {
            $query->where('state', 3)->orWhere('state', 4);
        })->get();
        return view('dashboard.pages.requests.index', compact('lodgments'));
    }

    public function reservations()
    {
        $reservations = Reservation::all();
        return view('dashboard.pages.reservations.index', compact('reservations'));
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

        $image = $request->file('image');
        // $input['imagename'] = time().'.'.$image->extension();

        $destinationPath = public_path('/storage/lodgments');
        $img = Image::make($image->path());
        $name = $img->resize(400, 400, function ($constraint) {
            $constraint->aspectRatio();
        })->save($destinationPath . '/' . $filename);

        $lodgment = new Lodgment();
        $lodgment->title = $request->title;
        $lodgment->price = $request->price;
        $lodgment->reservation_price = $request->reservation_price;
        $lodgment->description = $request->description;
        $lodgment->details = $request->details;
        $lodgment->pieces = $request->pieces;
        $lodgment->location = $request->location;
        $lodgment->type = $request->type;
        $lodgment->description = $request->description;
        $lodgment->user_id = $request->user_id;
        $lodgment->slug = preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', $request->title));
        $lodgment->img_path = 'lodgments/' . $name->basename;
        $lodgment->state = 1;
        $lodgment->save();

        $last = Lodgment::latest()->first();

        // $images = $request->file('images');
        $path = public_path('/storage/galery');


        foreach ($request->file('images') as $image) {

            $galery = new Galery();

            $filename = random_int(100000, 999999) . time() . '.' . $request->image->extension();

            $img = Image::make($image->path());
            $name = $img->resize(400, 400, function ($constraint) {
                $constraint->aspectRatio();
            })->save($path . '/' . $filename);

            $galery->lodgment_id = $last->id;
            $galery->image_path = 'galery/' . $name->basename;

            $galery->save();
        }

        $activity = new Activity();
        $activity->title = "Enregistrement d'un logement";
        $activity->user_id = Auth::user()->id;
        $activity->save();

        return redirect('/lodgments');
    }

    public function updateLodgment(Request $request)
    {
        $lodgment = Lodgment::find($request->id_lodgment);
        $lodgment->title = $request->title;
        $lodgment->price = $request->price;
        $lodgment->reservation_price = $request->reservation_price;
        $lodgment->description = $request->description;
        $lodgment->details = $request->details;
        $lodgment->pieces = $request->pieces;
        $lodgment->location = $request->location;
        $lodgment->type = $request->type;
        $lodgment->description = $request->description;
        $lodgment->user_id = $request->user_id;
        $lodgment->slug = preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', $request->title));
        $lodgment->state = 1;
        $lodgment->save();

        // $images = $request->file('images');
        $path = public_path('/storage/galery');

        if ($request->images != null) {

            foreach ($request->file('images') as $image) {

                $galery = new Galery();

                $filename = random_int(100000, 999999) . time() . '.' . $image->extension();

                $img = Image::make($image->path());
                $name = $img->resize(400, 400, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($path . '/' . $filename);

                $galery->lodgment_id = $request->id_lodgment;
                $galery->image_path = 'galery/' . $name->basename;

                $galery->save();
            }
        }

        $activity = new Activity();
        $activity->title = "Modification d'un logement";
        $activity->user_id = Auth::user()->id;
        $activity->save();

        return redirect('/lodgments');
    }

    public function buy($id)
    {
        $lodgment = Lodgment::find($id);

        return view('dashboard.pages.client.payment.buy', compact('lodgment'));
    }

    public function confirm_buy(Request $request)
    {


        $payment = new Payment();

        $lodgment = Lodgment::find($request->id_lodgment);

        // $payment->price = $request->price;
        $payment->month = $request->number;
        $payment->price = $request->total_price;
        $payment->user_id = Auth::user()->id;
        $payment->lodgment_id = $request->id_lodgment;

        $payment->save();

        $payment = Payment::all()->last();

        $activity = new Activity();
        $activity->title = "Paiement d'un loyer ";
        $activity->user_id = Auth::user()->id;
        $activity->save();

        $user = User::find($payment->user_id);
        $details = [
            'title' => 'Mail from Online Housing Company',
            'body' => 'Votre paiement a été enregistré'
        ];

        Mail::to($user->email)->send(new \App\Mail\NotifyMail($details));

        $config = Config::all()->last();

        return view('dashboard.pages.client.payment.confirm', compact('lodgment', 'config', 'payment'));
    }

    public function confirm(Request $request)
    {
        $payment = Payment::find($request->payment_id);

        $payment->id_ref = $request->id_ref;

        $payment->save();

        $activity = new Activity();
        $activity->title = "Confirmation d'un paiement (depot)";
        $activity->user_id = Auth::user()->id;
        $activity->save();

        $user = User::find($payment->user_id);
        $details = [
            'title' => 'Mail from Online Housing Company',
            'body' => 'Votre paiement a été confirmé'
        ];

        Mail::to($user->email)->send(new \App\Mail\NotifyMail($details));

        return view('dashboard.pages.client.payment.result');
    }

    public function payments()
    {
        $payments = Payment::all();

        return view('dashboard.pages.payments.index', compact('payments'));
    }

    public function reject_payment($id)
    {
        $payment = Payment::find($id);

        $payment->state = 'rejected';

        $payment->save();

        $payments = Payment::all();

        $user = User::find($payment->user_id);
        $details = [
            'title' => 'Mail from Housing Online Company',
            'body' => 'Votre payment a été rejeté'
        ];

        Mail::to($user->email)->send(new \App\Mail\NotifyMail($details));

        return view('dashboard.pages.payments.index', compact('payments'));
    }

    public function validate_payment($id)
    {
        $payment = Payment::find($id);

        $payment->state = 'approved';

        $payment->save();


        $user = User::find($payment->user_id);
        $details = [
            'title' => 'Mail from Housing Online Company',
            'body' => 'Votre payment a été approuvé'
        ];


        Mail::to($user->email)->send(new \App\Mail\NotifyMail($details));

        $payments = Payment::all();

        return view('dashboard.pages.payments.index', compact('payments'));
    }
}
