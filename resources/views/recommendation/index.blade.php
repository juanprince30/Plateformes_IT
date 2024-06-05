@extends('layouts.test')

@section('titre')
liste des recommendations
@endsection

@section('content')

<div class="container mt-5">

    <h1 class="mb-4">Liste des recommendations </h1>
    
    <div class="row">
        @foreach ($offres as $offre)
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">{{ $offre->titre }}</h5>
                        <p class="card-text"><strong>Type:</strong> {{ $offre->type_offre }}</p>
                        <p class="card-text"><strong>Ville:</strong> {{ $offre->ville }}</p>
                        <p class="card-text"><strong>Pays:</strong> {{ $offre->pays }}</p>
                        <p class="card-text"><strong>Salaire:</strong> {{ $offre->salaire }}</p>
                        <p class="card-text"><strong>Expérience Requise:</strong> {{ $offre->competence_requis }}</p>
                        <a href="{{ route('offres.show', $offre->id) }}" class="btn btn-primary">Voir Détails</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

</div>

@endsection
