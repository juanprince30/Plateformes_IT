@extends('main.index')

@section('content')
    
  <section class="section-hero overlay inner-page bg-image" style="background-image: url('IT/images/hero_1.jpg');" id="home-section">
    <div class="container">
      <div class="row">
        <div class="col-md-7">
          <h1 class="text-white font-weight-bold">Discussion</h1>
          <div class="custom-breadcrumbs">
            <a href="{{route('/')}}">Home</a> <span class="mx-2 slash">/</span>
            <a href="{{route('discussion.index')}}">Discussion</a> <span class="mx-2 slash">/</span>
            <span class="text-white"><strong>Discussion</strong></span>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="py-5">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="card shadow-sm">
            <div class="card-body">
              <h2 class="card-title mb-4">Nouvelle Discussion</h2>
              <form action="{{ route('discussion.store') }}" method="POST">
                @csrf
                <div class="form-group">
                  <label for="sujet">Sujet</label>
                  <input type="text" class="form-control" id="sujet" name="sujet" placeholder="Sujet" required>
                </div>
                <div class="form-group">
                  <label for="contenu">Contenu</label>
                  <textarea class="form-control" id="contenu" name="contenu" rows="5" placeholder="Contenu" required></textarea>
                </div>
                <div class="form-group">
                  <label for="categorie_id">Catégorie</label>
                  <select class="form-control" id="categorie_id" name="categorie_id" required>
                    <option value="">Sélectionnez une catégorie</option>
                    @foreach($categories as $category)
                      <option value="{{ $category->id }}">{{ $category->libelle }}</option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group">
                  <label for="etat">État</label>
                  <select class="form-control" id="etat" name="etat" required>
                    <option value="Ouvert">Ouvert</option>
                    <option value="Fermer">Fermé</option>
                  </select>
                </div>
                <button type="submit" class="btn btn-primary">Créer la Discussion</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

@endsection