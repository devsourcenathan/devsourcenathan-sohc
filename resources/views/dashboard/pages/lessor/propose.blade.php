@extends('dashboard.partials.main')

@section('content')
<div class="card">
    <div class="card-body">
      <h5 class="card-title">Proposer mon logement</h5>

      
      <form class="row g-3" method="POST" action="/lessor/propose/store" enctype="multipart/form-data">
        @csrf
        <div class="col-md-6">
          <label for="title" class="form-label">Titre</label>
          <input type="text" class="form-control" id="title" name="title" required>
        </div>

        <div class="col-md-6">
          <label for="price" class="form-label">Prix</label>
          <input type="number" min="0" class="form-control" id="price" name="price" required>
        </div>

        <div class="col-md-6">
          <label for="description" class="form-label">Description</label>
          <input type="text" class="form-control" id="description" name="description" required>
        </div>


        <div class="col-md-6">
            <label for="type" class="form-label">Type du logement</label>
            <select name="type" id="type" class="form-control" required>
            @forelse ($types as $type)
              <option value="{{ $type->name}}">{{ $type->name}}</option>
            @empty
            <option value="null">Pas de type disponible</option>
            @endforelse
            </select>
          </div>

        <div class="col-md-6">
          <label for="location" class="form-label">Ville</label>
          <select name="location" id="location" class="form-control" required>
          @forelse ($cities as $city)
            <option value="{{ $city->name}}">{{ $city->name}}</option>
          @empty
          <option value="null">Pas de ville disponible</option>
          @endforelse
          </select>
        </div>

        <div class="col-md-6">
            <label for="town" class="form-label">Quartier</label>
            <select name="town" id="town" class="form-control" required>
            @forelse ($towns as $town)
              <option value="{{ $town->name}}">{{ $town->name}}</option>
            @empty
            <option value="null">Pas de quartier disponible</option>
            @endforelse
            </select>
          </div>


        <div class="col-md-6">
          <label for="pieces" class="form-label">Nombre de pieces</label>
          <input type="number" min="1" class="form-control" id="pieces" name="pieces" required>
      </div>          


        <div class="col-md-6">
            <label for="image" class="form-label">Image de couverture</label>
            <input type="file" class="form-control" id="image" name="image" required>
        </div>

        <div class="col-md-12">
          <label for="details" class="form-label">Details</label>
          <textarea name="details" class="form-control" id="details" cols="30" rows="10">
            
          </textarea>
          
      </div>
        <input type="hidden" class="form-control" id="user_id" name="user_id" value="{{ Auth::user()->id }}" required>
          
        <div class="mt-5">
          <button type="submit" class="btn btn-primary">Soumettre ma proposition</button>
        </div>
      </form>

    </div>
</div>
@endsection



