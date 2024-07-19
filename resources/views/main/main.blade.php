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

          <div class="col-6 col-md-6 col-lg-3 mb-5 mb-lg-0"></div>
          <div class="col-6 col-md-6 col-lg-3 mb-5 mb-lg-0">
            <div class="d-flex align-items-center justify-content-center mb-2">
              <strong class="number" data-number="1930">0</strong>
            </div>
            <span class="caption">Candidatures</span>
          </div>

          <div class="col-6 col-md-6 col-lg-3 mb-5 mb-lg-0">
            <div class="d-flex align-items-center justify-content-center mb-2">
              <strong class="number" data-number="54">0</strong>
            </div>
            <span class="caption">Offre Publier</span>
          </div> 
          <div class="col-6 col-md-6 col-lg-3 mb-5 mb-lg-0"></div>
        </div>
      </div>
    </section>

    <section class="py-5 bg-dark overlay-primary fixed overlay" style="background-image: url('images/hero_1.jpg');">
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

    <section class="site-section">
      <div class="container">

        <div class="row mb-5 justify-content-center">
          <div class="col-md-7 text-center">
            <h2 class="section-title mb-2">Offres Reçents</h2>
          </div>
        </div>
        
        <ul class="job-listings mb-5">
          <li class="job-listing d-block d-sm-flex pb-3 pb-sm-0 align-items-center">
            <a href="job-single.html"></a>
            <div class="job-listing-logo">
              <img src="{{asset('IT/images/job_logo_1.jpg')}}" alt="Free Website Template by Free-Template.co" class="img-fluid">
            </div>

            <div class="job-listing-about d-sm-flex custom-width w-100 justify-content-between mx-4">
              <div class="job-listing-position custom-width w-50 mb-3 mb-sm-0">
                <h2>Product Designer</h2>
                <strong>Adidas</strong>
              </div>
              <div class="job-listing-location mb-3 mb-sm-0 custom-width w-25">
                <span class="icon-room"></span> New York, New York
              </div>
              <div class="job-listing-meta">
                <span class="badge badge-danger">Part Time</span>
              </div>
            </div>
            
          </li>
          <li class="job-listing d-block d-sm-flex pb-3 pb-sm-0 align-items-center">
            <a href="job-single.html"></a>
            <div class="job-listing-logo">
              <img src="{{asset('IT/images/job_logo_2.jpg')}}" alt="Free Website Template by Free-Template.co" class="img-fluid">
            </div>

            <div class="job-listing-about d-sm-flex custom-width w-100 justify-content-between mx-4">
              <div class="job-listing-position custom-width w-50 mb-3 mb-sm-0">
                <h2>Digital Marketing Director</h2>
                <strong>Sprint</strong>
              </div>
              <div class="job-listing-location mb-3 mb-sm-0 custom-width w-25">
                <span class="icon-room"></span> Overland Park, Kansas 
              </div>
              <div class="job-listing-meta">
                <span class="badge badge-success">Full Time</span>
              </div>
            </div>
          </li>

          <li class="job-listing d-block d-sm-flex pb-3 pb-sm-0 align-items-center">
            <a href="job-single.html"></a>
            <div class="job-listing-logo">
              <img src="{{asset('IT/images/job_logo_3.jpg')}}" alt="Free Website Template by Free-Template.co" class="img-fluid">
            </div>

            <div class="job-listing-about d-sm-flex custom-width w-100 justify-content-between mx-4">
              <div class="job-listing-position custom-width w-50 mb-3 mb-sm-0">
                <h2>Back-end Engineer (Python)</h2>
                <strong>Amazon</strong>
              </div>
              <div class="job-listing-location mb-3 mb-sm-0 custom-width w-25">
                <span class="icon-room"></span> Overland Park, Kansas 
              </div>
              <div class="job-listing-meta">
                <span class="badge badge-success">Full Time</span>
              </div>
            </div>
          </li>

          <li class="job-listing d-block d-sm-flex pb-3 pb-sm-0 align-items-center">
            <a href="job-single.html"></a>
            <div class="job-listing-logo">
              <img src="{{asset('IT/images/job_logo_4.jpg')}}" alt="Free Website Template by Free-Template.co" class="img-fluid">
            </div>

            <div class="job-listing-about d-sm-flex custom-width w-100 justify-content-between mx-4">
              <div class="job-listing-position custom-width w-50 mb-3 mb-sm-0">
                <h2>Senior Art Director</h2>
                <strong>Microsoft</strong>
              </div>
              <div class="job-listing-location mb-3 mb-sm-0 custom-width w-25">
                <span class="icon-room"></span> Anywhere 
              </div>
              <div class="job-listing-meta">
                <span class="badge badge-success">Full Time</span>
              </div>
            </div>
          </li>

          <li class="job-listing d-block d-sm-flex pb-3 pb-sm-0 align-items-center">
            <a href="job-single.html"></a>
            <div class="job-listing-logo">
              <img src="{{asset('IT/images/job_logo_5.jpg')}}" alt="Free Website Template by Free-Template.co" class="img-fluid">
            </div>

            <div class="job-listing-about d-sm-flex custom-width w-100 justify-content-between mx-4">
              <div class="job-listing-position custom-width w-50 mb-3 mb-sm-0">
                <h2>Product Designer</h2>
                <strong>Puma</strong>
              </div>
              <div class="job-listing-location mb-3 mb-sm-0 custom-width w-25">
                <span class="icon-room"></span> San Mateo, CA 
              </div>
              <div class="job-listing-meta">
                <span class="badge badge-success">Full Time</span>
              </div>
            </div>
          </li>
          <li class="job-listing d-block d-sm-flex pb-3 pb-sm-0 align-items-center">
            <a href="job-single.html"></a>
            <div class="job-listing-logo">
              <img src="{{asset('IT/images/job_logo_1.jpg')}}" alt="Free Website Template by Free-Template.co" class="img-fluid">
            </div>

            <div class="job-listing-about d-sm-flex custom-width w-100 justify-content-between mx-4">
              <div class="job-listing-position custom-width w-50 mb-3 mb-sm-0">
                <h2>Product Designer</h2>
                <strong>Adidas</strong>
              </div>
              <div class="job-listing-location mb-3 mb-sm-0 custom-width w-25">
                <span class="icon-room"></span> New York, New York
              </div>
              <div class="job-listing-meta">
                <span class="badge badge-danger">Part Time</span>
              </div>
            </div>
            
          </li>
          <li class="job-listing d-block d-sm-flex pb-3 pb-sm-0 align-items-center">
            <a href="job-single.html"></a>
            <div class="job-listing-logo">
              <img src="{{asset('IT/images/job_logo_2.jpg')}}" alt="Free Website Template by Free-Template.co" class="img-fluid">
            </div>

            <div class="job-listing-about d-sm-flex custom-width w-100 justify-content-between mx-4">
              <div class="job-listing-position custom-width w-50 mb-3 mb-sm-0">
                <h2>Digital Marketing Director</h2>
                <strong>Sprint</strong>
              </div>
              <div class="job-listing-location mb-3 mb-sm-0 custom-width w-25">
                <span class="icon-room"></span> Overland Park, Kansas 
              </div>
              <div class="job-listing-meta">
                <span class="badge badge-success">Full Time</span>
              </div>
            </div>
          </li>

          

          
        </ul>

        <div class="row pagination-wrap">
          <div class="col-md-6 text-center text-md-left mb-4 mb-md-0">
            <span>Showing 1-7 Of 43,167 Jobs</span>
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

    
    @endsection
