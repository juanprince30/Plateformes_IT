@extends('main.index')
@section('content')

<section class="section-hero overlay inner-page bg-image" style="background-image: url('IT/images/hero_1.jpg');" id="home-section">
    <div class="container">
    <div class="row">
        <div class="col-md-7">
        <h1 class="text-white font-weight-bold">Profil</h1>
        <div class="custom-breadcrumbs">
            <a href="{{route('offres.jobsRecents')}}">Home</a> <span class="mx-2 slash">/</span>
            <a href="{{route('offre.index')}}">Profil</a> <span class="mx-2 slash">/</span>
            <span class="text-white"><strong>Profil</strong></span>
        </div>
        </div>
    </div>
    </div>
</section>

<section>
    <div class="row" style="margin-top: 8%; margin-bottom: 8%;">
        <div class="col-md-3">

        </div>
        <div class="col-md-6">
            <h1>Ajouter une compétence</h1>
            <form method='POST' action='{{ route('competence.store') }}'>
                @csrf
                <div>
                    <label for="titre" class="col-form-label">Titre</label>
                    <input type="text" class="form-control" name='titre' id="titre" required>
                </div>
                <div>
                    <label for="description" class="col-form-label">Description</label>
                    <input type="text" class="form-control" name='description' id="description" required>
                </div>
                <div>
                    <label for="categorie_id" class="col-form-label">Catégorie</label>
                    <input type="text" class="form-control" id="categorie_search" name="categorie_id" placeholder="Sélectionner une catégorie" required>
                </div>
                <br>
                <button type="submit" class="btn btn-primary">Enregistrer</button>
            </form>
        </div>
    </div>    
</section>
@endsection
