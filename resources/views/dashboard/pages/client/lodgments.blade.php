
@extends('dashboard.partials.main')

<?php

use App\Models\Lodgment;
?>
@section('content')
<div class="card">
    <div class="card-body">
        <h5 class="card-title">Ma liste de logement</h5>
        <table class="table" id="table">
            <thead>
                <tr>
                    <th>Titre du logment</th>
                    <th>Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($reservations_approved as $reservation)
                    @php
                        

                        $lodgment = Lodgment::find($reservation->lodgment_id);
                    @endphp
                <tr>
                    <td>{{$lodgment->title}}</td>
                    <td>{{$lodgment->created_at}}</td>
                    <td>
                          
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7">Pas de reservation !</td>
                </tr>
                @endforelse

            </tbody>
        </table>

    </div>
</div>
@endsection