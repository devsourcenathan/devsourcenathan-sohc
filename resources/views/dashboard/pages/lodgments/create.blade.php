div@extends('dashboard.partials.main')

@section('content')
<div class="card">
    <div class="card-body">
      <h5 class="card-title">Ajouter un logement</h5>

      
      <form class="row g-3" method="POST" action="/lodgments/store">
        @csrf
        <div class="col-md-6">
          <label for="title" class="form-label">Titre</label>
          <input type="text" class="form-control" id="title" name="title" required>
        </div>

        <div class="col-md-6">
          <label for="contact_email" class="form-label">Type du logement</label>
          <select name="type" id="type" class="form-control" required>
            <option value="house">Maison</option>
            <option value="studio">Studio</option>
            <option value="appartment">Appartement</option>
            <option value="room">Chambre</option>
          </select>
        </div>

          <div class="col-md-6">
            <label for="price" class="form-label">Prix</label>
            <input type="number" min="0" class="form-control" id="price" name="price" required>
          </div>

          <div class="col-md-6">
            <label for="description" class="form-label">Description</label>
            <input type="text" class="form-control" id="description" name="description" required>
          </div>
          <div class="col-md-12">
            <label for="location" class="form-label">Nombre de pieces</label>
            <input type="number" min="1" class="form-control" id="pieces" name="pieces" required>
        </div>
        <div class="col-md-12">
            <label for="image" class="form-label">Image de couverture</label>
            <input type="file" min="1" class="form-control" id="image" name="image" required>
        </div>
        <input type="hiddem" class="form-control" id="user_id" name="user_id" value="{{ Auth::user()->id }}" required>
          
        <div class="mt-5">
          <button type="submit" class="btn btn-primary">Enregistrer le logement</button>
        </div>
      </form>

    </div>
</div>
@endsection

