@extends('main.index')
@section('content')
    
    <!-- HOME -->
    <section class="section-hero overlay inner-page bg-image" style="background-image: url('IT/images/hero_1.jpg');" id="home-section">
        <div class="container">
          <div class="row">
            <div class="col-md-7">
              <h1 class="text-white font-weight-bold">Candidatures</h1>
              <div class="custom-breadcrumbs">
                <a href="{{route('/')}}">Home</a> <span class="mx-2 slash">/</span>
                <a href="{{route('offre.index')}}">Offre</a> <span class="mx-2 slash">/</span>
                <span class="text-white"><strong>Candidatures</strong></span>
              </div>
            </div>
          </div>
        </div>
      </section>


      <section style="margin-top: 8%; margin-bottom: 8%;">
        <div class="row">
    
            <div class="col-md-2">
                
            </div>
            <div class="col-md-8 justify-content-center">
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
                                            <option value="En attente" {{ $candidature->etat_candidature == 'En attente' ? 'selected' : '' }}>En attente</option>
                                            <option value="Accepter" {{ $candidature->etat_candidature == 'Accepter' ? 'selected' : '' }}>Accepter</option>
                                            <option value="Rejeter" {{ $candidature->etat_candidature == 'Rejeter' ? 'selected' : '' }}>Rejeter</option>
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Mettre à jour</button>
                                </form>
            </div>
            <div class="col-md-2">
                <button class="btn btn-secondary"><a href="{{route('offre.mesoffre')}}" style="color: white; text-decoration: none;">Retour</a></button>
            </div>
            
        </div>
      </section>


