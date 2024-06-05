<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Ajouter une certification</title>

    </head>
    <body>
        @auth


        <h1>Ajouter une certification</h1>

        <form action="{{ route('certification.store') }}" method="POST" enctype="multipart/form-data">

            @csrf
            <div class="mb-3 row">
                <label for="titre" class="col-sm-2 col-form-label">Titre</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='titre' id="titre" required>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="description" class="col-sm-2 col-form-label">Nom Institut :</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='nom_institut' id="nom_institut" required>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="description" class="col-sm-2 col-form-label">Date d'obtention :</label>
                <div class="col-sm-10">
                    <input type="date" class="form-control" name='date_dobtention' id="date_dobtention" required>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="description" class="col-sm-2 col-form-label">Fichier :</label>
                <div class="col-sm-10">
                    <input type="file" name='fichier' id="fichier" required>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Enregistrer</button>


        <form>
        @endauth
        @guest
            <h1>VOUS ETES PAS CONNECTER</h1>
            <a href="{{ route('login')}}">CLIQUER ici pour vous connecter!</a>
        @endguest
    </body>
</html>