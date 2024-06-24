<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails de l'Offre</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <div class="card">
        <div class="card-header">
            <h1>Job : {{ $offre->titre }}</h1>
        </div>
        <div class="card-body">
            <div class="d-flex justify-content-between mb-3">
                <a href="{{ route('offre.index') }}" class="btn btn-secondary">Retour</a>
                <!-- Uncomment these lines if you want to add Edit and Delete functionality -->
                <!-- <a href="{{ route('offre.edit', $offre) }}" class="btn btn-warning">Edit</a> -->
                <!-- <form action="{{ route('offre.destroy', $offre) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger">Delete</button>
                </form> -->
            </div>
            <div class="offre-details">
                <p><strong>Titre:</strong> {{ $offre->titre }}</p>
                <p><strong>Type d'offre:</strong> {{ $offre->type_offre }}</p>
                <p><strong>Ville:</strong> {{ $offre->ville }}</p>
                <p><strong>Pays:</strong> {{ $offre->pays }}</p>
                @if ($offre->salaire)
                    <p><strong>Salaire:</strong> {{ $offre->salaire }} FCFA</p>
                @endif
                @if ($offre->prix)
                    <p><strong>Prix:</strong> {{ $offre->prix }}</p>
                @endif
                @if ($offre->experience_requis)
                    <p><strong>Expérience requise:</strong> {{ $offre->experience_requis }}</p>
                @endif
                <p><strong>Responsabilités:</strong> {{ $offre->responsabilite }}</p>
                <p><strong>Compétences requises:</strong> {{ $offre->competence_requis }}</p>
                <p><strong>Date de début:</strong> {{ $offre->date_debut_offre }}</p>
                <p><strong>Date de fin:</strong> {{ $offre->date_fin_offre }}</p>
            </div>
            <div>
                @if($offre->Candidacture->isEmpty())
                    <p>Aucun candidat n'a postulé pour cette offre.</p>
                @else
                    <h2>Candidat(e)s ayant postulé(e)s</h2>
                    <ul class="list-group">
                        @foreach($offre->Candidacture as $candidat)
                            <li class="list-group-item">
                                <p><strong>Nom:</strong> {{ $candidat->user->name }}</p>
                                <p><strong>Prénom:</strong> {{ $candidat->user->prenom }}</p>
                                @if ($candidat->description)
                                    <p><strong>Description:</strong> {{ $candidat->description }}</p>
                                @endif
                                <p><strong>Motivation:</strong> {{ $candidat->motivation }}</p>



                                <!-- Form to update candidature status -->
                                @if(Auth::user()->id === $offre->user_id)
                                    <form class="form-inline mt-2" action="{{ route('candidature.update', $candidat->id) }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <div class="form-group mr-2">
                                            <label for="status" class="mr-2">État de la candidature:</label>
                                            <select name="etat_candidature" id="status" class="form-control">
                                                <option value="en attente" {{ $candidat->etat_candidature == 'en attente' ? 'selected' : '' }}>En attente</option>
                                                <option value="accepté" {{ $candidat->etat_candidature == 'accepté' ? 'selected' : '' }}>Accepté</option>
                                                <option value="rejeté" {{ $candidat->etat_candidature == 'rejeté' ? 'selected' : '' }}>Rejeté</option>
                                            </select>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Mettre à jour</button>
                                    </form>
                                @endif
                            </li>
                        @endforeach
                    </ul>
                @endif
            </div>
        </div>
    </div>
</div>
<!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
