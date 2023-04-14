@extends('dashboard.partials.main')

@section('content')
<div class="card">
    <div class="card-body">
        <h5 class="card-title">Liste des clients</h5>
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
                @forelse ($customers as $customer)
                <tr>
                    <td>{{$customer->name}}</td>
                    <td>{{$customer->email}}</td>
                    <td></td>
                    <td>

                        <a href="/dashboard/customers/details/{{$customer->id}}" class="badge rounded-pill bg-info cursor-pointer" style="cursor: pointer;">Afficher</a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7">Pas de clients !</td>
                </tr>
                @endforelse

            </tbody>
        </table>

    </div>
</div>
@endsection