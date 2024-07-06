@extends('main.index')
@section('content')
    
    <!-- HOME -->
    <section class="section-hero overlay inner-page bg-image" style="background-image: url('IT/images/hero_1.jpg');" id="home-section">
        <div class="container">
          <div class="row">
            <div class="col-md-7">
              <h1 class="text-white font-weight-bold">Listes des Offres</h1>
              <div class="custom-breadcrumbs">
                <a href="{{route('/')}}">Home</a> <span class="mx-2 slash">/</span>
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
            <div>
                <h2>Emplois|Stage|Formation</h2>
                <button id="filter-Emploi">Emploi</button>
                <button id="filter-stage">Stage</button>
                <button id="filter-formation">Formation</button>
                <a href="{{ route('offres.index', ['all' => true]) }}" class="btn btn-primary">Voir toutes les offres</a>


               
            </div>

            <ul class="job-listings mb-5" id="job-listings">
                @foreach($offres as $offre)
                    @if($offre->etat_offre == 'Offre publiée')
                        <li class="job-listing d-block d-sm-flex pb-3 pb-sm-0 align-items-center" data-type="{{ $offre->type_offre }}">
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
            </ul>

            {{ $offres->links() }}

            <div class="row pagination-wrap">
                <div class="col-md-6 text-center text-md-left mb-4 mb-md-0">
                    <span>Showing 1-7 Of 22,392 Jobs</span>
                </div>
                <div class="col-md-6 text-center text-md-right">
                    <div class="custom-pagination ml-auto">
                        <a href="#" class="prev">Prev</a>
                        <div class="d-inline-block">
                            <a href="#" class="active">1</a>
                            <a href="#">2</a>
                            <a href="#">3</a>
                            <a href="#">4</a>
                        </div>
                        <a href="#" class="next">Next</a>
                    </div>
                </div>
            </div>

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
        fetch(`/offres/${type}`)
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
