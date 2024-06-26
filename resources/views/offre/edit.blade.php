<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
        .form-group select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        .form-group input:focus,
        .form-group select:focus {
            border-color: #007bff;
            outline: none;
        }
        .btn-primary {
            display: block;
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
            text-align: center;
            margin-top: 20px;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
        .form-group p {
            margin: 0;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Modifier l'offre</h1>
    <div>
        <form action="{{ route('offre.update', $offre->id) }}" method="POST" class="offre">
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
                <label for="salaire">Prix (Formation)</label>
                <input type="text" class="form-control" id="prix" name="prix" value="{{ $offre->prix }}">
            </div>
    
            <div class="form-group">
                <label for="salaire">Salaire (Stage ou Emploi)</label>
                <input type="text" class="form-control" id="salaire" name="salaire" value="{{ $offre->salaire }}">
            </div>

            <div class="form-group">
                <label for="experience_requis">Niveau d'Etude requis</label>
                <select name="experience_requis" id="experience_requis" class="form-control">
                    <option value="" selected disabled hidden>Selectionner une option</option>
                    <option value="Bac+1" {{ old('niveau_etude', $offre->experience_requis) == 'Bac+1' ? 'selected' : '' }}>Bac+1</option>
                    <option value="Bac+2" {{ old('niveau_etude', $offre->experience_requis) == 'Bac+2' ? 'selected' : '' }}>Bac+2</option>
                    <option value="Bac+3" {{ old('niveau_etude', $offre->experience_requis) == 'Bac+3' ? 'selected' : '' }}>Bac+3</option>
                    <option value="Bac+4" {{ old('niveau_etude', $offre->experience_requis) == 'Bac+4' ? 'selected' : '' }}>Bac+4</option>
                    <option value="Bac+5" {{ old('niveau_etude', $offre->experience_requis) == 'Bac+5' ? 'selected' : '' }}>Bac+5</option>
                    <option value="Bac+6" {{ old('niveau_etude', $offre->experience_requis) == 'Bac+6' ? 'selected' : '' }}>Bac+6</option>
                    <option value="Bac+7" {{ old('niveau_etude', $offre->experience_requis) == 'Bac+7' ? 'selected' : '' }}>Bac+7</option>
                </select>
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