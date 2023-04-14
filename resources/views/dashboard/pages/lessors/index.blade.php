@extends('dashboard.partials.main')

@section('content')
<div class="card">
    <div class="card-body">
        <h5 class="card-title">Liste des Bayeurs</h5>
        <table class="table" id="table">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Email</th>
                    <th>Etat</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($lessors as $lessor)
                <tr>
                    <td>{{$lessor->name}}</td>
                    <td>{{$lessor->email}}</td>
                    <td></td>
                    <td>
                        <a href="/dashboard/lessors/details/{{$lessor->id}}" class="badge rounded-pill bg-info cursor-pointer" style="cursor: pointer;">Afficher</a>
                        {{-- <a href="lodgments/details/{{$lodgment->slug}}" class="badge rounded-pill bg-info cursor-pointer" style="cursor: pointer;">Afficher</a> --}}
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7">Pas de Bayeurs !</td>
                </tr>
                @endforelse

            </tbody>
        </table>

    </div>
</div>
@endsection