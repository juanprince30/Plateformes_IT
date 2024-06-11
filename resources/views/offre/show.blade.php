<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="offre-detail-container">
        <h1>Show Post: {{ $offre->titre }}</h1>
        
        <div class="offre-actions">
            <a href="{{ route('offre.index') }}" class="offre-back-button">Retour</a>
            
            <!-- Uncomment these lines if you want to add Edit and Delete functionality -->
            <!-- <a href="{{ route('offre.edit', $offre) }}" class="offre-edit-button">Edit</a> -->
            <!-- <form action="{{ route('offre.destroy', $offre) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button class="offre-delete-button">Delete</button>
            </form> -->
        </div>
        
        <div class="offre-details">
            <p><strong>Titre:</strong> {{ $offre->titre }}</p>
            <p><strong>Type d'offre:</strong> {{ $offre->type_offre }}</p>
            <p><strong>Ville:</strong> {{ $offre->ville }}</p>
            <p><strong>Pays:</strong> {{ $offre->pays }}</p>
            @if ($offre->salaire)
                <p><strong> Salaire: </strong>{{ $offre->salaire }} FCFA</p>
            @endif
            @if ($offre->prix)
                <p><strong> Prix: </strong>{{ $offre->prix }}</p>
            @endif
            @if ($offre->experience_requis)
                <p><strong>Expérience requise: </strong>{{ $offre->experience_requis }}</p>
            @endif
            <p><strong>Responsabilités:</strong> {{ $offre->responsabilite }}</p>
            <p><strong>Compétences requises:</strong> {{ $offre->competence_requis }}</p>
            <p><strong>Date de début:</strong> {{ $offre->date_debut_offre }}</p>
            <p><strong>Date de fin:</strong> {{ $offre->date_fin_offre }}</p>
        </div>
        
        <a href="{{ route('postuler.create', ['offre' => $offre->id]) }}">Postuler</a>
    </div>
</body>
</html>