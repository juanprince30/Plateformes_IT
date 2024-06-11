<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails de l'Offre</title>
    <style>
        .offre-details {
        line-height: 1.6;
        border-bottom: 1px solid #ddd;
        padding-bottom: 20px;
        margin-bottom: 20px;
    }

    /* Styles spécifiques pour les détails de la candidature */
    .candidature-details {
        background-color: #f8f9fa;
        border: 1px solid #ddd;
        border-radius: 5px;
        padding: 10px;
        margin-bottom: 10px;
    }

    /* Autres styles inchangés */
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
        <p><strong>Salaire:</strong> {{ $offre->salaire }}</p>
        <p><strong>Expérience requise:</strong> {{ $offre->experience_requis }}</p>
        <p><strong>Responsabilités:</strong> {{ $offre->responsabilite }}</p>
        <p><strong>Compétences requises:</strong> {{ $offre->competence_requis }}</p>
        <p><strong>Date de début:</strong> {{ $offre->date_debut_offre }}</p>
        <p><strong>Date de fin:</strong> {{ $offre->date_fin_offre }}</p>
    </div>
    <div>
    <div>
        <h2>Candidats ayant postulé</h2>
        @if($offre->Candidacture->isEmpty())
            <p>Aucun candidat n'a postulé pour cette offre.</p>
        @else
            <ul>
                @foreach($offre->Candidacture as $candidat)
                    <li>
                        <p>Nom : {{ $candidat->user->name }}</p>
                        <p>Prenom : {{ $candidat->user->prenom }}</p>
                        <p>Description : {{ $candidat->description }}</p>
                        <p>Motivation : {{ $candidat->motivation }}</p>
                       
                    </li>
                @endforeach
            </ul>
        @endif
</div>


    </div>
    
    <a href="{{ route('postuler.create', ['offre' => $offre->id]) }}" class="postuler-button">Voir plus</a>
</div>
</body>
</html>
