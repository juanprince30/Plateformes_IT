@extends('layouts.test')

@section('titre')
Détails de l'Offre
@endsection

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Détails de l'Offre</h1>

    <div class="card">
        <div class="card-body">
            <h3 class="card-title">{{ $offre->titre }}</h3>
            <p class="card-text"><strong>Type d'Offre:</strong> {{ $offre->type_offre }}</p>
            <p class="card-text"><strong>Ville:</strong> {{ $offre->ville }}</p>
            <p class="card-text"><strong>Pays:</strong> {{ $offre->pays }}</p>
            <p class="card-text"><strong>Salaire:</strong> {{ $offre->salaire }}</p>
            <p class="card-text"><strong>Expérience Requise:</strong> {{ $offre->experience_requis }}</p>
            <p class="card-text"><strong>Responsabilités:</strong> {{ $offre->responsabilite }}</p>
            <p class="card-text"><strong>Compétences Requises:</strong> {{ $offre->competence_requis }}</p>

            @auth
            <a href="{{ route('candidatures.create', $offre->id) }}" class="btn btn-success">Postuler</a>
            @endauth
            <a href="{{ route('offres.index') }}" class="btn btn-secondary">Retour à la liste</a>
        </div>
    </div>
</div>
@endsection
