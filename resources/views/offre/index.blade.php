<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Intégration de Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Vos styles CSS personnalisés ici */
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
        <a href="{{ route('offre.create') }}" class="new-note-btn btn btn-success">
            Create Offre
        </a>
        <div class="offres">
            @foreach($offres as $offre)
                @if($offre->date_debut_offre <= now()->format('Y-m-d') && $offre->date_fin_offre >= now()->format('Y-m-d'))
                    <div class="offre-item card">
                        <div class="card-body">
                            <h5 class="card-title"><strong>{{ $offre->titre }}</strong></h5>
                            <p class="card-text">Type d'offre: {{ $offre->type_offre }}</p>
                            <p class="card-text">Ville: {{ $offre->ville }}</p>
                            <p class="card-text">Pays: {{ $offre->pays }}</p>
                            @if ($offre->salaire)
                                <p class="card-text">Salaire: {{ $offre->salaire }} FCFA</p>
                            @endif
                            @if ($offre->prix)
                                <p class="card-text">Prix: {{ $offre->prix }}</p>
                            @endif
                            @if ($offre->experience_requis)
                                <p class="card-text">Niveau d'Etude requis: {{ $offre->experience_requis }}</p>
                            @endif
                            <p class="card-text">Responsabilités: {{ $offre->responsabilite }}</p>
                            <p class="card-text">Compétences requises: {{ $offre->competence_requis }}</p>
                            <p class="card-text">Date de début: {{ $offre->date_debut_offre }}</p>
                            <p class="card-text">Date de fin: {{ $offre->date_fin_offre }}</p>
                        </div>
                        <div class="card-footer text-right">
                            <a href="{{ route('offre.show', $offre) }}" class="offre-view-button btn btn-primary">View</a>
                            <!-- Ajoutez ici les boutons Edit et Delete si nécessaire -->
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
        {{ $offres->links() }}
    </div>
    <!-- Intégration de Bootstrap JS (optionnel, si vous en avez besoin) -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
