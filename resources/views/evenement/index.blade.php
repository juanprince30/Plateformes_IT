@php
use Carbon\Carbon;
@endphp

@extends('main.index')

@section('content')

<section class="section-hero overlay inner-page bg-image" style="background-image: url('IT/images/hero_1.jpg');" id="home-section">
    <div class="container">
    <div class="row">
        <div class="col-md-7">
        <h1 class="text-white font-weight-bold">Evenements</h1>
        <div class="custom-breadcrumbs">
            <a href="{{route('offres.jobsRecents')}}">Home</a> <span class="mx-2 slash">/</span>
            <span class="text-white"><strong>Evenements</strong></span>
        </div>
        </div>
    </div>
    </div>
</section>
    
    <section style="margin-top: 5%; margin-bottom: 5%">
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
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

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

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var events = {!! json_encode($events) !!}; // Convertir le tableau PHP en objet JavaScript

        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth', // Vue initiale: mois
            buttonText: {
                today: 'Aujourd\'hui' // Texte pour le bouton "Today" en français
            },
            events: events.map(function(event) {
                return {
                    title: event.titre,
                    start: event.date_debut,
                    end: event.date_fin,
                    extendedProps: {
                        lieu: event.lieu,
                        type: event.type
                    },
                    url: '{{ url('events') }}/' + event.id // Lien vers la page de détail de l'événement
                };
            }),
            locale: 'fr', // Langue du calendrier
            eventTimeFormat: { hour: 'numeric', minute: '2-digit', meridiem: 'short' }, // Format d'affichage de l'heure
            editable: false, // Désactiver l'édition des événements sur le calendrier
            selectable: false, // Désactiver la sélection de plages horaires
            
            // Ajouter des tooltips
            eventMouseEnter: function(info) {
                var event = info.event;
                var tooltipContent = `
                    <div>
                        <strong>Titre:</strong> ${event.title}<br>
                        <strong>Date de début:</strong> ${moment(event.start).format('Y-MM-DD HH:mm')}<br>
                        <strong>Date de fin:</strong> ${moment(event.end).format('Y-MM-DD HH:mm')}<br>
                        <strong>Lieu:</strong> ${event.extendedProps.lieu || 'Non spécifié'}<br>
                        <strong>Type:</strong> ${event.extendedProps.type || 'Non spécifié'}
                    </div>
                `;

                // Créer un élément pour le tooltip
                var tooltip = document.createElement('div');
                tooltip.className = 'tooltip';
                tooltip.innerHTML = tooltipContent;
                document.body.appendChild(tooltip);

                // Positionner le tooltip
                var rect = info.el.getBoundingClientRect();
                tooltip.style.position = 'absolute';
                tooltip.style.left = `${rect.left + window.scrollX}px`;
                tooltip.style.top = `${rect.bottom + window.scrollY}px`;
                
                // Ajouter la classe de style pour le tooltip
                tooltip.classList.add('tooltip-show');
                
                // Supprimer le tooltip quand la souris quitte l'événement
                info.el.addEventListener('mouseleave', function() {
                    document.body.removeChild(tooltip);
                });
            }
        });

        calendar.render();
    });
</script>

<style>
    .tooltip {
        background: #ffffff;
        color: #000000;
        padding: 10px;
        border-radius: 5px;
        max-width: 300px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        pointer-events: none;
        opacity: 0;
        transition: opacity 0.3s;
    }

    .tooltip-show {
        opacity: 1;
    }
</style>


@endsection