@extends('client.partials.main')
@section('content')
    <!-- Carousel Start -->
    <div class="container-fluid p-0 mb-5">
        <div id="header-carousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="w-100" src="{{ asset('assets/img/carousel-1.jpg') }}" alt="Image" />
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3" style="max-width: 700px">
                            <h6 class="section-title text-white text-uppercase mb-3 animated slideInDown">
                                Ethique - Transparence - Innovation
                            </h6>
                            <h5 class="display-3 text-white mb-4 animated slideInDown">
                                Ensemble concretisons tous vos projets
                            </h5>
                            <a href="/lodgment" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">Nos
                                logements</a>
                            {{-- <a href="" class="btn btn-light py-md-3 px-md-5 animated slideInRight">Book A Room</a> --}}
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="w-100" src="{{ asset('assets/img/carousel-2.jpg') }}" alt="Image" />
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3" style="max-width: 700px">
                            <h6 class="section-title text-white text-uppercase mb-3 animated slideInDown">
                                Ethique - Transparence - Innovation
                            </h6>
                            <h5 class="display-3 text-white mb-4 animated slideInDown">
                                Ensemble concretisons tous vos projets
                            </h5>
                            <a href="/lodgment"
                                class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">Decouvrir</a>
                            {{-- <a href="" class="btn btn-light py-md-3 px-md-5 animated slideInRight">Book A Room</a> --}}
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#header-carousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <!-- Carousel End -->

    <!-- About Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6">
                    <h6 class="section-title text-start text-primary text-uppercase">
                        A propos de nous
                    </h6>
                    <h1 class="mb-4">
                        Bienvenu sur
                        <span class="text-primary text-uppercase">ONLINe housing service</span>
                    </h1>
                    <div class="row g-3 pb-4">
                        <div class="col-sm-4 wow fadeIn" data-wow-delay="0.1s">
                            <div class="border rounded p-1">
                                <div class="border rounded text-center p-4">
                                    <i class="fa fa-hotel fa-2x text-primary mb-2"></i>
                                    <h2 class="mb-1" data-toggle="counter-up">{{ $lodgment_number }}</h2>
                                    <p class="mb-0">Logements</p>
                                </div>
                            </div>
                        </div>
                        {{-- <div class="col-sm-4 wow fadeIn" data-wow-delay="0.3s">
                        <div class="border rounded p-1">
                            <div class="border rounded text-center p-4">
                                <i class="fa fa-users-cog fa-2x text-primary mb-2"></i>
                                <h2 class="mb-1" data-toggle="counter-up">{{ $users_number }}</h2>
                                <p class="mb-0">Utilisateurs</p>
                            </div>
                        </div>
                    </div> --}}
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="row g-3">
                        <div class="col-6 text-end">
                            <img class="img-fluid rounded w-75 wow zoomIn" data-wow-delay="0.1s"
                                src="{{ asset('assets/img/about-1.jpg') }}" style="margin-top: 25%" />
                        </div>
                        <div class="col-6 text-start">
                            <img class="img-fluid rounded w-100 wow zoomIn" data-wow-delay="0.3s"
                                src="{{ asset('assets/img/about-2.jpg') }}" />
                        </div>
                        <div class="col-6 text-end">
                            <img class="img-fluid rounded w-50 wow zoomIn" data-wow-delay="0.5s"
                                src="{{ asset('assets/img/about-3.jpg') }}" />
                        </div>
                        <div class="col-6 text-start">
                            <img class="img-fluid rounded w-75 wow zoomIn" data-wow-delay="0.7s"
                                src="{{ asset('assets/img/about-4.jpg') }}" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->



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
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s"
                        style="height: 480px;margin-top: 15px">
                        <div class="room-item shadow rounded overflow-hidden">
                            <div class="position-relative">
                                <img class="img-fluid" src="/site/public{{ Storage::url($lodgment->img_path) }}"
                                    alt="" style="height: 200px; object-fit: cover;" />
                                <small
                                    class="position-absolute start-0 top-100 translate-middle-y bg-primary text-white rounded py-1 px-3 ms-4">{{ $lodgment->price }}
                                    F/Mois</small>
                            </div>
                            <div class="p-4 mt-2">
                                <div class="d-flex justify-content-between mb-3">
                                    <h5 class="mb-0">{{ $lodgment->title }}</h5>
                                    <div class="ps-2">
                                        @for ($j = 0; $j < $lodgment->stars; $j++)
                                            <small class="fa fa-star text-primary"></small>
                                        @endfor
                                        @for ($i = 0; $i < 5 - $lodgment->stars; $i++)
                                            <small class="fa fa-star text-default"></small>
                                        @endfor
                                    </div>
                                </div>
                                <div class="d-flex mb-3">
                                    <small class="border-end me-3 pe-3"><i
                                            class="fa fa-bed text-primary me-2"></i>{{ $lodgment->pieces }}</small>
                                </div>
                                <p class="text-body mb-3">
                                    {{ $lodgment->description }}
                                </p>
                                <div class="d-flex justify-content-between">
                                    <a class="btn btn-sm btn-primary rounded py-2 px-4"
                                        href="{{ "lodgment/$lodgment->slug/$lodgment->id" }}">Detail</a>
                                    <a class="btn btn-sm btn-dark rounded py-2 px-4"
                                        href="{{ "/booking/$lodgment->id" }}">Reserver</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

                <a href="/lodgment" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">Voir Plus de
                    logements</a>
            </div>
        </div>
    </div>
    <!-- Room End -->

    {{-- <!-- Service Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h6 class="section-title text-center text-primary text-uppercase">
                Nos Services
            </h6>
            <h1 class="mb-5">
                Decouvrir nos
                <span class="text-primary text-uppercase">Services</span>
            </h1>
        </div>
        <div class="row g-4">
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <a class="service-item rounded" href="">
                    <div class="service-icon bg-transparent border rounded p-1">
                        <div class="w-100 h-100 border rounded d-flex align-items-center justify-content-center">
                            <i class="fa fa-hotel fa-2x text-primary"></i>
                        </div>
                    </div>
                    <h5 class="mb-3">Rooms & Appartment</h5>
                    <p class="text-body mb-0">
                        Erat ipsum justo amet duo et elitr dolor, est duo duo eos
                        lorem sed diam stet diam sed stet lorem.
                    </p>
                </a>
            </div>
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.2s">
                <a class="service-item rounded" href="">
                    <div class="service-icon bg-transparent border rounded p-1">
                        <div class="w-100 h-100 border rounded d-flex align-items-center justify-content-center">
                            <i class="fa fa-utensils fa-2x text-primary"></i>
                        </div>
                    </div>
                    <h5 class="mb-3">Food & Restaurant</h5>
                    <p class="text-body mb-0">
                        Erat ipsum justo amet duo et elitr dolor, est duo duo eos
                        lorem sed diam stet diam sed stet lorem.
                    </p>
                </a>
            </div>
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                <a class="service-item rounded" href="">
                    <div class="service-icon bg-transparent border rounded p-1">
                        <div class="w-100 h-100 border rounded d-flex align-items-center justify-content-center">
                            <i class="fa fa-spa fa-2x text-primary"></i>
                        </div>
                    </div>
                    <h5 class="mb-3">Spa & Fitness</h5>
                    <p class="text-body mb-0">
                        Erat ipsum justo amet duo et elitr dolor, est duo duo eos
                        lorem sed diam stet diam sed stet lorem.
                    </p>
                </a>
            </div>
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.4s">
                <a class="service-item rounded" href="">
                    <div class="service-icon bg-transparent border rounded p-1">
                        <div class="w-100 h-100 border rounded d-flex align-items-center justify-content-center">
                            <i class="fa fa-swimmer fa-2x text-primary"></i>
                        </div>
                    </div>
                    <h5 class="mb-3">Sports & Gaming</h5>
                    <p class="text-body mb-0">
                        Erat ipsum justo amet duo et elitr dolor, est duo duo eos
                        lorem sed diam stet diam sed stet lorem.
                    </p>
                </a>
            </div>
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                <a class="service-item rounded" href="">
                    <div class="service-icon bg-transparent border rounded p-1">
                        <div class="w-100 h-100 border rounded d-flex align-items-center justify-content-center">
                            <i class="fa fa-glass-cheers fa-2x text-primary"></i>
                        </div>
                    </div>
                    <h5 class="mb-3">Event & Party</h5>
                    <p class="text-body mb-0">
                        Erat ipsum justo amet duo et elitr dolor, est duo duo eos
                        lorem sed diam stet diam sed stet lorem.
                    </p>
                </a>
            </div>
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.6s">
                <a class="service-item rounded" href="">
                    <div class="service-icon bg-transparent border rounded p-1">
                        <div class="w-100 h-100 border rounded d-flex align-items-center justify-content-center">
                            <i class="fa fa-dumbbell fa-2x text-primary"></i>
                        </div>
                    </div>
                    <h5 class="mb-3">GYM & Yoga</h5>
                    <p class="text-body mb-0">
                        Erat ipsum justo amet duo et elitr dolor, est duo duo eos
                        lorem sed diam stet diam sed stet lorem.
                    </p>
                </a>
            </div>
        </div>
    </div>
</div>
<!-- Service End --> --}}
@endsection
