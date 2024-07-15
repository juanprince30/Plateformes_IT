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
                </div>
            </div>
        </div>
    </section>

@endsection