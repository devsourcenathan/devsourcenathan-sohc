
@extends('dashboard.partials.main')

@section('content')
<div class="card">
    <div class="card-body">
        <h5 class="card-title">Historique de mes activites</h5>
        <table class="table" id="table">
            <thead>
                <tr>
                    <th>Titre</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($activities as $activity)
                <tr>
                    <td>{{$activity->title}}</td>
                    <td>{{$activity->created_at}}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="2">Pas d'activite pour le moment !</td>
                </tr>
                @endforelse

            </tbody>
        </table>

    </div>
</div>
@endsection