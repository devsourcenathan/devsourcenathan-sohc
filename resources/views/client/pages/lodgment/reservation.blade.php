@extends('client.partials.main')

@section('content')
            <!-- Page Header Start -->
            <div class="container-fluid page-header mb-5 p-0" style="background-image: url({{ asset('assets/img/carousel-1.jpg')}});">
                <div class="container-fluid page-header-inner py-5">
                    <div class="container text-center pb-5">
                        <h1 class="display-3 text-white mb-3 animated slideInDown">{{ $lodgment->title}}</h1>
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
                    <div class="row g-5 align-items-center">
                        <div class="col-lg-6">
                            <h1 class="mb-4"><span class="text-primary text-uppercase">{{ $lodgment->title}}</span></h1>

                            <h6 class="section-title text-start text-primary text-uppercase">Description</h6>
                            <p class="mb-4">{{ $lodgment->description}}</p>

                            <h6 class="section-title text-start text-primary text-uppercase">Reservation</h6>
                            <form action="/payment/initialize" method="POST">
                                @csrf
                                <div class="row g-3">
                                    <div class="col-md-12">
                                        <div class="form-floating">
                                            <input type="tel" class="form-control" id="phone" placeholder="Numero de telephone">
                                            <label for="name">Numero de telephone</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-floating">
                                            <input type="date" class="form-control" id="date" placeholder="Date">
                                            <label for="subject">Date</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-floating">
                                            <textarea class="form-control" placeholder="Leave a message here" id="message" style="height: 150px">
                                                Bonjour je souhaire reserver ce logement
                                            </textarea>
                                            <label for="message">Message au proprietaire</label>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <button class="btn btn-success w-100 py-3"  type="submit">Valider</button>
                                    </div>
                                    <div class="col-6">
                                        <button class="btn btn-primary w-100 py-3">Discuter</button>
                                    </div>
                                </div>
                            </form>
                            
                           
                        </div>
                        <div class="col-lg-6">
                            <div class="row g-3">
                                @isset($images[0])
                                <div class="col-6 text-end">
                                    <img class="img-fluid rounded w-75 wow zoomIn" data-wow-delay="0.1s" src="{{Storage::url($images[0]->image_path)}}" style="margin-top: 25%;">
                                </div>
                                @endisset
                                <div class="col-6 text-start">
                                    <img class="img-fluid rounded w-100 wow zoomIn" data-wow-delay="0.3s" src="{{Storage::url($lodgment->img_path)}}">
                                </div>

                                @isset($images[1])
                                <div class="col-6 text-end">
                                    <img class="img-fluid rounded w-50 wow zoomIn" data-wow-delay="0.5s" src="{{Storage::url($images[1]->image_path)}}">
                                </div>
                                @endisset

                                @isset($images[2])
                                <div class="col-6 text-start">
                                    <img class="img-fluid rounded w-75 wow zoomIn" data-wow-delay="0.7s" src="{{Storage::url($images[2]->image_path)}}">
                                </div>
                                @endisset
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- About End -->
    
@endsection