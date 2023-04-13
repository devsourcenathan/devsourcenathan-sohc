@extends('dashboard.partials.main')

@section('content')
<div class="card">
    <div class="card-body">
      <h5 class="card-title">Liste des type de logements</h5>
      <a href="/types/store"  class="btn btn-primary">Ajouter un type de logement</a>
      <table class="table" id="table">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($types as $type)
            <tr>
               <td>{{$type->name}}</td>
               <td></td>
           @empty
                 <td>Pas de type pour le moment !</td>
           </tr>
           @endforelse
                    

        </tbody>
    </table>

    </div>
</div>
@endsection

