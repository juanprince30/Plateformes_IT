<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier l'offre</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 60%;
            margin: 50px auto;
            padding: 20px;
            background-color: #ffffff;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            color: #333;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #555;
        }
        .form-group input,
        .form-group select,
        .form-group textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        .form-group input:focus,
        .form-group select:focus,
        .form-group textarea:focus {
            border-color: #007bff;
            outline: none;
        }
        .btn-primary,
        .btn-secondary {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
            text-align: center;
            text-decoration: none;
            margin-right: 10px;
        }
        .btn-secondary {
            background-color: #6c757d;
        }
        .btn-primary:hover,
        .btn-secondary:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Modifier l'offre</h1>
    <form action="{{ route('offre.update', $offre) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="titre">Titre</label>
            <input type="text" class="form-control" id="titre" name="titre" value="{{ $offre->titre }}" required>
        </div>

        <div class="form-group">
            <label for="type_offre">Type d'offre</label>
            <input type="text" class="form-control" id="type_offre" name="type_offre" value="{{ $offre->type_offre }}" required>
        </div>

        <div class="form-group">
            <label for="ville">Ville</label>
            <input type="text" class="form-control" id="ville" name="ville" value="{{ $offre->ville }}" required>
        </div>

        <div class="form-group">
            <label for="pays">Pays</label>
            <input type="text" class="form-control" id="pays" name="pays" value="{{ $offre->pays }}" required>
        </div>

        <div class="form-group">
            <label for="salaire">Salaire</label>
            <input type="text" class="form-control" id="salaire" name="salaire" value="{{ $offre->salaire }}" required>
        </div>

        <div class="form-group">
            <label for="experience_requis">Expérience requise</label>
            <input type="text" class="form-control" id="experience_requis" name="experience_requis" value="{{ $offre->experience_requis }}" required>
        </div>

        <div class="form-group">
            <label for="categorie_id">Catégorie</label>
            <select class="form-control" id="categorie_id" name="categorie_id" required>
                <option value="">Sélectionnez une catégorie</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ $offre->categorie_id == $category->id ? 'selected' : '' }}>{{ $category->libelle }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="responsabilite">Responsabilités</label>
            <textarea class="form-control" id="responsabilite" name="responsabilite" rows="5" required>{{ $offre->responsabilite }}</textarea>
        </div>

        <div class="form-group">
            <label for="competence_requis">Compétences requises</label>
            <textarea class="form-control" id="competence_requis" name="competence_requis" rows="5" required>{{ $offre->competence_requis }}</textarea>
        </div>

        <div class="form-group">
            <label for="etat_offre">État de l'offre</label>
            <select class="form-control" id="etat_offre" name="etat_offre" required>
                <option value="en cours" {{ $offre->etat_offre == 'en cours' ? 'selected' : '' }}>En cours</option>
                <option value="terminée" {{ $offre->etat_offre == 'terminée' ? 'selected' : '' }}>Terminée</option>
            </select>
        </div>

        <div class="form-group">
            <label for="date_debut_offre">Date de début</label>
            <input type="date" class="form-control" id="date_debut_offre" name="date_debut_offre" value="{{ $offre->date_debut_offre }}" required>
        </div>

        <div class="form-group">
            <label for="date_fin_offre">Date de fin</label>
            <input type="date" class="form-control" id="date_fin_offre" name="date_fin_offre" value="{{ $offre->date_fin_offre }}" required>
        </div>

        <div class="form-group">
            <a href="{{ route('offre.index') }}" class="btn btn-secondary">Annuler</a>
            <button type="submit" class="btn btn-primary">Soumettre</button>
        </div>
    </form>
</div>
</body>
</html>
