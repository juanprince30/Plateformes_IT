<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="container">
    <h1>Modifier l'offre</h1>
    <div>
        <form action="{{ route('offre.update', $offre) }}" method="POST" class="offre">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="titre">Titre</label>
                <input type="text" name="titre" class="form-control" value="{{ $offre->titre }}">
            </div>

            <div class="form-group">
                <label for="type_offre">Type d'offre</label>
                <input type="text" name="type_offre" class="form-control" value="{{ $offre->type_offre }}">
            </div>

            <div class="form-group">
                <label for="ville">Ville</label>
                <input type="text" name="ville" class="form-control" value="{{ $offre->ville }}">
            </div>

            <div class="form-group">
                <label for="pays">Pays</label>
                <input type="text" name="pays" class="form-control" value="{{ $offre->pays }}">
            </div>

            <div class="form-group">
                <label for="salaire">Salaire</label>
                <input type="text" name="salaire" class="form-control" value="{{ $offre->salaire }}">
            </div>

            <div class="form-group">
                <label for="experience_requis">Expérience requise</label>
                <textarea name="experience_requis" class="form-control" cols="30" rows="10">{{ $offre->experience_requis }}</textarea>
            </div>

            <div class="form-group">
                <label for="responsabilite">Responsabilités</label>
                <textarea name="responsabilite" class="form-control" cols="30" rows="10">{{ $offre->responsabilite }}</textarea>
            </div>

            <div class="form-group">
                <label for="competence_requis">Compétences requises</label>
                <textarea name="competence_requis" class="form-control" cols="30" rows="10">{{ $offre->competence_requis }}</textarea>
            </div>

            <div class="form-group">
                <label for="etat_offre">État de l'offre</label>
                <select name="etat_offre" class="form-control">
                    <option value="en cours" {{ $offre->etat_offre == 'en cours' ? 'selected' : '' }}>En cours</option>
                    <option value="terminée" {{ $offre->etat_offre == 'terminée' ? 'selected' : '' }}>Terminée</option>
                </select>
            </div>

            <div class="form-group">
                <label for="date_debut_offre">Date de début</label>
                <input type="date" name="date_debut_offre" class="form-control" value="{{ $offre->date_debut_offre }}">
            </div>

            <div class="form-group">
                <label for="date_fin_offre">Date de fin</label>
                <input type="date" name="date_fin_offre" class="form-control" value="{{ $offre->date_fin_offre }}">
            </div>

            <div class="form-group">
                <a href="{{ route('offre.index') }}" class="btn btn-secondary">Annuler</a>
                <button type="submit" class="btn btn-primary">Soumettre</button>
            </div>
        </form>
    </div>
</div>
</body>
</html>