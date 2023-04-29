@extends('dashboard.partials.main')

@section('content')
<div class="card">
    <div class="card-body pt-3">
        <h5 class="card-title">Informations sur le bailleur</h5>
      <!-- Bordered Tabs -->
      <ul class="nav nav-tabs nav-tabs-bordered">

        <li class="nav-item">
          <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">General</button>
        </li>

      </ul>
      <div class="tab-content pt-2">

        <div class="tab-pane fade show active profile-overview" id="profile-overview">
          <h5 class="card-title">Profile Details</h5>

          <div class="row">
            <div class="col-lg-3 col-md-4 label text-bold">Nom</div>
            <div class="col-lg-9 col-md-8">{{ $lessor->name }}</div>
          </div>

          <div class="row">
            <div class="col-lg-3 col-md-4 label">Email</div>
            <div class="col-lg-9 col-md-8">{{ $lessor->email }}</div>
          </div>

          <div class="row">
            <div class="col-lg-3 col-md-4 label">Status</div>
            <div class="col-lg-9 col-md-8">En ligne</div>
          </div>


          <h5 class="card-title">Ses demandes</h5>

          <table class="table" id="table">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Etat</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($requests as $request)
                <tr>
                    <td>{{$request->title}}</td>
                    <td>
                      @if($request->state === 4)
                          Rejeté
                      @elseif($request->state === 3)
                          En attente
                      @endif
                    </td>
                    <td>

                        <a href="/dashboard/lessors/details/{{$request->id}}" class="badge rounded-pill bg-info cursor-pointer" style="cursor: pointer;">Afficher</a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7">Pas de logement pour ce bailleur !</td>
                </tr>
                @endforelse

            </tbody>
        </table>

          <h5 class="card-title">Ses logements</h5>

          <table class="table" id="table">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Etat</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($lodgments as $lodgment)
                <tr>
                    <td>{{$lodgment->title}}</td>
                    <td>
                      @if ($lodgment->state == 0)
                        Pas en ligne
                      @elseif($lodgment->state == 1)
                          En ligne
                      @endif 
                    </td>
                    <td>

                        <a href="/dashboard/lessors/details/{{$lodgment->id}}" class="badge rounded-pill bg-info cursor-pointer" style="cursor: pointer;">Afficher</a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7">Pas de logement pour ce bailleur !</td>
                </tr>
                @endforelse

            </tbody>
        </table>

        </div>


      </div><!-- End Bordered Tabs -->

    </div>
  </div>
@endsection