@extends('dashboard.partials.main')

@section('content')
<div class="card">
    <div class="card-body">
      <h5 class="card-title">Ajouter un logement</h5>

      
      <form class="row g-3" method="POST" action="/lodgments/update" enctype="multipart/form-data">
        @csrf
        <div class="col-md-6">
          <label for="title" class="form-label">Titre</label>
          <input type="text" class="form-control" id="title" value="{{$lodgment->title}}" name="title" required>
          <input type="hidden" class="form-control" id="id_lodgment" value="{{$lodgment->id}}" name="id_lodgment" required>
        </div>

        <div class="col-md-3">
          <label for="price" class="form-label">Prix du logement</label>
          <input type="number" min="0" class="form-control" id="price" value="{{$lodgment->price}}"  name="price" required>
        </div>

        <div class="col-md-3">
          <label for="reservation_price" class="form-label">Prix de reservation</label>
          <input type="number" min="0" class="form-control" value="5000" id="reservation_price" value="{{$lodgment->reservation_price}}"  name="reservation_price" required>
        </div>

        <div class="col-md-6">
          <label for="description" class="form-label">Description</label>
          <input type="text" class="form-control" id="description" name="description" value="{{$lodgment->description}}"  required>
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
          <label for="stars" class="form-label">Nombre d'etoiles</label>
          <select name="stars" id="stars" class="form-control" required>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
          </select>
      </div>

        <div class="col-md-6">
          <label for="pieces" class="form-label">Nombre de pieces</label>
          <input type="number" min="1" class="form-control" id="pieces" name="pieces" value="{{$lodgment->pieces}}"  required>
      </div>          

        <div class="col-md-12">
          <label for="images" class="form-label">Galerie d'image</label>
          <input type="file" class="form-control" id="images" name="images[]" accept="image/*" multiple>
      </div>

        <div class="col-md-12">
          <label for="details" class="form-label">Details</label>
          <textarea name="details" class="form-control" id="details" cols="30" rows="10">
            {{$lodgment->details}}
          </textarea>
          
      </div>
        <input type="hidden" class="form-control" id="user_id" name="user_id" value="{{ Auth::user()->id }}" required>
          
        <div class="mt-5">
          <button type="submit" class="btn btn-primary">Enregistrer les modifications</button>
        </div>
      </form>

    </div>
</div>
@endsection

