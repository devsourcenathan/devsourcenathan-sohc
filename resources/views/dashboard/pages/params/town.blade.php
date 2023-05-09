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
                        @if ($town->state == "active")
                            <a href="/dashboard/town/hide_town/{{$town->id}}" class="badge rounded-pill bg-warning cursor-pointer" style="cursor: pointer;">Masquer</a>
                        @else
                            <a href="/dashboard/town/show_town/{{$town->id}}" class="badge rounded-pill bg-success cursor-pointer" style="cursor: pointer;">Afficher</a>
                        @endif
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

