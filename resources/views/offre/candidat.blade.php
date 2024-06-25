<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails de l'Offre</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .offre-details {
            line-height: 1.6;
            border-bottom: 1px solid #ddd;
            padding-bottom: 20px;
            margin-bottom: 20px;
        }

        .candidature-details {
            background-color: #f8f9fa;
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 10px;
            margin-bottom: 10px;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
        }

        .offre-detail-container {
            width: 80%;
            margin: 20px auto;
            padding: 20px;
            background-color: #ffffff;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .offre-actions {
            text-align: right;
            margin-bottom: 20px;
        }

        .offre-back-button, .offre-edit-button, .offre-delete-button {
            display: inline-block;
            padding: 10px 15px;
            margin: 0 5px;
            border: none;
            border-radius: 3px;
            text-decoration: none;
            color: #fff;
        }

        .offre-back-button {
            background-color: #6c757d;
        }

        .offre-back-button:hover {
            background-color: #5a6268;
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

        .offre-details {
            line-height: 1.6;
        }

        .offre-details p {
            margin: 10px 0;
        }

        .offre-details strong {
            display: inline-block;
            width: 150px;
        }

        .postuler-button {
            display: inline-block;
            padding: 10px 15px;
            background-color: #28a745;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
        }

        .postuler-button:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>
<div class="offre-detail-container">
    
    
    <div class="offre-actions">
        <a href="{{ route('offre.mesoffre') }}" class="offre-back-button">Retour</a>
    </div>
    
    <div>
        <div>
                <h2>Details du candidat: </h2>

                <p><strong>Nom: </strong> {{ $candidature->user->name }}</p>
                <p><strong>Prénom: </strong> {{ $candidature->user->prenom }}</p>
                <p><strong>Email: </strong> {{ $candidature->user->email }}</p>
                <p><strong>Date Naissance: </strong> {{ $candidature->user->date_naissance }}</p>
                <p><strong>Niveau d'Etude: </strong> {{ $candidature->user->niveau_etude }}</p>
                <p><strong>Statut: </strong> {{ $candidature->user->statut }}</p>
                @foreach ($candidature->user->competence as $item)
                    <ul>
                        <p><strong>Competences: </strong><li> {{ $item->titre }}</li></p>
                    </ul>
                @endforeach

                @foreach ($candidature->user->experience as $item)
                    <ul>
                        <p><strong>Experience: </strong><li> {{ $item->titre}} , {{$item->entreprise}}</li></p>
                    </ul>
                @endforeach
                
                @foreach ($candidature->user->cv_et_motivation as $item)
                    <ul>
                        @if ($item->cv)
                            <p><strong>CV: </strong><li> <a href="{{ asset('storage/' . $item->cv) }}" target="_blank">Voir le fichier CV</a></li></p>
                        @endif
                        @if ($item->motivation)
                            <p><strong>Motivation: </strong><li> <a href="{{ asset('storage/' . $item->motivation) }}" target="_blank">Voir le fichier Motivation</a></li></p>
                        @endif
                    </ul>
                @endforeach

                @foreach ($candidature->user->certification as $item)
                    <ul>
                        <p><strong>certification: </strong><li> {{ $item->titre}} , {{$item->date_dobtention}}, <a href="{{ asset('storage/' . $item->fichier) }}" target="_blank">Voir la certification</a><br></li></p>
                    </ul>
                @endforeach
        

                
                @if ($candidature->description)
                    <p><strong>Description:</strong> {{ $candidature->description }}</p>
                @endif
                    <p><strong>Motivation:</strong> {{ $candidature->motivation }}</p>

                
                    <form class="form-inline mt-2" action="{{ route('postuler.updateStatus', $candidature->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group mr-2">
                            <label for="status" class="mr-2">État de la candidature:</label>
                            <select name="etat_candidature" id="status" class="form-control">
                                <option value="en attente" {{ $candidature->etat_candidature == 'en attente' ? 'selected' : '' }}>En attente</option>
                                <option value="accepté" {{ $candidature->etat_candidature == 'accepté' ? 'selected' : '' }}>Accepté</option>
                                <option value="rejeté" {{ $candidature->etat_candidature == 'rejeté' ? 'selected' : '' }}>Rejeté</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Mettre à jour</button>
                    </form>
                
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


