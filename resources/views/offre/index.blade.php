<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="offre-container">
        <a href="{{ route('offre.create') }}" class="new-note-btn">
            Create Offre
        </a>
        <div class="offres">
        @foreach($offres as $offre)
            @if($offre->date_fin_offre >= now()->format('Y-m-d'))
            <div class="offre-item">
                <div class="offre-body">
                    <strong><p>Job: {{ $offre->titre }}</p></strong>
                    <p>Type d'offre: {{ $offre->type_offre }}</p>
                    <p>Ville: {{ $offre->ville }}</p>
                    <p>Pays: {{ $offre->pays }}</p>
                    @if ($offre->salaire)
                        <p>Salaire: {{ $offre->salaire }} FCFA</p>
                    @endif
                    @if ($offre->prix)
                        <p>Prix: {{ $offre->prix }}</p>
                    @endif
                    @if ($offre->experience_requis)
                        <p>Expérience requise: {{ $offre->experience_requis }}</p>
                    @endif
                    
                    <p>Responsabilités: {{ $offre->responsabilite }}</p>
                    <p>Compétences requises: {{ $offre->competence_requis }}</p>
                    <p>État de l'offre: {{ $offre->etat_offre }}</p>
                    <p>Date de début: {{ $offre->date_debut_offre }}</p>
                    <p>Date de fin: {{ $offre->date_fin_offre }}</p>
                </div>
                <div class="offre-buttons">
                    <a href="{{ route('offre.show', $offre) }}" class="offre-view-button">View</a>
                    
                    <!-- Uncomment these lines if you want to add Edit and Delete functionality -->
                    <!-- <a href="{{ route('offre.edit', $offre) }}" class="offre-edit-button">Edit</a> -->
                    <!-- <form action="{{ route('offre.destroy', $offre) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button class="offre-delete-button">Delete</button>
                    </form> -->
                </div>
            </div>
            @endif
        @endforeach
        </div>
        {{ $offres->links() }}
    </div>
</body>
</html>