@extends('main.index')

@section('content')
    
  <section class="section-hero overlay inner-page bg-image" style="background-image: url('IT/images/hero_1.jpg');" id="home-section">
    <div class="container">
      <div class="row">
        <div class="col-md-7">
          <h1 class="text-white font-weight-bold">Discussion</h1>
          <div class="custom-breadcrumbs">
            <a href="{{route('offres.jobsRecents')}}">Home</a> <span class="mx-2 slash">/</span>
            <a href="{{route('discussion.index')}}">Discussion</a> <span class="mx-2 slash">/</span>
            <span class="text-white"><strong>Reponse</strong></span>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="py-5" style="margin-top: 5%;">
    <div class="container">
      <div class="row">
        <div class="col-md-8 mx-auto">
          <div class="card shadow-sm">
            <div class="card-body">
              <h1 class="card-title mb-4">{{ $discussion->sujet }}</h1>
              <div class="discussion-info mb-4">
                <p class="card-text"><strong>Auteur :</strong> {{ $discussion->user->name }}</p>
                <p class="card-text"><strong>Statut :</strong> 
                  @if ($discussion->etat == 'Ouvert')
                    <span class="badge badge-success">{{ $discussion->etat }}</span>
                  @elseif ($discussion->etat == 'Fermer')
                    <span class="badge badge-danger">{{ $discussion->etat }}</span>
                  @endif
                </p>
              </div>
              <p class="card-text">{{ $discussion->contenu }}</p>
              @if ($discussion->etat == 'Ouvert')
                <button class="btn btn-primary"><a href="{{ route('reponse.create', ['discussion_id' => $discussion->id]) }}" style="color: white; text-decoration: none;">Répondre</a></button>
              @endif
              @if ($discussion->etat == 'Fermer')
                <button class="btn btn-primary mt-3" disabled>Répondre</button>
                <span style="color: red;">Cette discussion est fermer donc vous pouvez plus y repondre</span>
              @endif
              @if ($discussion->user_id == auth()->id())
                <form class="form-inline mt-2" action="{{ route('discussion.update', $discussion->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group mr-2">
                        <label for="etat" class="mr-2">État de la Discussion:</label>
                        <select name="etat" id="etat" class="form-control">
                            <option value="Ouvert" {{ $discussion->etat == 'Ouvert' ? 'selected' : '' }}>Ouvert</option>
                            <option value="Fermer" {{ $discussion->etat == 'Fermer' ? 'selected' : '' }}>Fermer</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-secondary">Mettre à jour</button>
                </form>
              @endif
            </div>
          </div>
          
          <div class="mt-5">
            <h3 class="mb-4">Réponses</h3>
            <div id="reponses">
              @foreach($reponses as $reponse)
                <div class="card mb-3">
                  <div class="card-body">
                    <p class="card-text mb-1 text-muted"><strong>Auteur :</strong> {{ $reponse->user->name }}</p>
                    <p class="card-text mb-1 text-muted"><strong>Date :</strong> {{ $reponse->created_at->format('d/m/Y H:i') }}</p>
                    <hr>
                    <p class="card-text">{{ $reponse->contenu }}</p>
                  </div>
                </div>
              @endforeach
            </div>
            <button id="load-more" data-id="{{ $discussion->id }}" data-offset="10" class="btn btn-secondary">Voir plus de réponses</button>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
    