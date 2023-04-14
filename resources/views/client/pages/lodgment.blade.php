@extends('client.partials.main')

@section('content')
            <!-- Page Header Start -->
            <div class="container-fluid page-header mb-5 p-0" style="background-image: url({{ asset('assets/img/carousel-1.jpg')}});">
                <div class="container-fluid page-header-inner py-5">
                    <div class="container text-center pb-5">
                        <h1 class="display-3 text-white mb-3 animated slideInDown">Nos Logements</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-center text-uppercase">
                                <li class="breadcrumb-item"><a href="/">Home</a></li>
                                <li class="breadcrumb-item text-white active" aria-current="page">Logements</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <!-- Page Header End -->

                    <!-- Booking Start -->
        <div class="container-fluid booking pb-5 wow fadeIn" data-wow-delay="0.1s">
            <div class="container">
                <form action="/search">
                    @csrf
                    @method('get')
                    <div class="bg-white shadow" style="padding: 35px;">
                        <div class="row g-2">
                            <div class="col-md-10">
                                <div class="row g-2">
                                    <div class="col-md-3">
                                        <select name="city" id="city" class="form-control" required>
                                            <option value="all" disabled selected>Ville</option>
                                            @forelse ($cities as $city)
                                            <option value="{{ $city->name}}">{{ $city->name}}</option>
                                            @empty
                                            <option value="null">Pas de ville disponible</option>
                                            @endforelse
                                            </select>
                                    </div>
                                    <div class="col-md-3">
                                        <select name="town" id="town" class="form-control" required>
                                            <option value="all" disabled selected>Quartier</option>
                                            @forelse ($towns as $town)
                                            <option value="{{ $town->name}}">{{ $town->name}}</option>
                                            @empty
                                            <option value="null">Pas de quartier disponible</option>
                                            @endforelse
                                            </select>
                                    </div>
                                    <div class="col-md-3">
                                        <select name="type" id="type" class="form-control" required>
                                            <option value="all" disabled selected>Type</option>
                                            @forelse ($types as $type)
                                            <option value="{{ $type->name}}">{{ $type->name}}</option>
                                            @empty
                                            <option value="null">Pas de type disponible</option>
                                            @endforelse
                                            </select>
                                    </div>
                                    <div class="col-md-3">
                                        <select class="form-select" name="stars">
                                            <option selected>Etoile</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <input type="submit" class="btn btn-primary w-100">Rechercher</input>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- Booking End -->


    <!-- Room Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h6 class="section-title text-center text-primary text-uppercase">
                Nos logements
            </h6>
            <h1 class="mb-5">
                Decouvrir Nos <span class="text-primary text-uppercase">logements</span>
            </h1>
        </div>
        <div class="row g-4">
            @foreach ($lodgments as $lodgment)
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="room-item shadow rounded overflow-hidden">
                    <div class="position-relative">
                        <img class="img-fluid" src="{{ Storage::url($lodgment->img_path)}}" alt="" />
                        <small class="position-absolute start-0 top-100 translate-middle-y bg-primary text-white rounded py-1 px-3 ms-4">{{$lodgment->price}} F/Mois</small>
                    </div>
                    <div class="p-4 mt-2">
                        <div class="d-flex justify-content-between mb-3">
                            <h5 class="mb-0">{{$lodgment->title}}</h5>
                            <div class="ps-2">
                                @for($j = 0; $j < $lodgment->stars; $j++)
                                    <small class="fa fa-star text-primary"></small>
                                @endfor
                            @for($i = 0; $i < 5 - $lodgment->stars; $i++)
                                <small class="fa fa-star text-default"></small>
                            @endfor
                            </div>
                        </div>
                        <div class="d-flex mb-3">
                            <small class="border-end me-3 pe-3"><i class="fa fa-bed text-primary me-2"></i>{{$lodgment->pieces}}</small>
                        </div>
                        <p class="text-body mb-3">
                            {{$lodgment->description}}
                        </p>
                        <div class="d-flex justify-content-between">
                            <a class="btn btn-sm btn-primary rounded py-2 px-4" href="{{"lodgment/$lodgment->slug/$lodgment->id"}}">Detail</a>
                            <a class="btn btn-sm btn-dark rounded py-2 px-4" href="">Reserver</a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

        </div>
    </div>
</div>
<!-- Room End -->

    
@endsection