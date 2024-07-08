@php
use Carbon\Carbon;
@endphp
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails de l'événement</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Détails de l'événement</h1>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $event->titre }}</h5>
                <p class="card-text">{{ $event->description }}</p>
                <p class="card-text"><strong>Date de début: </strong>{{ Carbon::parse($event->date_debut)->format('Y-m-d H:i') }}</p>
                <p class="card-text"><strong>Date de fin: </strong>{{ Carbon::parse($event->date_fin)->format('Y-m-d H:i') }}</p>
                <p class="card-text"><strong>Lieu:</strong> {{ $event->lieu }}</p>
                <p class="card-text"><strong>Type:</strong> {{ ucfirst($event->type) }}</p>

                <!-- Boutons d'action pour retourner à la liste et éditer l'événement -->
                <a href="{{ route('events.index') }}" class="btn btn-secondary">Retour à la liste</a>
                <a href="{{ route('events.edit', $event->id) }}" class="btn btn-primary">Éditer</a>

                <!-- Formulaire de suppression de l'événement -->
                <form action="{{ route('events.destroy', $event->id) }}" method="POST" style="display: inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet événement ?')">Supprimer</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies (jQuery, Popper.js) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
