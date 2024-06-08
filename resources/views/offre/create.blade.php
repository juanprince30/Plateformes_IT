<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Offre</title>
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
    <h1>Créer une nouvelle offre</h1>
    <form action="{{ route('offre.store') }}" method="POST">
        @csrf
       
        <div class="form-group">
            <label for="titre">Titre</label>
            <input type="text" class="form-control" id="titre" name="titre" required>
        </div>
        
        <div class="form-group">
            <label for="type_offre">Type d'offre</label>
            <input type="text" class="form-control" id="type_offre" name="type_offre" required>
        </div>

        <div class="form-group">
            <label for="ville">Ville</label>
            <input type="text" class="form-control" id="ville" name="ville" required>
        </div>

        <div class="form-group">
            <label for="pays">Pays</label>
            <input type="text" class="form-control" id="pays" name="pays" required>
        </div>

        <div class="form-group">
            <label for="salaire">Salaire</label>
            <input type="text" class="form-control" id="salaire" name="salaire" required>
        </div>

        <div class="form-group">
            <label for="experience_requis">Expérience requise</label>
            <input type="text" class="form-control" id="experience_requis" name="experience_requis" required>
        </div>

        <div class="form-group">
            <label for="categorie_id">Catégorie</label>
            <select class="form-control" id="categorie_id" name="categorie_id" required>
                <option value="1">Développement Web</option>
                <option value="2">Cyber Sécurité</option>
            </select>
        </div>

        <div class="form-group">
            <label for="responsabilite">Responsabilités</label>
            <input type="text" class="form-control" id="responsabilite" name="responsabilite" required>
        </div>

        <div class="form-group">
            <label for="competence_requis">Compétences requises</label>
            <input type="text" class="form-control" id="competence_requis" name="competence_requis" required>
        </div>

        <div class="form-group">
            <label for="date_debut_offre">Date de début</label>
            <input type="date" class="form-control" id="date_debut_offre" name="date_debut_offre" required>
        </div>

        <div class="form-group">
            <label for="date_fin_offre">Date de fin</label>
            <input type="date" class="form-control" id="date_fin_offre" name="date_fin_offre" required>
        </div>

        <button type="submit" class="btn btn-primary">Soumettre</button>
    </form>
</div>
</body>
</html>
