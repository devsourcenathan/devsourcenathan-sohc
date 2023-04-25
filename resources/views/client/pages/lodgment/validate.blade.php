@extends('client.partials.main')

<?php 

use App\Models\Config;

$config = Config::all()->last();

?>


@section('content')
            <!-- Page Header Start -->
            <div class="container-fluid page-header mb-5 p-0" style="background-image: url({{ asset('assets/img/carousel-1.jpg')}});">
                <div class="container-fluid page-header-inner py-5">
                    <div class="container text-center pb-5">
                        <h1 class="display-3 text-white mb-3 animated slideInDown">Reservation valide</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-center text-uppercase">
                                <li class="breadcrumb-item"><a href="/">Home</a></li>
                                <li class="breadcrumb-item text-white active" aria-current="page">Logement</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <!-- Page Header End -->
    
    
            <!-- About Start -->
            <div class="container-xxl py-5">
                <div class="container">
                    <div class="g-5">
                        <div class="col-lg-6">
                            <h4 class="mb-4">
                                <span class="text-primary text-uppercase">Votre reservation a ete prise en compte</span>
                            </h4>

                            <h6 class="mb-4">
                                <span class="text-info">Veuillez effectuer un depot sur l'un des numeros suivant pour valider votre reservation</span>
                            </h6>

                            <div class="g-5">
                                <div class="col-lg-5 col-md-12">
                                    <h6 class="section-title text-start text-primary text-uppercase mb-4">
                                        Orange Money
                                    </h6>
                                    <p class="mb-2">
                                        <i class="fa fa-phone-alt me-3"></i>{{ $config->om_number}}
                                    </p>
                                    <p class="mb-2">
                                        <i class="fa fa-user me-3"></i><span class="text-uppercase"> {{$config->om_name}} </span>
                                    </p>
                                </div>
                                <div class="col-lg-5 col-md-12">
                                    <h6 class="section-title text-start text-primary text-uppercase mb-4">
                                        Mobile Money
                                    </h6>
                                    <p class="mb-2">
                                        <i class="fa fa-phone-alt me-3"></i>{{ $config->momo_number}}
                                    </p>
                                    <p class="mb-2">
                                        <i class="fa fa-user me-3"></i><span class="text-uppercase"> {{$config->momo_name}}</span>
                                    </p>
                                </div>
                            </div>
                            

                            <form action="/payment/validate" method="POST">
                                @csrf
                                <div class="row g-3">
                                    <div class="col-md-12">
                                        <h6 class="mt-4">
                                            Saisir l'ID de la transaction
                                        </h6>
                                        <div class="form-floating">
                                            <input type="text" name="id_trans" class="form-control" id="id_trans" placeholder="Saisir l'ID de la transaction" required>
                                            <input type="hidden" name="id_lodgment" value="{{ $lodgment->id }}">
                                            <input type="hidden" name="id_reservation" value="{{ $reservation->id }}">
                                            <label for="id_trans">ID transaction</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button class="btn btn-success w-100 py-3"  type="submit">Confirmer la reservation</button>
                                    </div>
                                </div>
                            </form>
                            
                        </div>
                    </div>
                </div>
            </div>
            <!-- About End -->
    
@endsection