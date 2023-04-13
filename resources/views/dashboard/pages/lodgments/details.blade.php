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
                  <div class="col-lg-9 col-md-8">{{$lodgment->location}}</div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Ville</div>
                  <div class="col-lg-9 col-md-8">{{$lodgment->type}}</div>
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

                @if ($lodgment->state)
                    
                <a href="publish/{{$lodgment->slug}}" type="button" class="btn btn-success rounded-pill">Publier</a>
                @else
                <a href="unpublish/{{$lodgment->slug}}" type="button" class="btn btn-primary rounded-pill">Masquer</a>
                    
                @endif
                {{-- <button type="button" class="btn btn-danger rounded-pill">Supprimer</button> --}}
            

              </div>

        </div>

        <div class="col-lg-6">


              <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img src="{{ Storage::url($lodgment->img_path)}}" class="d-block w-100" alt="...">
                  </div>
                  <div class="carousel-item">
                    <img src="{{ Storage::url($lodgment->img_path)}}" class="d-block w-100" alt="...">
                  </div>
                  <div class="carousel-item">
                    <img src="{{ Storage::url($lodgment->img_path)}}" class="d-block w-100" alt="...">
                  </div>
                </div>

                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Next</span>
                </button>

              </div>


        </div>
      </div>
    </section>
@endsection