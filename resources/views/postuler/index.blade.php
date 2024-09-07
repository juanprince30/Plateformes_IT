@extends('main.index')

@section('content')
    
    <!-- HOME -->
    <section class="section-hero overlay inner-page bg-image" style="background-image: url('IT/images/hero_1.jpg');" id="home-section">
        <div class="container">
          <div class="row">
            <div class="col-md-7">
              <h1 class="text-white font-weight-bold">Postuler</h1>
              <div class="custom-breadcrumbs">
                <a href="{{route('offres.jobsRecents')}}">Home</a> <span class="mx-2 slash">/</span>
                <span class="text-white"><strong>Postuler</strong></span>
              </div>
            </div>
          </div>
        </div>
    </section>

    <section style="margin-top: 8%; margin-bottom: 8%;">
        <div class="container">
            <div class="row">
                @if ($candidatures->isEmpty())
                    <p class="text-center">Vous n'avez pas postulez à aucune Offres pour le moment.</p>
                @else
                    @foreach($candidatures as $candidature)
                        <div class="col-md-4 mb-4">
                            <div class="card">
                                <div class="card-body">
                                    <strong><p class="card-title">Titre: {{$candidature->offre->titre}}</p></strong>
                                    @if ($candidature->description)
                                        <p class="card-text">Description: {{$candidature->description}}</p>
                                    @endif
                                    <p class="card-text">Motivation: {{$candidature->motivation}}</p>
                                    @if ($candidature->etat_candidature == "En attente")
                                        <p class="card-text">Etat Candidature : <button class="btn btn-info">{{ $candidature->etat_candidature }}</button></p>
                                    @endif
                                    @if ($candidature->etat_candidature == "Accepter")
                                        <p class="card-text">Etat Candidature : <button class="btn btn-primary">{{ $candidature->etat_candidature }}</button></p>
                                    @endif
                                    @if ($candidature->etat_candidature == "Rejeter")
                                        <p class="card-text">Etat Candidature : <button class="btn btn-danger">{{ $candidature->etat_candidature }}</button></p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </section>
@endsection