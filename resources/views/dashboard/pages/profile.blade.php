@extends('dashboard.partials.main')

@section('content')
<div class="card">
    <div class="card-body pt-3">
      <!-- Bordered Tabs -->
      <ul class="nav nav-tabs nav-tabs-bordered">

        <li class="nav-item">
          <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Informations</button>
        </li>

        <li class="nav-item">
          <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Editer mon Profile</button>
        </li>

        <li class="nav-item">
          <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Changer mon mot de passe</button>
        </li>

      </ul>
      <div class="tab-content pt-2">

        <div class="tab-pane fade show active profile-overview" id="profile-overview">
          <h5 class="card-title" Details</h5>

          <div class="row m-2">
            <div class="col-lg-3 col-md-4 label ">Nom</div>
            <div class="col-lg-9 col-md-8">{{ Auth::user()->name}}</div>
          </div>

          <div class="row m-2">
            <div class="col-lg-3 col-md-4 label">Email</div>
            <div class="col-lg-9 col-md-8">{{ Auth::user()->email}}</div>
          </div>

          <div class="row m-2">
            <div class="col-lg-3 col-md-4 label">Date de creation</div>
            <div class="col-lg-9 col-md-8">{{ Auth::user()->created_at}}</div>
          </div>


          <div class="row m-2">
            <div class="col-lg-3 col-md-4 label">Derniere modification</div>
            <div class="col-lg-9 col-md-8">{{ Auth::user()->updated_at}}</div>
          </div>

        </div>

        <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

          <!-- Profile Edit Form -->
          <form action="">

            @csrf
            @method('put')
            <div class="row mb-3">
              <label for="name" class="col-md-4 col-lg-3 col-form-label">Nom</label>
              <div class="col-md-8 col-lg-9">
                <input name="name" type="text" class="form-control" id="name" value="{{ Auth::user()->name}}">
              </div>
            </div>


            <div class="row mb-3">
              <label for="email" class="col-md-4 col-lg-3 col-form-label">Email</label>
              <div class="col-md-8 col-lg-9">
                <input name="email" type="email" class="form-control" id="email" value="{{ Auth::user()->email}}">
              </div>
            </div>

            

            <div class="text-center">
              <button type="submit" class="btn btn-primary">Enregistrer les modifications</button>
            </div>
          </form><!-- End Profile Edit Form -->

        </div>


        <div class="tab-pane fade pt-3" id="profile-change-password">
          <!-- Change Password Form -->
          <form>

            <div class="row mb-3">
              <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Mot de passe actuel</label>
              <div class="col-md-8 col-lg-9">
                <input name="password" type="password" class="form-control" id="currentPassword" autocomplete="false">
              </div>
            </div>

            <div class="row mb-3">
              <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">Nouveau mot de passe</label>
              <div class="col-md-8 col-lg-9">
                <input name="password" type="password" class="form-control" id="password">
              </div>
            </div>

            <div class="row mb-3">
              <label for="confirmPassword" class="col-md-4 col-lg-3 col-form-label">Confirmer</label>
              <div class="col-md-8 col-lg-9">
                <input name="confirmPassword" type="password" class="form-control" id="confirmPassword">
              </div>
            </div>

            <div class="text-center">
              <button type="submit" class="btn btn-primary">Changer le mot de passe</button>
            </div>
          </form><!-- End Change Password Form -->

        </div>

      </div><!-- End Bordered Tabs -->

    </div>
  </div>
@endsection