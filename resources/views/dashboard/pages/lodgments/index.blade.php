@extends('dashboard.partials.main')

@section('content')
<div class="card">
    <div class="card-body">
      <h5 class="card-title">Liste des logements</h5>
      <button type="submit" class="btn btn-primary">Ajouter un logement</button>
      <table class="table" id="table">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Prenom</th>
                <th>Adresse</th>
                <th>Telephone</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>
                    </td>
                </tr>

        </tbody>
    </table>

    </div>
</div>
@endsection

