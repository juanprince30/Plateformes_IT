@extends('main.index')
@section('content')
 <!-- HOME -->
 <section class="section-hero overlay inner-page bg-image" style="background-image: url('IT/images/hero_1.jpg');" id="home-section">
    <div class="container">
      <div class="row">
        <div class="col-md-7">
          <h1 class="text-white font-weight-bold">Sign Up/Login</h1>
          <div class="custom-breadcrumbs">
            <a href="{{route('offres.jobsRecents')}}">Home</a> <span class="mx-2 slash">/</span>
            <span class="text-white"><strong>Log In</strong></span>
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
          <h2 id="form-title" class="mb-4">Se connecter</h2>
          <form id="form" class="p-4 border rounded" method="POST" action="{{ route('login') }}">
            @csrf
            <div class="row form-group" id="email-group">
              <div class="col-md-12 mb-3 mb-md-0">

                
                    @if ($errors->has('email'))
                      <div class="alert alert-danger mt-2 text-red-600">
                            @foreach ($errors->get('email') as $error)
                                <p class="text-danger">{{ $error }}</p>
                            @endforeach
                        </div>
                    @endif

                    @if ($errors->has('password'))
                      <div class="alert alert-danger mt-2 text-red-600">
                            @foreach ($errors->get('password') as $error)
                                <p class="text-danger">{{ $error }}</p>
                            @endforeach
                        </div>
                    @endif

                <label class="text-black" for="email">Email</label>
                <input type="text" id="email" class="form-control" placeholder="Adresse email" name="email" :value="old('email')" required autofocus autocomplete="username">
                
              </div>
            </div>
            <div class="row form-group" id="password-group">
              <div class="col-md-12 mb-3 mb-md-0">
                <label class="text-black" for="password">Mot de passe</label>
                <input type="password" id="password" class="form-control" placeholder="Mot de passe" name="password" required autocomplete="current-password" >
                
              </div>
            </div>
            <div class="row form-group mb-4" id="retype-password-group">
              <div class="col-md-12 mb-3 mb-md-0">
                <input type="checkbox" id="remember_me" name="remember">
                <label for="remember_me" class="text-black">Se souvenir de moi</label>
              </div>
            </div>
            <div class="row form-group">
              <div class="col-md-8 text-left">
                @if (Route::has('password.request'))
                    <a href="{{route('password.request')}}" class="text-primary">Mot de passe oublie? </a>
                @endif
                <p class="text-black">Pas de Compte? <a href="{{route('register')}}" class="text-primary">S'inscrire</a></p>
              </div>
              <div class="col-md-4">
                <input type="submit" value="Se connecter" class="btn px-4 btn-primary text-white" id="submit-button">
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>

  @endsection