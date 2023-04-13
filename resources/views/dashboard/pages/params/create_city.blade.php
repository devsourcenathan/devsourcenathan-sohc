@extends('dashboard.partials.main')

@section('content')
<div class="card">
    <div class="card-body">
      <h5 class="card-title">Ajouter une ville</h5>

      
      <form class="row g-3" method="POST" action="/cities/store" enctype="multipart/form-data">
        @csrf
        <div class="col-md-6">
          <label for="name" class="form-label">Nom</label>
          <input type="text" class="form-control" id="name" name="name" required>
        </div>


          
        <div class="mt-5">
          <button type="submit" class="btn btn-primary">Enregistrer la ville</button>
        </div>
      </form>

    </div>
</div>
@endsection

