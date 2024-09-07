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
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <h1>Ajouter une experience</h1>

            <form method='POST' action='{{ route('experience.store') }}'>

                @csrf
                <div>
                    <label for="titre" class="col-form-label">Titre</label>
                    <input type="text" class="form-control" name='titre' id="libelle" required>
                </div>
                <div>
                    <label for="description" class="col-form-label">Entreprise :</label>
                    <input type="text" class="form-control" name='entreprise' id="entreprise" required>
                </div>
                <div>
                    <label for="description" class="col-form-label">Nom surperviseur :</label>
                    <input type="text" class="form-control" name='nom_superviseur' id="nom_superviseur" required>
                </div>
                <div>
                    <label for="description" class="col-form-label">Contact surperviseur :</label>
                    <input type="text" class="form-control" name='contact_superviseur' id="contact_superviseur" required>
                </div>

                <div>
                    <label for="description" class="col-form-label">Responsabilite :</label>
                    <div>
                        <textarea name="responsabilite" id="responsabilite" cols="68" rows="10" required></textarea>
                    </div>
                </div>

                <div>
                    <label for="date_debut" class="col-form-label">Date Debut :</label>
                    <input type="date" class="form-control" name='date_debut' id="date_debut" required>
                </div>

                <div>
                    <label for="date_fin" class="col-form-label">Date Fin :</label>
                    <input type="date" class="form-control" name='date_fin' id="date_fin">
                </div>

                <br>
                <button type="submit" class="btn btn-primary">Enregistrer</button>


            <form>
        </div>
    </div>
@endsection