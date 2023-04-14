@extends('dashboard.partials.main')

@section('content')
<div class="card">
    <div class="card-body">
      <h5 class="card-title">Liste de mes logements</h5>
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
        <tbody >
            @forelse ($lodgments as $lodgment)
            <tr >
                <td>
                    <img src="{{Storage::url($lodgment->img_path)}}" alt="{{$lodgment->title}}" height="40" width="50">    
                </td>
                <td>{{$lodgment->title}}</td>
                <td>{{$lodgment->description}}</td>
                <td>{{$lodgment->price}}</td>
                <td>{{$lodgment->location}}</td>
                <td>
                    @if ($lodgment->state == 0)
                        Pas en ligne
                    @elseif($lodgment->state == 1)
                        En ligne
                    @endif    
                </td>
                <td>
                    <a href={{"/lessor/propose/details/$lodgment->slug/$lodgment->id"}} class="badge rounded-pill bg-info cursor-pointer" style="cursor: pointer;">Afficher</a>
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

