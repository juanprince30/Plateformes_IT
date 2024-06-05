<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Profil</title>
        
    </head>
    <body>
        @auth
            
        
        <h1>Veuillez Completez votre Profil</h1>

        <form action="{{ route('profil.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <label for="">Nom :</label>
            <input type="text" name="nom" id="nom" required>
            <br><br>

            <label for="">Prenom :</label>
            <input type="text" name="prenom" id="prenom" required>
            <br><br>

            <label for="">Description:</label>
            <textarea name="description" id="description" cols="30" rows="10" required></textarea>
            <br><br>

            <label for="">Telephone   :</label>
            <input type="text" name="telephone_2" id="telephone_2" required>
            <br><br>

            <label for="">Telephone 2 :</label>
            <input type="text" name="telepone" id="telepone">
            <br><br>

            <label for="">Ville  :</label>
            <input type="text" name="ville" id="ville" required>
            <br><br>

            <label for="">Adresse  :</label>
            <input type="text" name="addresse" id="addresse" required>
            <br><br>

            <label for="">Niveau d'etude  :</label>
            <select name="niveau_etude" id="niveau_etude" required>
                <option value="" selected disabled hidden>Selectionner une oprion</option>
                <option value="Bac+1">Bac+1</option>
                <option value="Bac+2">Bac+2</option>
                <option value="Bac+3">Bac+3</option>
                <option value="Bac+4">Bac+4</option>
                <option value="Bac+5">Bac+5</option>
                <option value="Bac+6">Bac+6</option>
                <option value="Bac+7">Bac+7</option>
            </select>
            <br><br>

            <label for="">Statut  :</label>
            <select name="statut" id="statut" required>
                <option value="" selected disabled hidden>Selectionner une oprion</option>
                <option value="Etudiant">Etudiant</option>
                <option value="Professionel">Professionel</option>
                <option value="Chomeur">Chomeur</option>
                <option value="Stagiaire">Stagiaire</option>
            </select>
            <br><br>

            <label for="">Selectionner une image :</label>
            <input type="file" id="image" name="image">
            <br><br>
            
            <button type="submit">Enregistrer</button>
        </form>
        @endauth

        @guest
            <h1>VOUS ETES PAS CONNECTER</h1>
            <a href="{{ route('login')}}">CLIQUER ici pour vous connecter!</a>
        @endguest
    </body>
</html>