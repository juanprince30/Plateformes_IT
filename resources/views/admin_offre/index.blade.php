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
        .offre-container {
            width: 80%;
            margin: 20px auto;
            padding: 20px;
        }
        .new-note-btn {
            display: inline-block;
            padding: 10px 15px;
            margin-bottom: 20px;
            background-color: #28a745;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .new-note-btn:hover {
            background-color: #218838;
        }
        .offres {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }
        .offre-item {
            background-color: #ffffff;
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            width: calc(33.333% - 20px);
            box-sizing: border-box;
        }
        .offre-body p {
            margin: 0 0 10px;
        }
        .offre-body strong {
            display: block;
            margin-bottom: 10px;
        }
        .offre-buttons {
            text-align: right;
        }
        .offre-view-button, .offre-edit-button, .offre-delete-button {
            display: inline-block;
            padding: 10px 15px;
            margin: 0 5px;
            border: none;
            border-radius: 3px;
            text-decoration: none;
            color: #fff;
        }
        .offre-view-button {
            background-color: #007bff;
        }
        .offre-view-button:hover {
            background-color: #0056b3;
        }
        .offre-edit-button {
            background-color: #ffc107;
        }
        .offre-edit-button:hover {
            background-color: #e0a800;
        }
        .offre-delete-button {
            background-color: #dc3545;
        }
        .offre-delete-button:hover {
            background-color: #c82333;
        }
    </style>
</head>
<body>
<div class="offre-container">
        <div class="offres">
        @foreach($offres as $offre)
            @if($offre->date_fin_offre >= now()->format('Y-m-d'))
            <div class="offre-item">
                <div class="offre-body">
                    <strong><p>Job: {{ $offre->titre }}</p></strong>
                    <p><strong>Utilisateur: {{ $offre->user->name}} {{ $offre->user->prenom}} </strong></p>
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
                        <p>Niveau d'Etude requis: {{ $offre->experience_requis }}</p>
                    @endif
                    <p>Responsabilités: {{ $offre->responsabilite }}</p>
                    <p>Compétences requises: {{ $offre->competence_requis }}</p>
                    <p>État de l'offre: {{ $offre->etat_offre }}</p>
                    <p>Date de début: {{ $offre->date_debut_offre }}</p>
                    <p>Date de fin: {{ $offre->date_fin_offre }}</p>
                </div>
                <div class="offre-buttons">
                    <a href="{{ route('offre.show', $offre) }}" class="offre-view-button">View</a>
                    <form action="{{ route('offre.destroy', $offre) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button class="offre-delete-button">Delete</button>
                    </form>
                </div>
            </div>
            @endif
        @endforeach
        </div>
    </div>
</body>
</html>