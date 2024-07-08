@extends('main.index')
@section('content')
    
    <!-- HOME -->
    <section class="section-hero overlay inner-page bg-image" style="background-image: url('IT/images/hero_1.jpg');" id="home-section">
        <div class="container">
          <div class="row">
            <div class="col-md-7">
              <h1 class="text-white font-weight-bold">Listes des Offres</h1>
              <div class="custom-breadcrumbs">
                <a href="{{route('/')}}">Accueil</a> <span class="mx-2 slash">/</span>
                <span class="text-white"><strong>Offre</strong></span>
              </div>
            </div>
          </div>
        </div>
    </section>

    <section class="site-section" id="next">
        <div class="container">
            <div class="row mb-5 justify-content-center">
                <div class="col-md-7 text-center">
                  <h2 class="section-title mb-2">Offres Disponible</h2>
                </div>
            </div>

            <ul class="job-listings mb-5">
                    @foreach($offresPubliees as $offre)
                        @if($offre->etat_offre == 'Offre publiée')
                            <li class="job-listing d-block d-sm-flex pb-3 pb-sm-0 align-items-center">
                                <a href="{{ route('offre.show', $offre) }}"></a>
                                <div class="job-listing-logo">
                                    @if ($offre->logo)
                                        <img src="{{ asset('storage/' . $offre->logo) }}" alt="Logo" class="img-fluid">
                                    @else
                                        <img src="IT/images/default-image.jpg" alt="Image" class="img-fluid">
                                    @endif
                                </div>
                    
                                <div class="job-listing-about d-sm-flex custom-width w-100 justify-content-between mx-4">
                                    <div class="job-listing-position custom-width w-50 mb-3 mb-sm-0">
                                    <h2>{{ $offre->titre }}</h2>
                                    <strong>{{ $offre->entreprise }}</strong>
                                    </div>
                                    <div class="job-listing-location mb-3 mb-sm-0 custom-width w-25">
                                        <span class="icon-room"></span>{{ $offre->ville }}, {{ $offre->pays }}
                                        <br>
                                        <span class="icon-money"></span> {{$offre->salaire}} FCFA
                                    </div>
                                    <div class="job-listing-meta">
                                    <span class="badge badge-info">{{ $offre->type_offre }}</span>
                                    </div>
                                </div>
                                
                            </li>

                        @endif
                    @endforeach
                    </div>
                    {{ $offresPubliees->links() }}
            </ul>

        <div class="row pagination-wrap">
            <div class="col-md-6 text-center text-md-left mb-4 mb-md-0">
            <span>Showing 1-7 Of 22,392 Jobs</span>
            </div>
            <div class="col-md-6 text-center text-md-right">
            <div class="custom-pagination ml-auto">
                <a href="#" class="prev">Precedent</a>
                <div class="d-inline-block">
                <a href="#" class="active">1</a>
                <a href="#">2</a>
                <a href="#">3</a>
                <a href="#">4</a>
                </div>
                <a href="#" class="next">Suivant</a>
            </div>
            </div>
        </div>

        </div>
    </section>

@endsection