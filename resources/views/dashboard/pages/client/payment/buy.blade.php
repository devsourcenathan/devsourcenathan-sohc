@extends('dashboard.partials.main')


@section('content')
    <section class="section">
      <div class="row">
        <div class="col-lg-6 card">
            <div class="card-body profile-overview" id="profile-overview">
                <h5 class="card-title">Description</h5>
                <p class="small fst-italic">
                    {{$lodgment->description}}
                </p>

                <h5 class="card-title">Informations du logement</h5>

                <div class="row">
                    <div class="col-lg-3 col-md-4 label">Prix</div>
                    <div class="col-lg-9 col-md-8">{{$lodgment->price}} FCFA</div>
                </div>
                
                <div class="row">
                    <div class="col-lg-3 col-md-4 label">Standing</div>
                    <div class="col-lg-9 col-md-8">{{$lodgment->stars}} etoiles</div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label ">Nombre de pieces</div>
                  <div class="col-lg-9 col-md-8">{{$lodgment->pieces}}</div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Type de logement</div>
                  <div class="col-lg-9 col-md-8">{{$lodgment->type}}</div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Ville</div>
                  <div class="col-lg-9 col-md-8">{{$lodgment->location}}</div>
                </div>


                

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Etat</div>
                  <div class="col-lg-9 col-md-8">{{$lodgment->stars}}</div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Proprietaire</div>
                  <div class="col-lg-9 col-md-8">
                    @if ($lodgment->user->type === "admin")
                        SOHC
                    @else
                    {{$lodgment->user->name}}
                    @endif
                  </div>
                </div>

                <h5 class="card-title">Details</h5>
                <p class="small fst-italic">
                    {{$lodgment->details}}
                </p>


                <h5 class="card-title">Actions</h5>

                @if ($lodgment->state == 0)
                    
                <a href="publish/{{$lodgment->slug}}" type="button" class="btn btn-success rounded-pill">Publier</a>
                @elseif($lodgment->state == 1)
                <a href="unpublish/{{$lodgment->slug}}" type="button" class="btn btn-primary rounded-pill">Masquer</a>
                @elseif($lodgment->state == 3)
                <a href="reject/{{$lodgment->slug}}" type="button" class="btn btn-danger rounded-pill">Rejeter</a>
                <a href="publish/{{$lodgment->slug}}" type="button" class="btn btn-success rounded-pill">Approuver</a>
                @endif
                {{-- <button type="button" class="btn btn-danger rounded-pill">Supprimer</button> --}}
            

              </div>

        </div>

        <div class="col-lg-5 offset-1 card">
            <div class="card-body profile-overview" id="profile-overview">
                <h5 class="card-title">Paiement du logement</h5>
                <form action="/dashboard/lodgments/buy" method="POST">
                    @csrf
                    <div class="row g-3">
                        <div class="col-md-12">
                            <div class="form-floating">
                                <input type="number" name="price" class="form-control" disabled id="price" value="{{$lodgment->price}}">
                                <input type="hidden" name="id_lodgment" value="{{ $lodgment->id }}">
                                <label for="name">Prix / mois (FCFA)</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-floating">
                                <input type="number" name="number" class="form-control" id="number" min="1" value="1" required>
                                <label for="date">Nombre de mois</label>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-floating">
                                <input type="number" name="total_price" class="form-control" id="total_price" value="{{$lodgment->price}}" required>
                                <label for="total_price">Prix total</label>
                            </div>
                        </div>

                        <div class="col-12">
                            <button class="btn btn-success w-100 py-3"  type="submit">Poursuivre le paiement</button>
                        </div>
                    </div>
                </form>

              </div>

        </div>


      </div>
    </section>

    <script>
        const price = document.getElementById('price')
        const month = document.getElementById('number')
        const total_price = document.getElementById('total_price')

        month.addEventListener('input', (e) => {
            let current_price = +price.value;
            let current_month = +e.target.value;
            
        total_price.value = current_month * current_price
        })
    
        // console.log(price.value);
    </script>
@endsection


