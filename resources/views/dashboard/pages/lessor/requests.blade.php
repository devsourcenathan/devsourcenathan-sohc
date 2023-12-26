@extends('dashboard.partials.main')

@section('content')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Mes demandes</h5>
            <a href="/lessor/propose" class="btn btn-primary">Proposer un logement</a>
            <table class="table" id="table">
                <thead>
                    <tr>
                        <th></th>
                        <th>Titre</th>
                        <th>Description</th>
                        <th>Prix</th>
                        <th>Localisation</th>
                        <th>Etat</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($requests as $lodgment)
                        <tr>
                            <td>
                                <img src="site/public{{ Storage::url($lodgment->img_path) }}{{ Storage::url($lodgment->img_path) }}"
                                    alt="{{ $lodgment->title }}" height="40" width="50">
                            </td>
                            <td>{{ $lodgment->title }}</td>
                            <td>{{ $lodgment->description }}</td>
                            <td>{{ $lodgment->price }}</td>
                            <td>{{ $lodgment->location }}</td>
                            <td>
                                @if ($lodgment->state === 4)
                                    Rejeté
                                @elseif($lodgment->state === 3)
                                    En attente
                                @endif
                            </td>
                            <td>
                                <a href={{ "/lessor/propose/details/$lodgment->slug/$lodgment->id" }}
                                    class="badge rounded-pill bg-info cursor-pointer" style="cursor: pointer;">Afficher</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7">Pas de demandes !</td>
                        </tr>
                    @endforelse ($lodgments as $lodgment)

                </tbody>
            </table>

        </div>
    </div>
@endsection
