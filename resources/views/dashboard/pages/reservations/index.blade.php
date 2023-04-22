@extends('dashboard.partials.main')

@php
    use App\Models\User;
    use App\Models\Lodgment;
@endphp


@section('content')
<div class="card">
    <div class="card-body">
      <h5 class="card-title">Liste des Reservations</h5>

      <table class="table" id="table">
        <thead>
            <tr>
                <th>Client</th>
                <th>Logment</th>
                <th>Telephone</th>
                <th>Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($reservations as $reservation)
            @php
                $user = User::find($reservation->user_id);
                $lodgment = Lodgment::find($reservation->lodgment_id);
            @endphp
                <tr>
                    <td>{{$user->name}}</td>
                    <td>{{$lodgment->title}}</td>
                    <td>{{$reservation->phone}}</td>
                    <td>{{$reservation->date}}</td>
                    <td>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">Pas de reservation pour le moment</td>
                </tr>
            @endforelse
                

        </tbody>
    </table>

    </div>
</div>
@endsection

