<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Ajouter une compétence</title>

    </head>
    <body>
        @auth


        <h1>Ajouter une compétence</h1>

        <form method='POST' action='{{ route('experience.update', $experience->id) }}'>

            @csrf
            @method('PUT')
            <div class="mb-3 row">
                <label for="titre" class="col-sm-2 col-form-label">Titre</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='titre' id="libelle" value="{{ $experience->titre}}" required>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="description" class="col-sm-2 col-form-label">Entreprise :</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='entreprise' id="entreprise" value="{{ $experience->entreprise}}" required>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="description" class="col-sm-2 col-form-label">Nom surperviseur :</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='nom_superviseur' id="nom_superviseur" value="{{ $experience->nom_superviseur}}" required>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="description" class="col-sm-2 col-form-label">Contact surperviseur :</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='contact_superviseur' id="contact_superviseur" value="{{ $experience->contact_superviseur}}" required>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="description" class="col-sm-2 col-form-label">Responsabilite :</label>
                <div class="col-sm-10">
                    <textarea name="responsabilite" id="responsabilite" cols="30" rows="10" required>{{ $experience->responsabilite}}</textarea>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="description" class="col-sm-2 col-form-label">Date Debut :</label>
                <div class="col-sm-10">
                    <input type="date" class="form-control" name='date_debut' id="date_debut" value="{{ $experience->date_debut}}" required>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="description" class="col-sm-2 col-form-label">Date Fin :</label>
                <div class="col-sm-10">
                    <input type="date" class="form-control" name='date_fin' id="date_fin" value="{{ $experience->date_fin}}">
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