
<!doctype html>
<html lang="en">
  <head>
    <title>Plateforme IT</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="author" content="Free-Template.co" />
    <link rel="shortcut icon" href="ftco-32x32.png">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-rc.0/css/select2.min.css" rel="stylesheet" />
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <link href='https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.css' rel='stylesheet' />
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.js'></script>

    
    <link rel="stylesheet" href="{{ asset ('IT/css/custom-bs.css')}}">
    <link rel="stylesheet" href="{{ asset ('IT/css/jquery.fancybox.min.css')}}">
    <link rel="stylesheet" href="{{ asset ('IT/css/bootstrap-select.min.css')}}">
    <link rel="stylesheet" href="{{ asset ('IT/fonts/icomoon/style.css')}}">
    <link rel="stylesheet" href="{{ asset ('IT/fonts/line-icons/style.css')}}">
    <link rel="stylesheet" href="{{ asset ('IT/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{ asset ('IT/css/animate.min.css')}}">
    <link rel="stylesheet" href="{{asset('IT/css/quill.snow.css')}}">

    <!-- MAIN CSS -->
    <link rel="stylesheet" href="{{ asset ('IT/css/style.css')}}"> 

    <style>
      .fc-daygrid-event { /* Classe pour cibler les événements dans la vue dayGrid */
          white-space: normal !important; /* Permet au texte de revenir à la ligne */
          overflow: visible !important; /* Garantit que le texte complet est visible */
          text-overflow: unset !important; /* Annule toute propriété de texte caché */
      }
    </style>
  </head>
  <body id="top">

  <div id="overlayer"></div>
    <div class="loader">
      <div class="spinner-border text-primary" role="status">
        <span class="sr-only">Loading...</span>
      </div>
    </div>
    

