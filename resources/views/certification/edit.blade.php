<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Modifier une certification</title>

    </head>
    <body>
        @auth


        <h1>Modifier une certification</h1>

        <form action="{{ route('certification.update', $certification->id) }}" method="POST" enctype="multipart/form-data">

            @csrf
            @method('PUT')
            <div class="mb-3 row">
                <label for="titre" class="col-sm-2 col-form-label">Titre</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='titre' id="titre" value="{{ $certification->titre }}" required>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="description" class="col-sm-2 col-form-label">Nom Institut :</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='nom_institut' id="nom_institut" value="{{ $certification->nom_institut }}" required>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="description" class="col-sm-2 col-form-label">Date d'obtention :</label>
                <div class="col-sm-10">
                    <input type="date" class="form-control" name='date_dobtention' id="date_dobtention" value="{{ $certification->date_dobtention }}" required>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="description" class="col-sm-2 col-form-label">Changer le Fichier :</label>
                <div class="col-sm-10">
                    <input type="file" name='fichier' id="fichier">
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