@extends('dashboard.partials.main')
@php
    use App\Models\Lodgment;
    use App\Models\User;
@endphp
@section('content')
<div class="card">
    <div class="card-body">
      <h5 class="card-title">Liste des paiements</h5>
      <table class="table" id="table">
        <thead>
            <tr>
                <th>Client</th>
                <th>Logement</th>
                <th>Prix</th>
                <th>Nombre de mois</th>
                <th>Date</th>
                <th>Reference de paiement</th>
                <th>Etat</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody >
            @forelse ($payments as $payment)
                @php
                    $user = User::find($payment->user_id);
                    $lodgment = Lodgment::find($payment->lodgment_id);
                @endphp
            <tr >
                <td>
                    <a href="/dashboard/customers/details/{{$user->id}}" style="cursor: pointer;">{{$user->name}}</a>
                </td>
                <td>
                    <a href="/lodgments/details/{{$lodgment->slug}}" style="cursor: pointer;">{{$lodgment->title}}</a>
                </td>
                <td>{{$payment->price}} F</td>
                <td>{{$payment->month}} mois</td>
                <td>{{$payment->created_at}}</td>
                <td>{{$payment->id_ref}}</td>
                <td>
                    @if ($payment->state == 'waiting')
                        En attente
                    @elseif($payment->state == 'rejected')
                        Rejeté
                    @else
                        Approuvé
                    @endif
                </td>
                {{-- <td>{{$lodgment->state == 0 ? "En ligne" : "Pas en ligne"}}</td> --}}
                <td>
                    @if ($payment->state == 'waiting')
                        <a href="/payments/validate/{{$payment->id}}" type="button" class="badge rounded-pill bg-success cursor-pointer">Valider</a>
                        <a href="/payments/reject/{{$payment->id}}" type="button" class="badge rounded-pill bg-danger cursor-pointer">Rejeter</a>
                    @elseif($payment->state == 'rejected')
                        <a href="/payments/validate/{{$payment->id}}" type="button" class="badge rounded-pill bg-success cursor-pointer">Valider</a>
                    @else
                    <a href="/payments/reject/{{$payment->id}}" type="button" class="badge rounded-pill bg-danger cursor-pointer">Rejeter</a>
                    @endif
                    
                </td> 
            </tr>
            @empty
                <tr>
                    <td colspan="7">Pas de logments !</td>
                </tr>
            @endforelse ($lodgments as $lodgment)
                
        </tbody>
    </table>

    </div>
</div>
@endsection

