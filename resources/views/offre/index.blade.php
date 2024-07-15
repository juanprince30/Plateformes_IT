@extends('main.index')
@section('content')
    
    <!-- HOME -->
    <section class="section-hero overlay inner-page bg-image" style="background-image: url('IT/images/hero_1.jpg');" id="home-section">
        <div class="container">
          <div class="row">
            <div class="col-md-7">
              <h1 class="text-white font-weight-bold">Listes des Offres</h1>
              <div class="custom-breadcrumbs">
                <a href="{{route('offres.jobsRecents')}}">Home</a> <span class="mx-2 slash">/</span>
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
            <div class="text-center item-center justify-center">
                <h2> Filtre: </h2>
                <button class="btn btn-secondary" id="filter-Emploi">Emploi</button>
                <button class="btn btn-secondary" id="filter-stage">Stage</button>
                <button class="btn btn-secondary" id="filter-formation">Formation</button>
                <a href="{{ route('offre.index', ['all' => true]) }}" class="btn btn-primary">Voir toutes les offres</a>
            </div>
            <br>

            <ul class="job-listings mb-5" id="job-listings">
                    @foreach($offresPubliees  as $offre)
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
                    {{ $offresPubliees ->links() }}
            </ul>

        </div>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const filterButtons = {
                'filter-Emploi': 'Emploi',
                'filter-stage': 'Stage',
                'filter-formation': 'Formation'
            };
            // Fonction pour filtrer les offres par type
            Object.keys(filterButtons).forEach(buttonId => {
                document.getElementById(buttonId).addEventListener('click', function () {
                    filterOffers(filterButtons[buttonId]);
                });
            });
            // Fonction pour charger toutes les offres publiées
            document.getElementById('voir-plus-btn').addEventListener('click', function () {
                fetch('/offres/all') // Assurez-vous que cette route retourne toutes les offres publiées
                    .then(response => response.json())
                    .then(data => {
                        const listingsContainer = document.getElementById('job-listings');
                        listingsContainer.innerHTML = '';
                        data.forEach(offre => {
                            const listing = createListingElement(offre);
                            listingsContainer.appendChild(listing);
                        });
                    })
                    .catch(error => console.error('Error fetching offers:', error));
            });
            // Fonction pour filtrer les offres par type
            function filterOffers(type) {
                fetch(`api/offres/${type}`)
                    .then(response => response.json())
                    .then(data => {
                        const listingsContainer = document.getElementById('job-listings');
                        listingsContainer.innerHTML = '';
                        data.forEach(offre => {
                            const listing = createListingElement(offre);
                            listingsContainer.appendChild(listing);
                        });
                    })
                    .catch(error => console.error('Error fetching offers:', error));
            }
            // Fonction utilitaire pour créer un élément de liste d'offre
            function createListingElement(offre) {
                const listing = document.createElement('li');
                listing.className = 'job-listing d-block d-sm-flex pb-3 pb-sm-0 align-items-center';
                listing.dataset.type = offre.type_offre;
                listing.innerHTML = `
                    <a href="{{ route('offre.show', '') }}/${offre.id}"></a>
                    <div class="job-listing-logo">
                        <img src="${offre.logo ? '/storage/' + offre.logo : 'IT/images/default-image.jpg'}" alt="Logo" class="img-fluid">
                    </div>
                    <div class="job-listing-about d-sm-flex custom-width w-100 justify-content-between mx-4">
                        <div class="job-listing-position custom-width w-50 mb-3 mb-sm-0">
                            <h2>${offre.titre}</h2>
                            <strong>${offre.entreprise}</strong>
                        </div>
                        <div class="job-listing-location mb-3 mb-sm-0 custom-width w-25">
                            <span class="icon-room"></span>${offre.ville}, ${offre.pays}
                            <br>
                            <span class="icon-money"></span> ${offre.salaire} FCFA
                        </div>
                        <div class="job-listing-meta">
                            <span class="badge badge-info">${offre.type_offre}</span>
                        </div>
                    </div>
                `;
                return listing;
            }
        });
        </script>

@endsection