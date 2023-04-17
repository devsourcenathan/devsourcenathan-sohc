@extends('dashboard.partials.main')

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
                            <h6>145</h6>
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
                            <h6>264</h6>
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
                            <h6>1244</h6>
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
                            <th scope="col">#</th>
                            <th scope="col">Client</th>
                            <th scope="col">Logement</th>
                            <th scope="col">Prix</th>
                            <th scope="col">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                            <th scope="row"><a href="#">#2457</a></th>
                            <td>Brandon Jacob</td>
                            <td>
                                <a href="#" class="text-primary"
                                >At praesentium minu</a
                                >
                            </td>
                            <td>$64</td>
                            <td>
                                <span class="badge bg-success">Approved</span>
                            </td>
                            </tr>
                            <tr>
                            <th scope="row"><a href="#">#2147</a></th>
                            <td>Bridie Kessler</td>
                            <td>
                                <a href="#" class="text-primary"
                                >Blanditiis dolor omnis similique</a
                                >
                            </td>
                            <td>$47</td>
                            <td><span class="badge bg-warning">Pending</span></td>
                            </tr>
                            <tr>
                            <th scope="row"><a href="#">#2049</a></th>
                            <td>Ashleigh Langosh</td>
                            <td>
                                <a href="#" class="text-primary"
                                >At recusandae consectetur</a
                                >
                            </td>
                            <td>$147</td>
                            <td>
                                <span class="badge bg-success">Approved</span>
                            </td>
                            </tr>
                            <tr>
                            <th scope="row"><a href="#">#2644</a></th>
                            <td>Angus Grady</td>
                            <td>
                                <a href="#" class="text-primar"
                                >Ut voluptatem id earum et</a
                                >
                            </td>
                            <td>$67</td>
                            <td><span class="badge bg-danger">Rejected</span></td>
                            </tr>
                            <tr>
                            <th scope="row"><a href="#">#2644</a></th>
                            <td>Raheem Lehner</td>
                            <td>
                                <a href="#" class="text-primary"
                                >Sunt similique distinctio</a
                                >
                            </td>
                            <td>$165</td>
                            <td>
                                <span class="badge bg-success">Approved</span>
                            </td>
                            </tr>
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
                    <div class="activity-item d-flex">
                        <div class="activite-label">32 min</div>
                        <i
                        class="bi bi-circle-fill activity-badge text-success align-self-start"
                        ></i>
                        <div class="activity-content">
                        Quia quae rerum
                        <a href="#" class="fw-bold text-dark"
                            >explicabo officiis</a
                        >
                        beatae
                        </div>
                    </div>
                    <!-- End activity item-->

                    <div class="activity-item d-flex">
                        <div class="activite-label">56 min</div>
                        <i
                        class="bi bi-circle-fill activity-badge text-danger align-self-start"
                        ></i>
                        <div class="activity-content">
                        Voluptatem blanditiis blanditiis eveniet
                        </div>
                    </div>
                    <!-- End activity item-->

                    <div class="activity-item d-flex">
                        <div class="activite-label">2 hrs</div>
                        <i
                        class="bi bi-circle-fill activity-badge text-primary align-self-start"
                        ></i>
                        <div class="activity-content">
                        Voluptates corrupti molestias voluptatem
                        </div>
                    </div>
                    <!-- End activity item-->

                    <div class="activity-item d-flex">
                        <div class="activite-label">1 day</div>
                        <i
                        class="bi bi-circle-fill activity-badge text-info align-self-start"
                        ></i>
                        <div class="activity-content">
                        Tempore autem saepe
                        <a href="#" class="fw-bold text-dark"
                            >occaecati voluptatem</a
                        >
                        tempore
                        </div>
                    </div>
                    <!-- End activity item-->

                    <div class="activity-item d-flex">
                        <div class="activite-label">2 days</div>
                        <i
                        class="bi bi-circle-fill activity-badge text-warning align-self-start"
                        ></i>
                        <div class="activity-content">
                        Est sit eum reiciendis exercitationem
                        </div>
                    </div>
                    <!-- End activity item-->

                    <div class="activity-item d-flex">
                        <div class="activite-label">4 weeks</div>
                        <i
                        class="bi bi-circle-fill activity-badge text-muted align-self-start"
                        ></i>
                        <div class="activity-content">
                        Dicta dolorem harum nulla eius. Ut quidem quidem sit quas
                        </div>
                    </div>
                    <!-- End activity item-->
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
                        <h6>145</h6>
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
                        <h6>264</h6>
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
                        <h6>1244</h6>
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
                        <th scope="col">#</th>
                        <th scope="col">Client</th>
                        <th scope="col">Logement</th>
                        <th scope="col">Prix</th>
                        <th scope="col">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                        <th scope="row"><a href="#">#2457</a></th>
                        <td>Brandon Jacob</td>
                        <td>
                            <a href="#" class="text-primary"
                            >At praesentium minu</a
                            >
                        </td>
                        <td>$64</td>
                        <td>
                            <span class="badge bg-success">Approved</span>
                        </td>
                        </tr>
                        <tr>
                        <th scope="row"><a href="#">#2147</a></th>
                        <td>Bridie Kessler</td>
                        <td>
                            <a href="#" class="text-primary"
                            >Blanditiis dolor omnis similique</a
                            >
                        </td>
                        <td>$47</td>
                        <td><span class="badge bg-warning">Pending</span></td>
                        </tr>
                        <tr>
                        <th scope="row"><a href="#">#2049</a></th>
                        <td>Ashleigh Langosh</td>
                        <td>
                            <a href="#" class="text-primary"
                            >At recusandae consectetur</a
                            >
                        </td>
                        <td>$147</td>
                        <td>
                            <span class="badge bg-success">Approved</span>
                        </td>
                        </tr>
                        <tr>
                        <th scope="row"><a href="#">#2644</a></th>
                        <td>Angus Grady</td>
                        <td>
                            <a href="#" class="text-primar"
                            >Ut voluptatem id earum et</a
                            >
                        </td>
                        <td>$67</td>
                        <td><span class="badge bg-danger">Rejected</span></td>
                        </tr>
                        <tr>
                        <th scope="row"><a href="#">#2644</a></th>
                        <td>Raheem Lehner</td>
                        <td>
                            <a href="#" class="text-primary"
                            >Sunt similique distinctio</a
                            >
                        </td>
                        <td>$165</td>
                        <td>
                            <span class="badge bg-success">Approved</span>
                        </td>
                        </tr>
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
                <div class="activity-item d-flex">
                    <div class="activite-label">32 min</div>
                    <i
                    class="bi bi-circle-fill activity-badge text-success align-self-start"
                    ></i>
                    <div class="activity-content">
                    Quia quae rerum
                    <a href="#" class="fw-bold text-dark"
                        >explicabo officiis</a
                    >
                    beatae
                    </div>
                </div>
                <!-- End activity item-->

                <div class="activity-item d-flex">
                    <div class="activite-label">56 min</div>
                    <i
                    class="bi bi-circle-fill activity-badge text-danger align-self-start"
                    ></i>
                    <div class="activity-content">
                    Voluptatem blanditiis blanditiis eveniet
                    </div>
                </div>
                <!-- End activity item-->

                <div class="activity-item d-flex">
                    <div class="activite-label">2 hrs</div>
                    <i
                    class="bi bi-circle-fill activity-badge text-primary align-self-start"
                    ></i>
                    <div class="activity-content">
                    Voluptates corrupti molestias voluptatem
                    </div>
                </div>
                <!-- End activity item-->

                <div class="activity-item d-flex">
                    <div class="activite-label">1 day</div>
                    <i
                    class="bi bi-circle-fill activity-badge text-info align-self-start"
                    ></i>
                    <div class="activity-content">
                    Tempore autem saepe
                    <a href="#" class="fw-bold text-dark"
                        >occaecati voluptatem</a
                    >
                    tempore
                    </div>
                </div>
                <!-- End activity item-->

                <div class="activity-item d-flex">
                    <div class="activite-label">2 days</div>
                    <i
                    class="bi bi-circle-fill activity-badge text-warning align-self-start"
                    ></i>
                    <div class="activity-content">
                    Est sit eum reiciendis exercitationem
                    </div>
                </div>
                <!-- End activity item-->

                <div class="activity-item d-flex">
                    <div class="activite-label">4 weeks</div>
                    <i
                    class="bi bi-circle-fill activity-badge text-muted align-self-start"
                    ></i>
                    <div class="activity-content">
                    Dicta dolorem harum nulla eius. Ut quidem quidem sit quas
                    </div>
                </div>
                <!-- End activity item-->
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
                    <h6>145</h6>
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
                    <h6>264</h6>
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
                    <h6>1244</h6>
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
                    <th scope="col">#</th>
                    <th scope="col">Client</th>
                    <th scope="col">Logement</th>
                    <th scope="col">Prix</th>
                    <th scope="col">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <th scope="row"><a href="#">#2457</a></th>
                    <td>Brandon Jacob</td>
                    <td>
                        <a href="#" class="text-primary"
                        >At praesentium minu</a
                        >
                    </td>
                    <td>$64</td>
                    <td>
                        <span class="badge bg-success">Approved</span>
                    </td>
                    </tr>
                    <tr>
                    <th scope="row"><a href="#">#2147</a></th>
                    <td>Bridie Kessler</td>
                    <td>
                        <a href="#" class="text-primary"
                        >Blanditiis dolor omnis similique</a
                        >
                    </td>
                    <td>$47</td>
                    <td><span class="badge bg-warning">Pending</span></td>
                    </tr>
                    <tr>
                    <th scope="row"><a href="#">#2049</a></th>
                    <td>Ashleigh Langosh</td>
                    <td>
                        <a href="#" class="text-primary"
                        >At recusandae consectetur</a
                        >
                    </td>
                    <td>$147</td>
                    <td>
                        <span class="badge bg-success">Approved</span>
                    </td>
                    </tr>
                    <tr>
                    <th scope="row"><a href="#">#2644</a></th>
                    <td>Angus Grady</td>
                    <td>
                        <a href="#" class="text-primar"
                        >Ut voluptatem id earum et</a
                        >
                    </td>
                    <td>$67</td>
                    <td><span class="badge bg-danger">Rejected</span></td>
                    </tr>
                    <tr>
                    <th scope="row"><a href="#">#2644</a></th>
                    <td>Raheem Lehner</td>
                    <td>
                        <a href="#" class="text-primary"
                        >Sunt similique distinctio</a
                        >
                    </td>
                    <td>$165</td>
                    <td>
                        <span class="badge bg-success">Approved</span>
                    </td>
                    </tr>
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
            <div class="activity-item d-flex">
                <div class="activite-label">32 min</div>
                <i
                class="bi bi-circle-fill activity-badge text-success align-self-start"
                ></i>
                <div class="activity-content">
                Quia quae rerum
                <a href="#" class="fw-bold text-dark"
                    >explicabo officiis</a
                >
                beatae
                </div>
            </div>
            <!-- End activity item-->

            <div class="activity-item d-flex">
                <div class="activite-label">56 min</div>
                <i
                class="bi bi-circle-fill activity-badge text-danger align-self-start"
                ></i>
                <div class="activity-content">
                Voluptatem blanditiis blanditiis eveniet
                </div>
            </div>
            <!-- End activity item-->

            <div class="activity-item d-flex">
                <div class="activite-label">2 hrs</div>
                <i
                class="bi bi-circle-fill activity-badge text-primary align-self-start"
                ></i>
                <div class="activity-content">
                Voluptates corrupti molestias voluptatem
                </div>
            </div>
            <!-- End activity item-->

            <div class="activity-item d-flex">
                <div class="activite-label">1 day</div>
                <i
                class="bi bi-circle-fill activity-badge text-info align-self-start"
                ></i>
                <div class="activity-content">
                Tempore autem saepe
                <a href="#" class="fw-bold text-dark"
                    >occaecati voluptatem</a
                >
                tempore
                </div>
            </div>
            <!-- End activity item-->

            <div class="activity-item d-flex">
                <div class="activite-label">2 days</div>
                <i
                class="bi bi-circle-fill activity-badge text-warning align-self-start"
                ></i>
                <div class="activity-content">
                Est sit eum reiciendis exercitationem
                </div>
            </div>
            <!-- End activity item-->

            <div class="activity-item d-flex">
                <div class="activite-label">4 weeks</div>
                <i
                class="bi bi-circle-fill activity-badge text-muted align-self-start"
                ></i>
                <div class="activity-content">
                Dicta dolorem harum nulla eius. Ut quidem quidem sit quas
                </div>
            </div>
            <!-- End activity item-->
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