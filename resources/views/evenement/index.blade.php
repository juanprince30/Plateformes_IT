@php
use Carbon\Carbon;
@endphp
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des événements</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <link href='https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.css' rel='stylesheet' />
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.js'></script>
    <style>
        .fc-daygrid-event { /* Classe pour cibler les événements dans la vue dayGrid */
            white-space: normal !important; /* Permet au texte de revenir à la ligne */
            overflow: visible !important; /* Garantit que le texte complet est visible */
            text-overflow: unset !important; /* Annule toute propriété de texte caché */
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1>Liste des événements</h1>
        
        <!-- Bouton pour créer un nouvel événement -->
        <a href="{{ route('events.create') }}" class="btn btn-primary mb-3">Créer un nouvel événement</a>

        <!-- Div pour afficher le calendrier -->
        <div id="calendar">
            
        </div>

        <div class="row">
            @foreach($events as $event)
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"> Titre : {{ $event->titre }}</h5>
                        <p class="card-text">Description : {{ $event->description }}</p>
                        <p class="card-text"><strong>Date de début:</strong> {{ Carbon::parse($event->date_debut)->format('Y-m-d H:i') }}</p>
                        <p class="card-text"><strong>Date de fin:</strong>  {{ Carbon::parse($event->date_fin)->format('Y-m-d H:i') }}</p>
                        <p class="card-text"><strong>Lieu:</strong> {{ $event->lieu }}</p>
                        <p class="card-text"><strong>Type:</strong> {{ ucfirst($event->type) }}</p>
                        <a href="{{ route('events.show', $event->id) }}" class="btn btn-info btn-sm">Voir</a>
                        <a href="{{ route('events.edit', $event->id) }}" class="btn btn-primary btn-sm">Éditer</a>
                        <form action="{{ route('events.destroy', $event->id) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet événement ?')">Supprimer</button>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <!-- FullCalendar JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/5.9.0/main.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var events = {!!json_encode($events) !!}; // Convert PHP array to JavaScript object

            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth', // Vue initiale: mois
                buttonText: {
                    today: 'Aujourd\'hui' // Texte pour le bouton "Today" en français
                    },
                events: events.map(function(event) {
                    return {
                        title: event.titre,
                        start: event.date_debut,
                        url: '{{ url('events') }}/' + event.id // Lien vers la page de détail de l'événement
                    };
                }),
                locale: 'fr', // Langue du calendrier
                eventTimeFormat: { hour: 'numeric', minute: '2-digit', meridiem: 'short' }, // Format d'affichage de l'heure
                editable: false, // Désactiver l'édition des événements sur le calendrier
                selectable: false, // Désactiver la sélection de plages horaires
                
            });

            calendar.render();
        });
    </script>

    <!-- Bootstrap JS and dependencies (jQuery, Popper.js) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
