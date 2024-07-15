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
                <h1>Ajouter une certification</h1>
    
                <form action="{{ route('certification.store') }}" method="POST" enctype="multipart/form-data">
    
                    @csrf
                    <div>
                        <label for="titre" class="col-form-label">Titre</label>
                        <input type="text" class="form-control" name='titre' id="titre" required>
                    </div>
                    <div>
                        <label for="description" class="col-form-label">Nom Institut :</label>
                        <input type="text" class="form-control" name='nom_institut' id="nom_institut" required>
                    </div>
                    <div>
                        <label for="description" class="col-form-label">Date d'obtention :</label>
                        <input type="date" class="form-control" name='date_dobtention' id="date_dobtention" required>
                    </div>
                    <br>
                    <div>
                        <label for="description" class="col-form-label">Fichier :</label>
                        <input type="file" name='fichier' id="fichier" class="form-control" required>
                    </div>
                    
                    <br>
                    <button type="submit" class="btn btn-primary">Enregistrer</button>
    
    
                <form>
            </div>
        </div>
    </section>
@endsection