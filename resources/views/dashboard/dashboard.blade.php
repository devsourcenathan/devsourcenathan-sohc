@extends('dashboard.partials.main')
@php
    use App\Models\User;
    use App\Models\Lodgment;
    use App\Models\Reservation;
@endphp
@section('content')
    @if (Auth::user()->type == 'admin')
        <section class="section dashboard">
            <div class="row">
            <!-- Left side columns -->
            <div class="col-lg-8">
                <div class="row">
                <!-- Sales Card -->
                <div class="col-xxl-4 col-md-6">
                    <div class="card info-card sales-card">

                    <div class="card-body">
                        <h5 class="card-title">Reservations</h5>

                        <div class="d-flex align-items-center">
                        <div
                            class="card-icon rounded-circle d-flex align-items-center justify-content-center"
                        >
                            <i class="bi bi-cart"></i>
                        </div>
                        <div class="ps-3">
                            <h6>{{count($reservations)}}</h6>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
                <!-- End Sales Card -->

                <!-- Revenue Card -->
                <div class="col-xxl-4 col-md-6">
                    <div class="card info-card revenue-card">

                    <div class="card-body">
                        <h5 class="card-title">
                        Demandes
                        </h5>

                        <div class="d-flex align-items-center">
                        <div
                            class="card-icon rounded-circle d-flex align-items-center justify-content-center"
                        >
                            <i class="bi bi-currency-dollar"></i>
                        </div>
                        <div class="ps-3">
                            <h6>{{count($demands)}}</h6>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
                <!-- End Revenue Card -->

                <!-- Customers Card -->
                <div class="col-xxl-4 col-xl-12">
                    <div class="card info-card customers-card">

                    <div class="card-body">
                        <h5 class="card-title">
                            Utlisateurs
                        </h5>

                        <div class="d-flex align-items-center">
                        <div
                            class="card-icon rounded-circle d-flex align-items-center justify-content-center"
                        >
                            <i class="bi bi-people"></i>
                        </div>
                        <div class="ps-3">
                            <h6>{{count($users)}}</h6>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
                <!-- End Customers Card -->
                <!-- Recent Sales -->
                <div class="col-12">
                    <div class="card recent-sales overflow-auto">

                    <div class="card-body">
                        <h5 class="card-title">
                        Derniere Reservations
                        </h5>

                        <table class="table table-borderless datatable">
                        <thead>
                            <tr>
                            <th scope="col">Client</th>
                            <th scope="col">Logement</th>
                            <th scope="col">Prix</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($reservations as $reservation)
                            @php
                                $user = User::find($reservation->user_id);
                                $lodgment = Lodgment::find($reservation->lodgment_id);
                            @endphp
                            <tr>
                                <td>{{$user->name}}</td>
                                <td>
                                    <a href="#" class="text-primary"
                                    >{{ $lodgment->title}}</a
                                    >
                                </td>
                                <td>{{$reservation->price}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                        </table>
                    </div>
                    </div>
                </div>
                <!-- End Recent Sales -->

                </div>
            </div>
            <!-- End Left side columns -->

            <!-- Right side columns -->
            <div class="col-lg-4">
                <!-- Recent Activity -->
                <div class="card">

                <div class="card-body">
                    <h5 class="card-title">Derniere activites</h5>

                    <div class="activity">

                        @forelse ($activities as $activity)
                            <div class="activity-item d-flex">
                                <i
                                class="bi bi-circle-fill activity-badge text-primary align-self-start"
                                ></i>
                                <div class="activity-content">
                                    {{ $activity->title}}
                                </div>
                            </div>
                        @empty
                            <div class="activity-item d-flex">
                                <i
                                class="bi bi-circle-fill activity-badge text-warning align-self-start"
                                ></i>
                                <div class="activity-content">
                                    Aucune activite pour le moment
                                </div>
                            </div>
                        @endforelse
                        

                    </div>
                </div>
                </div>
                <!-- End Recent Activity -->

            </div>
            <!-- End Right side columns -->
            </div>
        </section>
            
    @endif

    @if (Auth::user()->type == 'client')
        @php
            $reservations = Reservation::where("user_id", Auth::user()->id)->get();
        @endphp
        <section class="section dashboard">
            <div class="row">
            <!-- Left side columns -->
            <div class="col-lg-8">
                <div class="row">
                <!-- Sales Card -->
                <div class="col-xxl-4 col-md-6">
                    <div class="card info-card sales-card">

                    <div class="card-body">
                        <h5 class="card-title">Reservations</h5>

                        <div class="d-flex align-items-center">
                        <div
                            class="card-icon rounded-circle d-flex align-items-center justify-content-center"
                        >
                            <i class="bi bi-cart"></i>
                        </div>
                        <div class="ps-3">
                            <h6>{{count($reservations)}}</h6>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
                <!-- End Sales Card -->

                <!-- Recent Sales -->
                <div class="col-12">
                    <div class="card recent-sales overflow-auto">

                    <div class="card-body">
                        <h5 class="card-title">
                        Derniere Reservations
                        </h5>

                        <table class="table table-borderless datatable">
                        <thead>
                            
                            <tr>
                                <th scope="col">Logement</th>
                                <th scope="col">Prix</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($reservations as $reservation)
                            @php
                                $lodgment = Lodgment::find($reservation->lodgment_id);
                            @endphp
                                <tr>
                                    <td>{{$lodgment->name}}</td>
                                    <td>{{$reservation->price}}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="2">Pas de reservation</td>
                                </tr>
                            @endforelse
                        </tbody>
                        </table>
                    </div>
                    </div>
                </div>
                <!-- End Recent Sales -->

                </div>
            </div>
            <!-- End Left side columns -->

            <!-- Right side columns -->
            <div class="col-lg-4">
                <!-- Recent Activity -->
                <div class="card">

                <div class="card-body">
                    <h5 class="card-title">Derniere activites</h5>
                    <div class="activity">

                        @forelse ($activities as $activity)
                            <div class="activity-item d-flex">
                                <i
                                class="bi bi-circle-fill activity-badge text-primary align-self-start"
                                ></i>
                                <div class="activity-content">
                                    {{ $activity->title}}
                                </div>
                            </div>
                        @empty
                            <div class="activity-item d-flex">
                                <i
                                class="bi bi-circle-fill activity-badge text-warning align-self-start"
                                ></i>
                                <div class="activity-content">
                                    Aucune activite pour le moment
                                </div>
                            </div>
                        @endforelse
                        

                    </div>

                    
                </div>
                </div>
                <!-- End Recent Activity -->

            </div>
            <!-- End Right side columns -->
            </div>
        </section>
        
    @endif


@if (Auth::user()->type == 'lessor')
        @php
            $requests = Lodgment::where("user_id", Auth::user()->id)->where(function ($query) {
            $query->where('state', 3)->orWhere('state', 4);
        })->get();
            $lodgments = Lodgment::where("user_id", Auth::user()->id)->get();
        @endphp
<section class="section dashboard">
    <div class="row">
    <!-- Left side columns -->
    <div class="col-lg-8">
        <div class="row">
        <!-- Sales Card -->
        <div class="col-xxl-4 col-md-6">
            <div class="card info-card sales-card">

            <div class="card-body">
                <h5 class="card-title">Demandes</h5>

                <div class="d-flex align-items-center">
                <div
                    class="card-icon rounded-circle d-flex align-items-center justify-content-center"
                >
                    <i class="bi bi-cart"></i>
                </div>
                <div class="ps-3">
                    <h6>{{count($requests)}}</h6>
                </div>
                </div>
            </div>
            </div>
        </div>
        <!-- End Sales Card -->

        <!-- Revenue Card -->
        <div class="col-xxl-4 col-md-6">
            <div class="card info-card revenue-card">

            <div class="card-body">
                <h5 class="card-title">
                Logements
                </h5>

                <div class="d-flex align-items-center">
                <div
                    class="card-icon rounded-circle d-flex align-items-center justify-content-center"
                >
                    <i class="bi bi-currency-dollar"></i>
                </div>
                <div class="ps-3">
                    <h6>{{count($lodgments)}}</h6>
                </div>
                </div>
            </div>
            </div>
        </div>
        <!-- End Revenue Card -->


        <!-- Recent Sales -->
        <div class="col-12">
            <div class="card recent-sales overflow-auto">

            <div class="card-body">
                <h5 class="card-title">
                Derniere demandes
                </h5>

                <table class="table table-borderless datatable">
                <thead>
                    <tr>
                        <th scope="col">Logement</th>
                        <th scope="col">Date</th>
                        <th scope="col">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($requests as $request)
                        <tr>
                            
                        </tr>
                    @empty
                        
                    @endforelse
                    
                </tbody>
                </table>
            </div>
            </div>
        </div>
        <!-- End Recent Sales -->

        </div>
    </div>
    <!-- End Left side columns -->

    <!-- Right side columns -->
    <div class="col-lg-4">
        <!-- Recent Activity -->
        <div class="card">

            <div class="card-body">
                <h5 class="card-title">Derniere activites</h5>

                <div class="activity">

                    @forelse ($activities as $activity)
                        <div class="activity-item d-flex">
                            <i
                            class="bi bi-circle-fill activity-badge text-primary align-self-start"
                            ></i>
                            <div class="activity-content">
                                {{ $activity->title}}
                            </div>
                        </div>
                    @empty
                        <div class="activity-item d-flex">
                            <i
                            class="bi bi-circle-fill activity-badge text-warning align-self-start"
                            ></i>
                            <div class="activity-content">
                                Aucune activite pour le moment
                            </div>
                        </div>
                    @endforelse
                    

                </div>
            </div>
        </div>
        <!-- End Recent Activity -->

    </div>
    <!-- End Right side columns -->
    </div>
</section>
    
@endif
@endsection