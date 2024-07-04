@extends('main.index')
@section('content')
 <!-- HOME -->
 <section class="section-hero overlay inner-page bg-image" style="background-image: url('IT/images/hero_1.jpg');" id="home-section">
    <div class="container">
      <div class="row">
        <div class="col-md-7">
          <h1 class="text-white font-weight-bold">Sign Up/Register</h1>
          <div class="custom-breadcrumbs">
            <a href="{{route('/')}}">Home</a> <span class="mx-2 slash">/</span>
            <span class="text-white"><strong>Register</strong></span>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="site-section">
    <div class="container">
      <div class="row">
        <div class="col-lg-3"></div>
        <div class="col-lg-6 mb-5">
          <h2 id="form-title" class="mb-4">S'inscrire</h2>
          <form id="form" action="#" class="p-4 border rounded" method="POST" action="{{ route('register') }}">
                @csrf
                <div class="row form-group" id="name-group">
                    <div class="col-md-12 mb-3 mb-md-0">
                      <label class="text-black" for="name">Nom</label>
                      <input type="text" id="name" class="form-control" placeholder="Votre Nom" name="name" :value="old('name')" required autofocus autocomplete="name">
                        @if ($errors->has('name'))
                            <div class="mt-2 text-red-600">
                                @foreach ($errors->get('name') as $error)
                                    <p class="text-danger">{{ $error }}</p>
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>
                <div class="row form-group" id="prenom-group">
                    <div class="col-md-12 mb-3 mb-md-0">
                      <label class="text-black" for="prenom">Prenom</label>
                      <input type="text" id="prenom" class="form-control" placeholder="Votre prenom" name="prenom" :value="old('prenom')" required autofocus autocomplete="prenom">
                      @if ($errors->has('prenom'))
                            <div class="mt-2 text-red-600">
                                @foreach ($errors->get('prenom') as $error)
                                    <p class="text-danger">{{ $error }}</p>
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>
            <div class="row form-group" id="email-group">
              <div class="col-md-12 mb-3 mb-md-0">
                <label class="text-black" for="email">Email</label>
                <input type="text" id="email" class="form-control" placeholder="Adresse email" name="email" :value="old('email')" required autofocus autocomplete="username">
                @if ($errors->has('email'))
                    <div class="mt-2 text-red-600">
                        @foreach ($errors->get('email') as $error)
                            <p class="text-danger">{{ $error }}</p>
                        @endforeach
                    </div>
                @endif
                </div>
            </div>
            <div class="row form-group" id="password-group">
              <div class="col-md-12 mb-3 mb-md-0">
                <label class="text-black" for="password">Mot de passe</label>
                <input type="password" id="password" class="form-control" placeholder="Mot de passe" name="password" required autocomplete="new-password" >
                @if ($errors->has('password'))
                    <div class="mt-2 text-red-600">
                        @foreach ($errors->get('password') as $error)
                            <p class="text-danger">{{ $error }}</p>
                        @endforeach
                    </div>
                @endif
              </div>
            </div>
            <div class="row form-group mb-4" id="retype-password-group">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="text-black" for="retype-password">Retaper le mot de passe</label>
                  <input type="password" id="password_confirmation" class="form-control" placeholder="Retaper le mot de passe" name="password_confirmation" :value="old('name')" required autocomplete="new-password">
                  @if ($errors->has('password_confirmation'))
                    <div class="mt-2 text-red-600">
                        @foreach ($errors->get('password_confirmation') as $error)
                            <p class="text-danger">{{ $error }}</p>
                        @endforeach
                    </div>
                  @endif
                </div>
            </div>
            <div class="row form-group">
                <div class="col-md-8 text-left item-center">
                    <p class="text-black">Deja un Compte? <a href="{{route('login')}}" class="text-primary">Se connecter</a></p>
                </div>
                <div class="col-md-4">
                    <input type="submit" value="S'inscrire" class="btn px-4 btn-primary text-white" id="submit-button">
                </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>

  @endsection