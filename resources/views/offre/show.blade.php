@extends('main.index')
@section('content')
    
    <!-- HOME -->
    <section class="section-hero overlay inner-page bg-image" style="background-image: url('IT/images/hero_1.jpg');" id="home-section">
        <div class="container">
          <div class="row">
            <div class="col-md-7">
              <h1 class="text-white font-weight-bold">{{ $offre->titre }}</h1>
              <div class="custom-breadcrumbs">
                <a href="{{route('/')}}">Home</a> <span class="mx-2 slash">/</span>
                <a href="{{route('offre.index')}}">Offre</a> <span class="mx-2 slash">/</span>
                <span class="text-white"><strong>{{ $offre->titre }}</strong></span>
              </div>
            </div>
          </div>
        </div>
      </section>
  
      
      <section class="site-section">
        <div class="container">
          <div class="row align-items-center mb-5">
            <div class="col-lg-8 mb-4 mb-lg-0">
              <div class="d-flex align-items-center">
                <div class="border p-2 d-inline-block mr-3 rounded">
                  @if ($offre->logo)
                    <img src="{{ asset('storage/' . $offre->logo) }}" alt="Logo">
                  @else
                    <img src="{{asset('IT/images/default-image.jpg')}}" alt="Image">
                  @endif
                </div>
                <div>
                  <h2>{{ $offre->titre }}</h2>
                  <div>
                    <span class="ml-0 mr-2 mb-2"><span class="icon-briefcase mr-2"></span>{{ $offre->entreprise }}</span>
                    <span class="m-2"><span class="icon-room mr-2"></span>{{ $offre->ville }}</span>
                    <span class="m-2"><span class="icon-clock-o mr-2"></span><span class="text-primary">{{ $offre->type_offre }}</span></span>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="row">
                <div class="col-6">
                  <a href="#" class="btn btn-block btn-light btn-md"><span class="icon-heart-o mr-2 text-danger"></span>Enregistrer</a>
                </div>
                <div class="col-6">
                    @if(!$hasApplied && $offre->user_id != auth()->id())
                        <a href="{{ route('postuler.create', ['offre' => $offre->id]) }}" class="btn btn-block btn-primary btn-md">Postuler</a>
                    @elseif($offre->user_id == auth()->id())
                        <button class="btn btn-block btn-primary btn-md" disabled>Postuler</button>
                        <em style="color: red">   *Vous ne pouvez pas postuler à votre propre offre!</em>
                    @else
                        <button class="btn btn-block btn-primary btn-md" disabled>Déjà postulé</button>
                    @endif
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-8">
              <div class="mb-5">
                <figure class="mb-5">
                    @if ($offre->image)
                        <img src="{{ asset('storage/' . $offre->image) }}" alt="Image" class="img-fluid rounded">
                    @else
                        <img src="{{asset('IT/images/default-image (2).jpg')}}" alt="Image" class="img-fluid rounded">
                    @endif
                </figure>
                <h3 class="h5 d-flex align-items-center mb-4 text-primary"><span class="icon-align-left mr-3"></span>Description de l'offre</h3>
                <p>{{ $offre->responsabilite }}</p>
              </div>

              <div class="mb-5">
                <h3 class="h5 d-flex align-items-center mb-4 text-primary"><span class="icon-book mr-3"></span>Niveau d'Etude</h3>
                <ul class="list-unstyled m-0 p-0">
                  <li class="d-flex align-items-start mb-2"><span class="icon-check_circle mr-2 text-muted"></span><span>{{ $offre->niveau_etude }} / {{ $offre->categorie->libelle }}</span></li>
                </ul>
              </div>

              @if ($offre->experience_requis)
                <div class="mb-5">
                    <h3 class="h5 d-flex align-items-center mb-4 text-primary"><span class="icon-rocket mr-3"></span>Experiences</h3>
                    <ul class="list-unstyled m-0 p-0">
                    <li class="d-flex align-items-start mb-2"><span class="icon-check_circle mr-2 text-muted"></span><span>{{ $offre->experience_requis }} an(s)</span></li>
                    </ul>
                </div>
              @endif
  
              <div class="mb-5">
                <h3 class="h5 d-flex align-items-center mb-4 text-primary"><span class="icon-turned_in mr-3"></span>Competence Requis</h3>
                <ul class="list-unstyled m-0 p-0">
                  <li class="d-flex align-items-start mb-2"><span class="icon-check_circle mr-2 text-muted"></span><span>{{ $offre->competence_requis }}</span></li>
                </ul>
              </div>
  
              <div class="row mb-5">
                <div class="col-6">
                  <a href="#" class="btn btn-block btn-light btn-md"><span class="icon-heart-o mr-2 text-danger"></span>Enregistrer</a>
                </div>
                <div class="col-6">
                    @if(!$hasApplied && $offre->user_id != auth()->id())
                        <a href="{{ route('postuler.create', ['offre' => $offre->id]) }}" class="btn btn-block btn-primary btn-md">Postuler</a>
                    @elseif($offre->user_id == auth()->id())
                        <button class="btn btn-block btn-primary btn-md" disabled>Postuler</button>
                        <em style="color: red">   *Vous ne pouvez pas postuler à votre propre offre!</em>
                    @else
                        <button class="btn btn-block btn-primary btn-md" disabled>Déjà postulé</button>
                    @endif
                </div>
              </div>
  
            </div>
            <div class="col-lg-4">
              <div class="bg-light p-3 border rounded mb-4">
                <h3 class="text-primary  mt-3 h5 pl-3 mb-3 ">Resume de l'Offre</h3>
                <ul class="list-unstyled pl-3 mb-0">
                  <li class="mb-2"><strong class="text-black">Publie le:</strong> {{ $offre->date_debut_offre }}</li>
                  <li class="mb-2"><strong class="text-black">Vacancy:</strong> 20</li>
                  <li class="mb-2"><strong class="text-black">Type d'Offre:</strong> {{ $offre->type_offre }}</li>
                  @if ($offre->experience_requis)
                    <li class="mb-2"><strong class="text-black">Experiences:</strong> {{ $offre->experience_requis }} an(s)</li>
                  @endif
                  <li class="mb-2"><strong class="text-black">Localisation:</strong> {{ $offre->ville }}, {{ $offre->pays }}</li>
                  @if ($offre->salaire)
                    <li class="mb-2"><strong class="text-black">Salaire:</strong> {{ $offre->salaire }} FCFA</li>
                  @endif
                  @if ($offre->prix)
                    <li class="mb-2"><strong class="text-black">Prix:</strong> {{ $offre->prix }} FCFA</li>
                  @endif
                  <li class="mb-2"><strong class="text-black">Contact:</strong> {{ $offre->email }}</li>
                  <li class="mb-2"><strong class="text-black">Deadline:</strong> {{ $offre->date_fin_offre }}</li>
                </ul>
                @if ($offre->website)
                    <div class="col-sm-12 col-md-12 mb-4 col-lg-12">
                        <strong class="d-block text-black mb-3">Site web</strong>
                        <a href="{{$offre->website}}" class="btn btn-outline-primary border-width-2">Visit Website</a>
                    </div>
                @endif
              </div>
  
              <div class="bg-light p-3 border rounded">
                <h3 class="text-primary  mt-3 h5 pl-3 mb-3 ">Partager</h3>
                <div class="px-3">
                  <a href="#" class="pt-3 pb-3 pr-3 pl-0"><span class="icon-facebook"></span></a>
                  <a href="#" class="pt-3 pb-3 pr-3 pl-0"><span class="icon-twitter"></span></a>
                  <a href="#" class="pt-3 pb-3 pr-3 pl-0"><span class="icon-linkedin"></span></a>
                  <a href="#" class="pt-3 pb-3 pr-3 pl-0"><span class="icon-pinterest"></span></a>
                </div>
              </div>
  
            </div>
          </div>
        </div>
      </section>
  
@endsection