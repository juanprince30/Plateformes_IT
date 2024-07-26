@extends('main.index')

@section('content')
    


    <!-- HOME -->
    <section class="home-section section-hero overlay bg-image" style="background-image: url('IT/images/hero_1.jpg');" id="home-section">

      <div class="container">
        <div class="row align-items-center justify-content-center">
          <div class="col-md-12">
            <div class="mb-5 text-center">
              <h1 class="text-white font-weight-bold">Plateforme Collaborative Pour Professionnels De l'IT</h1>
              <p>Notre plateforme est le moyen le plus facile pour trouver des offres, des conseils, et rester à jour pour tous les Professionnels de l'IT.</p>
            </div>
          </div>
        </div>
      </div>

      <a href="#next" class="scroll-button smoothscroll">
        <span class=" icon-keyboard_arrow_down"></span>
      </a>

    </section>
    
    <section class="py-5 bg-image overlay-primary fixed overlay" id="next" style="background-image: url('images/hero_1.jpg');">
      <div class="container">
        <div class="row mb-5 justify-content-center">
          <div class="col-md-7 text-center">
            <h2 class="section-title mb-2 text-white">Statistique du site</h2>
            <p class="lead text-white">Notre site accueille par jour des centaines d'offres publiees.</p>
          </div>
        </div>
        <div class="row pb-0 block__19738 section-counter">
          <div class="col-6 col-md-6 col-lg-3 mb-5 mb-lg-0">
            <div class="d-flex align-items-center justify-content-center mb-2">
              <strong class="number" data-number="{{$visite}}">0</strong>
            </div>
            <span class="caption">Visites du site</span>
          </div>

          <div class="col-6 col-md-6 col-lg-3 mb-5 mb-lg-0">
            <div class="d-flex align-items-center justify-content-center mb-2">
              <strong class="number" data-number="{{$totalcandidacture}}">0</strong>
            </div>
            <span class="caption">Candidatures</span>
          </div>

          <div class="col-6 col-md-6 col-lg-3 mb-5 mb-lg-0">
            <div class="d-flex align-items-center justify-content-center mb-2">
              <strong class="number" data-number="{{$totalOffres}}">0</strong>
            </div>
            <span class="caption">Offre Publier</span>
          </div> 
          <div class="col-6 col-md-6 col-lg-3 mb-5 mb-lg-0">
            <div class="d-flex align-items-center justify-content-center mb-2">
              <strong class="number" data-number="{{$totaldiscussions}}">0</strong>
            </div>
            <span class="caption">Discussions Publier</span>
          </div> 
        </div>
      </div>
    </section>

    <section class="py-5 bg-dark overlay-primary fixed overlay" style="background-image: url('images/hero_1.jpg');" data-aos="zoom-in">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-md-8">
            <h2 class="text-white"><strong>Voulez vous postuler à une Offre ?</strong></h2>
            <p class="mb-0 text-white lead">Inscrivez vous pour pourvoir postuler aux offres et aussi publier vos propres offres.</p>
          </div>
          <div class="col-md-3 ml-auto">
            <a href="{{route('register')}}" class="btn btn-warning btn-block btn-lg">Sign Up</a>
          </div>
        </div>
      </div>
    </section>

    @auth
        {{-- recommendations pour l'user --}}
      <section class="site-section" data-aos="flip-left">
        <div class="container">
          <div class="row mb-5 justify-content-center">
            <div class="col-md-7 text-center">
                <h2 class="section-title mb-2">Suggéré pour vous</h2>
            </div>
          </div>
          @if (empty($offrerecommender) && empty($discussionrecommender))
              <div class="bg-warning">
                  <p class="text-center">Veuillez remplir votre profil pour pouvoir avoir des recommandations !! <a href="{{route('profile.edit')}}">Completer mon profil</a></p>
              </div>
          @endif
          <ul class="job-listings mb-5">
            @foreach($offrerecommender as $job)
            <li class="job-listing d-block d-sm-flex pb-3 pb-sm-0 align-items-center" data-aos="zoom-in">
              <a href="{{ route('offre.show', $job) }}"></a>
              <div class="job-listing-logo">
                @if ($job->logo)
                    <img src="{{ asset('storage/' . $job->logo) }}" alt="Logo" class="img-fluid">
                @else
                    <img src="IT/images/default-image.jpg" alt="Image" class="img-fluid">
                @endif
              </div>

              <div class="job-listing-about d-sm-flex custom-width w-100 justify-content-between mx-4">
                  <div class="job-listing-position custom-width w-50 mb-3 mb-sm-0">
                      <h2>{{ $job->titre }}</h2>
                      <strong>{{ $job->entreprise }}</strong>
                  </div>
                  <div class="job-listing-location mb-3 mb-sm-0 custom-width w-25">
                      <span class="icon-room"></span> {{ $job->ville }}
                      <br>
                      <span class="icon-money"></span> {{$job->salaire}} FCFA
                  </div>
                  <div class="job-listing-meta">
                      <span class="badge badge-info">{{ $job->type_offre }}</span>
                  </div>
              </div>
          </li>
            @endforeach
        </ul>

        <div class="row" id="discussion-list">
          @foreach($discussionrecommender as $discussion)
              <div class="col-md-12 mb-4" data-aos="zoom-in">
                  <div class="card badge-secondary">
                      <div class="card-body">
                          <h5 class="card-title">
                              <a href="{{ route('discussion.show', $discussion) }}">{{ $discussion->sujet }}</a>
                          </h5>
                          <p class="card-text">
                              {{ Str::limit($discussion->contenu, 150) }}
                          </p>
                          <div class="d-flex justify-content-between align-items-center">
                              <small class="text-muted">Posté par {{ $discussion->user->name }}</small>
                              <small class="text-muted">{{ $discussion->created_at->diffForHumans() }}</small>
                          </div>
                      </div>
                  </div>
              </div>
          @endforeach
      </div>
        
        </div>  
      </section>
    @endauth

    {{-- partie pour les offres reçentes --}}
    <section class="site-section" data-aos="fade-up">
      <div class="container">
        <div class="row mb-5 justify-content-center">
          <div class="col-md-7 text-center">
              <h2 class="section-title mb-2">Offres Récentes</h2>
          </div>
        </div>
        <ul class="job-listings mb-5">
          @foreach($offres as $job)
          <li class="job-listing d-block d-sm-flex pb-3 pb-sm-0 align-items-center" data-aos="zoom-in">
            <a href="{{ route('offre.show', $job) }}"></a>
            <div class="job-listing-logo">
              @if ($job->logo)
                  <img src="{{ asset('storage/' . $job->logo) }}" alt="Logo" class="img-fluid">
              @else
                  <img src="IT/images/default-image.jpg" alt="Image" class="img-fluid">
              @endif
            </div>

            <div class="job-listing-about d-sm-flex custom-width w-100 justify-content-between mx-4">
                <div class="job-listing-position custom-width w-50 mb-3 mb-sm-0">
                    <h2>{{ $job->titre }}</h2>
                    <strong>{{ $job->entreprise }}</strong>
                </div>
                <div class="job-listing-location mb-3 mb-sm-0 custom-width w-25">
                    <span class="icon-room"></span> {{ $job->ville }}
                    <br>
                    <span class="icon-money"></span> {{$job->salaire}} FCFA
                </div>
                <div class="job-listing-meta">
                    <span class="badge badge-info">{{ $job->type_offre }}</span>
                </div>
            </div>
        </li>
          @endforeach
      </ul>

      <!-- Pagination (à adapter selon vos besoins) -->
      <div class="row pagination-wrap">
          <div class="col-md-6 text-center text-md-left mb-4 mb-md-0">
              <span>Affichage de {{ $offres->count() }} des {{ $totalOffres }} offres</span>
          </div>
          <div class="col-md-6 text-center text-md-right">
            <div class="custom-pagination ml-auto">
                {{ $offres->links() }} <!-- Intégration de la pagination Laravel -->
            </div>
        </div>
      </div>  
    </section>

    {{-- Partie du code pour les discussions reçentes --}}
    <section class="site-section" data-aos="fade-left">
      <div class="container">
        <div class="row mb-5 justify-content-center">
          <div class="col-md-7 text-center">
              <h2 class="section-title mb-2">Discussions Récentes</h2>
          </div>
        </div>
        <div class="row" id="discussion-list">
          @foreach($discussions as $discussion)
              <div class="col-md-12 mb-4" data-aos="zoom-in">
                  <div class="card badge-secondary">
                      <div class="card-body">
                          <h5 class="card-title">
                              <a href="{{ route('discussion.show', $discussion) }}">{{ $discussion->sujet }}</a>
                          </h5>
                          <p class="card-text">
                              {{ Str::limit($discussion->contenu, 150) }}
                          </p>
                          <div class="d-flex justify-content-between align-items-center">
                              <small class="text-muted">Posté par {{ $discussion->user->name }}</small>
                              <small class="text-muted">{{ $discussion->created_at->diffForHumans() }}</small>
                          </div>
                      </div>
                  </div>
              </div>
          @endforeach
      </div>
      <div class="d-flex justify-content-center mt-4" id="pagination-links">
          {{ $discussions->links() }}
      </div>
    </section>

    
    @endsection
