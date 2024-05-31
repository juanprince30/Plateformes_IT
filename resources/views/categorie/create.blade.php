<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Profil</title>
        
    </head>
    <body>
        <h1>Ajouter une categorie</h1>
        <form action="{{ route('categorie.store')}}" method="POST">
            @csrf
            <label for="">Libelle :</label>
            <input type="text" name="libelle" id="libelle" required>
            <br><br>

            <label for="">Description :</label>
            <textarea name="description" id="description" cols="30" rows="10" required></textarea>
            <br><br>

            <button type="submit">Enregistrer</button>
        </form>
    </body>
</html>