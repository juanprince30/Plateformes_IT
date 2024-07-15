@extends('main.index')

@section('content')
    
    <!-- HOME -->
    <section class="section-hero overlay inner-page bg-image" style="background-image: url('IT/images/hero_1.jpg');" id="home-section">
        <div class="container">
          <div class="row">
            <div class="col-md-7">
              <h1 class="text-white font-weight-bold">Postuler</h1>
              <div class="custom-breadcrumbs">
                <a href="{{route('offres.jobsRecents')}}">Home</a> <span class="mx-2 slash">/</span>
                <span class="text-white"><strong>Postuler</strong></span>
              </div>
            </div>
          </div>
        </div>
    </section>

    <section style="margin-top: 8%; margin-bottom: 8%;">
        <div class="row">
            <div class="col-md-2">

            </div>
            <div class="col-md-8">
                <h1>Postuler</h1>
                <form action="{{ route('postuler.store') }}" method="POST">
                    @csrf
                    
                    <input type="hidden" name="offre_id" value="{{ $offre->id }}">
        
                    <label for="descriptipon" class="col-form-label">Description de votre profil</label>
                    <textarea name="description" rows="10" placeholder="Decrivez votre profil, vos competences et experiences..." class="form-control"></textarea>
                    
                    <label for="motivation" class="col-form-label">Motivation</label>
                    <textarea name="motivation" rows="10" placeholder="Decrivez vos Motivations..." class="form-control" required></textarea>
                    
                    <br>
                    <div class="form-actions">
                        <button class="btn btn-secondary"> <a href="{{ route('offre.index') }}" style="color: white; text-decoration: none;">Cancel</a></button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
