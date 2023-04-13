@extends('dashboard.partials.main')

@section('content')
<div class="card">
    <div class="card-body">
      <h5 class="card-title">Liste des quartiers</h5>
      <a href="/towns/store"  class="btn btn-primary">Ajouter un quartier</a>
      <table class="table" id="table">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($towns as $town)
            <tr>
                    <td>
                        {{ $town->name}}
                    </td>
                    <td>
                    </td>
                    @empty
                    <td colspan="2">
                        Pas de quartier pour le moment !
                    </td>
                </tr>
                    @endforelse
                    

        </tbody>
    </table>

    </div>
</div>
@endsection

