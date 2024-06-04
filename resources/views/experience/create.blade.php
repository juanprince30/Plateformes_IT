<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Ajouter une experience</title>

    </head>
    <body>
        @auth


        <h1>Ajouter une experience</h1>

        <form method='POST' action='{{ route('experience.store') }}'>

            @csrf
            <div class="mb-3 row">
                <label for="titre" class="col-sm-2 col-form-label">Titre</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='titre' id="libelle" required>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="description" class="col-sm-2 col-form-label">Entreprise :</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='entreprise' id="entreprise" required>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="description" class="col-sm-2 col-form-label">Nom surperviseur :</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='nom_superviseur' id="nom_superviseur" required>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="description" class="col-sm-2 col-form-label">Contact surperviseur :</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='contact_superviseur' id="contact_superviseur" required>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="description" class="col-sm-2 col-form-label">Responsabilite :</label>
                <div class="col-sm-10">
                    <textarea name="responsabilite" id="responsabilite" cols="30" rows="10" required></textarea>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="description" class="col-sm-2 col-form-label">Date Debut :</label>
                <div class="col-sm-10">
                    <input type="date" class="form-control" name='date_debut' id="date_debut" required>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="description" class="col-sm-2 col-form-label">Date Fin :</label>
                <div class="col-sm-10">
                    <input type="date" class="form-control" name='date_fin' id="date_fin">
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Enregistrer</button>


        <form>
        @endauth
    </body>
</html>