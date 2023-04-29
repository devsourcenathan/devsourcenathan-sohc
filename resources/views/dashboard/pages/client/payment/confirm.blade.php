@extends('dashboard.partials.main')


@section('content')
    <section class="section">
        
      <div class="row">
        <div class="col-lg-6 card">
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
        </div>
        <div class="col-lg-5 offset-1 card">
            <div class="card-body profile-overview" id="profile-overview">
                <h5 class="card-title">Paiement du logement</h5>
                <h6 class="mb-4">
                    <span class="text-info">Veuillez effectuer un depot sur l'un des numeros suivant pour valider votre reservation</span>
                </h6>
                <form action="/dashboard/lodgments/confirm" method="POST">
                    @csrf
                    <div class="row g-3">
                        <div class="col-md-12">
                            <div class="form-floating">
                                <input type="text" name="id_ref" class="form-control" required id="id_ref">
                                <input type="hidden" name="id_lodgment" value="{{ $lodgment->id }}">
                                <input type="hidden" name="payment_id" value="{{ $payment->id }}">
                                <label for="name">Reference du depot</label>
                            </div>
                        </div>

                        <div class="col-12">
                            <button class="btn btn-success w-100 py-3"  type="submit">Finaliser le paiement</button>
                        </div>
                    </div>
                </form>

              </div>

        </div>


      </div>
    </section>

@endsection


