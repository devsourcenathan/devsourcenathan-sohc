@extends('dashboard.partials.main')

@section('content')
<div class="card">
    <div class="card-body">
      <h5 class="card-title">Liste des villes</h5>
      <a href="/cities/store"  class="btn btn-primary">Ajouter une ville</a>
      <table class="table" id="table">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($cities as $city)
            <tr>
                    <td>
                        {{ $city->name}}
                    </td>
                    <td>
                    </td>
                    @empty
                    <td colspan="2">
                        Pas de ville pour le moment !
                    </td>
                </tr>
                    @endforelse
                    

        </tbody>
    </table>

    </div>
</div>
@endsection

