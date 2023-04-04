@extends('dashboard.partials.main')

@section('content')
<div class="card">
    <div class="card-body">
      <h5 class="card-title">Parametres du site</h5>

      
      <form class="row g-3" method="POST" action="/configs/store">
        @csrf
        <div class="col-md-6">
          <label for="phone" class="form-label">Telephone</label>
          <input type="text" class="form-control" id="phone" name="phone" value="{{ $configs->phone}}" required>
        </div>

        <div class="col-md-6">
          <label for="contact_email" class="form-label">Email de contact</label>
          <input type="email" class="form-control" id="contact_email" name="contact_email" autocomplete="false" value="{{ $configs->contact_email}}" required>
        </div>

          <div class="col-md-6">
            <label for="booking_email" class="form-label">Email de reservation</label>
            <input type="email" class="form-control" id="booking_email" name="booking_email" autocomplete="false" value="{{ $configs->booking_email}}" required>
          </div>

          <div class="col-md-6">
            <label for="tech_email" class="form-label">Email support technique</label>
            <input type="email" class="form-control" id="tech_email" name="tech_email" autocomplete="false" value="{{ $configs->tech_email}}" required>
          </div>
          <div class="col-md-12">
            <label for="location" class="form-label">Localisation</label>
            <input type="text" class="form-control" id="location" name="location" value="{{ $configs->location}}" required>
          </div>
          
        <div class="mt-5">
          <button type="submit" class="btn btn-primary">Enregistrer les modifications</button>
        </div>
      </form>

    </div>
</div>
@endsection

