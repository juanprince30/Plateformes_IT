@extends('main.index')
@section('content')
    
    <!-- HOME -->
    <section class="section-hero overlay inner-page bg-image" style="background-image: url('IT/images/hero_1.jpg');" id="home-section">
        <div class="container">
          <div class="row">
            <div class="col-md-7">
              <h1 class="text-white font-weight-bold">Mes Offres</h1>
              <div class="custom-breadcrumbs">
                <a href="{{route('/')}}">Accueil</a> <span class="mx-2 slash">/</span>
                <span class="text-white"><strong>Mes offres</strong></span>
              </div>
            </div>
          </div>
        </div>
    </section>

    <section class="site-section" id="next">
        <div class="container">
            <button class="btn btn-primary mb-3">
                <a href="{{ route('offre.create') }}" style="color: white; text-decoration: none;">Poster une offre</a>
            </button>
            <div class="row">
                @foreach($offres as $offre)
                    @if($offre->date_fin_offre >= now()->format('Y-m-d'))
                        <div class="col-md-4 mb-4">
                            <div class="card">
                                <div class="card-body">
                                    <strong><p class="card-title">Job: {{ $offre->titre }}</p></strong>
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
                                    <button class="btn btn-info">{{ $offre->etat_offre}}</button>
                                </div>
                                <div class="card-footer text-center">
                                    <a href="{{ route('offre.showmesoffre', $offre) }}" class="btn btn-primary">Voir</a>
                                    <!-- Uncomment these lines if you want to add Edit and Delete functionality -->
                                    <a href="{{ route('offre.edit', $offre->id) }}" class="btn btn-secondary">Modifier</a>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
            {{ $offres->links() }}
        </div>
    </section>

@endsection