@extends('client.partials.main')

@section('content')
    @if (Session::has('success'))
        <div class="alert alert-success">
            {{ Session::get('success') }}
            <script>
                setTimeout(function() {
                    $(".alert-success").fadeOut();
                }, 3000);
            </script>
        </div>
    @endif
    <!-- Contact Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title text-center text-primary text-uppercase">Nous contacter</h6>
                <h1 class="mb-5">Nous laisser un <span class="text-primary text-uppercase">message</span> </h1>
            </div>
            <div class="row g-4">
                <div class="col-12">
                    <div class="row gy-4">
                        <div class="col-md-4">
                            <h6 class="section-title text-start text-primary text-uppercase">Reservation</h6>
                            <p><i class="fa fa-envelope-open text-primary me-2"></i>{{ $config->booking_email }}</p>
                        </div>
                        <div class="col-md-4">
                            <h6 class="section-title text-start text-primary text-uppercase">Generale</h6>
                            <p><i class="fa fa-envelope-open text-primary me-2"></i>{{ $config->contact_email }}</p>
                        </div>
                        <div class="col-md-4">
                            <h6 class="section-title text-start text-primary text-uppercase">Technique</h6>
                            <p><i class="fa fa-envelope-open text-primary me-2"></i>{{ $config->tech_email }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 wow fadeIn" data-wow-delay="0.1s">
                    <iframe class="position-relative rounded w-100 h-100"
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3001156.4288297426!2d-78.01371936852176!3d42.72876761954724!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4ccc4bf0f123a5a9%3A0xddcfc6c1de189567!2sNew%20York%2C%20USA!5e0!3m2!1sen!2sbd!4v1603794290143!5m2!1sen!2sbd"
                        frameborder="0" style="min-height: 350px; border:0;" allowfullscreen="" aria-hidden="false"
                        tabindex="0"></iframe>
                </div>
                <div class="col-md-6">
                    <div class="wow fadeInUp" data-wow-delay="0.2s">
                        <form action="{{ url('/contact') }}" method="POST">
                            @csrf
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" name="name" id="name"
                                            placeholder="Votre nom">
                                        <label for="name">Votre nom</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="email" class="form-control" name="email" id="email"
                                            placeholder="Votre Email">
                                        <label for="email">Votre Email</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <textarea class="form-control" name="message" placeholder="Leave a message here" id="message" style="height: 150px"></textarea>
                                        <label for="message">Message</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-primary w-100 py-3" type="submit">Envoyer le message</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->
@endsection
