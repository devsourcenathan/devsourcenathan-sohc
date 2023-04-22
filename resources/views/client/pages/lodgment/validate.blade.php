@extends('client.partials.main')

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
                    <div class="row g-5 align-items-center">
                        <div class="col-lg-6">
                            <h1 class="mb-4"><span class="text-primary text-uppercase">Votre reservation a ete prise en compte</span></h1>
                            

                            <a class="btn btn-primary py-3 px-5 mt-2" href="/dashboard">Voir mon dashboard</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- About End -->
    
@endsection