<div class="site-wrap">

    <div class="site-mobile-menu site-navbar-target">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div> <!-- .site-mobile-menu -->
    

    <!-- NAVBAR -->
    @guest
    <header class="site-navbar mt-3">
      <div class="container-fluid">
        <div class="row align-items-center">
          <div class="site-logo col-6"><a href="{{route('/')}}">IT-Board</a></div>

          <nav class="mx-auto site-navigation">
            <ul class="site-menu js-clone-nav d-none d-xl-block ml-0 pl-0">
              <li><a href="{{route('/')}}" class="nav-link active">Home</a></li>
              <li class="has-children">
                <a href="{{route('/')}}">Offres</a>
                <ul class="dropdown">
                  <li><a href="{{route('offre.index')}}">Voir les offres</a></li>
                  <li><a href="{{route('offre.mesoffre')}}">Mes offres</a></li>
                  <li><a href="{{('')}}">Mes candidatures</a></li>
                  <li><a href="{{route('offre.create')}}"> Poster offre</a></li>
                </ul>
              </li>
              <li><a href="{{('')}}">Forum</a></li>
              <li><a href="{{('')}}">Cours</a></li>
              <li><a href="{{('')}}">Evenement</a></li>
              <li class="d-lg-none"><a href="{{route('offre.create')}}"><span class="mr-2">+</span> Poster Offre</a></li>
              <li class="d-lg-none"><a href="{{route('login')}}">Log In</a></li>
            </ul>
          </nav>
          <div class="right-cta-menu text-right d-flex aligin-items-center col-6">
            <div class="ml-auto">
              <a href="{{route('offre.create')}}" class="btn btn-outline-white border-width-2 d-none d-lg-inline-block"><span class="mr-2 icon-add"></span>Poster offre</a>
              <a href="{{route('login')}}" class="btn btn-primary border-width-2 d-none d-lg-inline-block"><span class="mr-2 icon-lock_outline"></span>Log In</a>
            </div>
            <a href="#" class="site-menu-toggle js-menu-toggle d-inline-block d-xl-none mt-lg-2 ml-3"><span class="icon-menu h3 m-0 p-0 mt-2"></span></a>
          </div>
        </div>
      </div>
    </header>
    @endguest

    @auth
    <header class="site-navbar mt-3">
      <div class="container-fluid">
        <div class="row align-items-center">
          <div class="site-logo col-6"><a href="{{('')}}">IT-Board</a></div>

          <nav class="mx-auto site-navigation">
            <ul class="site-menu js-clone-nav d-none d-xl-block ml-0 pl-0">
              <li><a href="{{('')}}" class="nav-link active">Home</a></li>
              <li class="has-children">
                <a href="{{('')}}">Offres</a>
                <ul class="dropdown">
                  <li><a href="{{route('offre.index')}}">Voir les offres</a></li>
                  <li><a href="{{route('offre.mesoffre')}}">Mes offres</a></li>
                  <li><a href="{{route('postuler.index')}}">Mes candidatures</a></li>
                  <li><a href="{{route('offre.create')}}"> Poster offre</a></li>
                </ul>
              </li>
              <li><a href="{{route('discussion.index')}}">Forum</a></li>
              <li><a href="{{('')}}">Cours</a></li>
              <li><a href="{{route('events.index')}}">Evenement</a></li>
              <li class="d-lg-none"><a href="{{('')}}"><span class="mr-2">+</span> Poster offre</a></li>
              <li class="d-lg-none"><a href="{{('')}}">Profile</a></li>
              <li class="d-lg-none">
                <form action="{{route('logout')}}" method="POST" class="border-width-2 d-none d-lg-inline-block">
                  @csrf
                  <button type="submit" class="btn btn-danger border-width-2 d-none d-lg-inline-block" onclick="return confirm('Voulez vous etre deconnecter du site?')"><span class="mr-2 icon-sign-out"></span>log out</button>
                </form>
              </li>
            </ul>
          </nav>
          <div class="right-cta-menu text-right d-flex aligin-items-center col-6">
            <div class="ml-auto">
              <a href="" class="d-inline-block" style="text-decoration: none; padding: 12px;"><span class="icon-bell"></span><sup class="text-white bg-danger" style="font-size: 14px;">6</sup></a>
              <div class="dropdown d-inline-block">
                <a href="{{route('profile.edit')}}" class="btn btn-outline-white border-width-2 d-none d-lg-inline-block dropdown-toggle" id="userDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="mr-2 icon-user"></span>{{Auth::user()->name}}</a>
                <div class="dropdown-menu" aria-labelledby="userDropdown">
                  <a class="dropdown-item" href="{{ route('profile.edit') }}">Profile</a>
                  <form action="{{route('logout')}}" method="POST" class="border-width-2 d-none d-lg-inline-block">
                    @csrf
                    <button type="submit" class="dropdown-item btn btn-danger" onclick="return confirm('Voulez vous etre deconnecter du site?')"><span class="mr-2 icon-sign-out"></span>log out</button>
                  </form>
                </div>
              </div>
            </div>
            <a href="#" class="site-menu-toggle js-menu-toggle d-inline-block d-xl-none mt-lg-2 ml-3"><span class="icon-menu h3 m-0 p-0 mt-2"></span></a>
          </div>
        </div>
      </div>
    </header>
    @endauth

    @yield('content')
    
    <footer class="site-footer">
      
      <a href="#top" class="smoothscroll scroll-top">
        <span class="icon-keyboard_arrow_up"></span>
      </a>

      <div class="container">
        <div class="row mb-5">
          <div class="col-6 col-md-3 mb-4 mb-md-0">
            <h3>Search Trending</h3>
            <ul class="list-unstyled">
              <li><a href="#">Web Design</a></li>
              <li><a href="#">Graphic Design</a></li>
              <li><a href="#">Web Developers</a></li>
              <li><a href="#">Python</a></li>
              <li><a href="#">HTML5</a></li>
              <li><a href="#">CSS3</a></li>
            </ul>
          </div>
          <div class="col-6 col-md-3 mb-4 mb-md-0">
            <h3>Company</h3>
            <ul class="list-unstyled">
              <li><a href="#">About Us</a></li>
              <li><a href="#">Career</a></li>
              <li><a href="#">Blog</a></li>
              <li><a href="#">Resources</a></li>
            </ul>
          </div>
          <div class="col-6 col-md-3 mb-4 mb-md-0">
            <h3>Support</h3>
            <ul class="list-unstyled">
              <li><a href="#">Support</a></li>
              <li><a href="#">Privacy</a></li>
              <li><a href="#">Terms of Service</a></li>
            </ul>
          </div>
          <div class="col-6 col-md-3 mb-4 mb-md-0">
            <h3>Contact Us</h3>
            <div class="footer-social">
              <a href="#"><span class="icon-facebook"></span></a>
              <a href="#"><span class="icon-twitter"></span></a>
              <a href="#"><span class="icon-instagram"></span></a>
              <a href="#"><span class="icon-linkedin"></span></a>
            </div>
          </div>
        </div>

        <div class="row text-center">
          <div class="col-12">
            <p class="copyright"><small>
              <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | TEAM 4 Laravel
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></small></p>
          </div>
        </div>
      </div>
    </footer>
  
  </div>

    <!-- SCRIPTS -->
    <script src="{{ asset ('IT/js/jquery.min.js')}}"></script>
    <script src="{{ asset ('IT/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{ asset ('IT/js/isotope.pkgd.min.js')}}"></script>
    <script src="{{ asset ('IT/js/stickyfill.min.js')}}"></script>
    <script src="{{ asset ('IT/js/jquery.fancybox.min.js')}}"></script>
    <script src="{{ asset ('IT/js/jquery.easing.1.3.js')}}"></script>
    
    <script src="{{ asset ('IT/js/jquery.waypoints.min.js')}}"></script>
    <script src="{{ asset ('IT/js/jquery.animateNumber.min.js')}}"></script>
    <script src="{{ asset ('IT/js/owl.carousel.min.js')}}"></script>
    <script src="{{ asset ('IT/js/quill.min.js')}}"></script>
    
    <script src="{{ asset ('IT/js/bootstrap-select.min.js')}}"></script>
    
    <script src="{{ asset ('IT/js/custom.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-rc.0/js/select2.min.js"></script>

    <script>
      $(document).ready(function() {
          $('#categorie_search').select2({
              placeholder: 'Sélectionner une catégorie',
              minimumInputLength: 2,
              ajax: {
                  url: '{{ url('/api/categorie/search') }}',  // Utilisation de l'URL directe de l'API
                  dataType: 'json',
                  delay: 250,
                  data: function (params) {
                      return {
                          q: params.term
                      };
                  },
                  processResults: function (data) {
                      return {
                          results: $.map(data, function (item) {
                              return {
                                  id: item.id,
                                  text: item.libelle
                              };
                          })
                      };
                  },
                  cache: true
              }
          });
  
          $('#categorie_search').on('select2:select', function (e) {
              var data = e.params.data;
              $('.categorie_id').val(data.id);
          });
      });
  </script>

  <script>
    document.getElementById('logo').addEventListener('change', function(event) {
      const file = event.target.files[0];
      if (file) {
        const img = new Image();
        img.onload = function() {
          if (img.width === 150 && img.height === 150) {
            // Les dimensions sont correctes, vous pouvez soumettre le formulaire
            document.getElementById('image-error').textContent = '';
          } else {
            // Les dimensions ne sont pas correctes, empêcher la soumission
            document.getElementById('image-error').textContent = 'L\'image doit avoir une dimension de 150x150 pixels.';
            event.target.value = ''; // Réinitialiser l'input file
          }
        };
        img.src = URL.createObjectURL(file);
      }
    });
  </script>
  <script>
    $(document).ready(function() {
        $('#search-input').select2({
            placeholder: "Rechercher par catégorie...",
            ajax: {
                url: '/api/discussions/search',
                dataType: 'json',
                delay: 250,
                processResults: function (data) {
                    return {
                        results: data.discussions.map(function(discussion) {
                            return { id: discussion.id, text: discussion.sujet };
                        })
                    };
                },
                cache: true
            }
        });

        $('#search-input').on('select2:select', function(e) {
            var discussionId = e.params.data.id;
            window.location.href = `/discussion/${discussionId}`;
        });
    });
  </script>

<script>
  document.getElementById('load-more').addEventListener('click', function() {
      var button = this;
      var offset = button.getAttribute('data-offset');
      var discussionId = button.getAttribute('data-id');

      fetch(`/discussion/${discussionId}/loadMore/${offset}`)
          .then(response => response.json())
          .then(data => {
              console.log(data); // Ajouté pour déboguer les données reçues
              var reponsesDiv = document.getElementById('reponses');
              data.forEach(reponse => {
                  var reponseDiv = document.createElement('div');
                  reponseDiv.classList.add('reply', 'p-3', 'bg-light', 'rounded');
                  reponseDiv.innerHTML = `
                      <p class="reply-author font-weight-bold text-primary">Auteur : ${reponse.user.name}</p>
                      <p class="timestamp">Date : ${reponse.created_at}</p>
                      <p class="reply-content">${reponse.contenu}</p>
                  `;
                  reponsesDiv.appendChild(reponseDiv);
              });
              button.setAttribute('data-offset', parseInt(offset) + 10);
          })
          .catch(error => console.error('Error:', error));
  });
  </script>
   <!-- FullCalendar JavaScript -->
   <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/5.9.0/main.min.js"></script>


  </body>
</html>