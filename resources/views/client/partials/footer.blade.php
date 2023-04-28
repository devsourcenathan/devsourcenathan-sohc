<?php 

use App\Models\Config;

$config = Config::all()->last();

?>

<!-- Footer Start -->
<div class="container-fluid bg-dark text-light mt-5 footer wow fadeIn" data-wow-delay="0.1s">
    <div class="container pb-5">
        <div class="row g-5">
            <div class="col-md-6 col-lg-3">
                <h6 class="section-title text-start text-primary text-uppercase mb-4">
                    Contact
                </h6>
                <p class="mb-2">
                    <i class="fa fa-map-marker-alt me-3"></i>{{ $config->location}}
                </p>
                <p class="mb-2">
                    <i class="fa fa-phone-alt me-3"></i>{{ $config->phone}}
                </p>
                <p class="mb-2">
                    <i class="fa fa-envelope me-3"></i>{{ $config->contact_email}}
                </p>
            </div>
            <div class="col-lg-5 col-md-12">
                <div class="row gy-5 g-4">
                    <div class="col-md-6">
                        <h6 class="section-title text-start text-primary text-uppercase mb-4">
                            Company
                        </h6>
                        <a class="btn btn-link" href="/about">A propos</a>
                        <a class="btn btn-link" href="/contact">Nous contacter</a>
                        <a class="btn btn-link" href="/policy">Politque de confidentialité</a>
                        <a class="btn btn-link" href="/conditions">Termes & Conditions</a>
                        {{-- <a class="btn btn-link" href="/support">Support</a> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="copyright">
            <div class="row">
                <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                    &copy; <a class="border-bottom" href="/">Online Housing Company</a>, All
                    Right Reserved.
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Footer End -->

<!-- Back to Top -->
{{-- <a href="/" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a> --}}
</div>

<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('assets/lib/wow/wow.min.js')}}"></script>
<script src="{{ asset('assets/lib/easing/easing.min.js')}}"></script>
<script src="{{ asset('assets/lib/waypoints/waypoints.min.js')}}"></script>
<script src="{{ asset('assets/lib/counterup/counterup.min.js')}}"></script>
<script src="{{ asset('assets/lib/owlcarousel/owl.carousel.min.js')}}"></script>
<script src="{{ asset('assets/lib/tempusdominus/js/moment.min.js')}}"></script>
<script src="{{ asset('assets/lib/tempusdominus/js/moment-timezone.min.js')}}"></script>
<script src="{{ asset('assets/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<script src="{{ asset('assets/js/main.js')}}"></script>

</body>

</html>