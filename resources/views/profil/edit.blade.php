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

        <form action="{{ route('profil.update', $profil->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <label for="">Nom :</label>
            <input type="text" name="nom" id="nom" value="{{ $profil->nom }}" required>
            <br><br>

            <label for="">Prenom :</label>
            <input type="text" name="prenom" id="prenom" value="{{ $profil->prenom}}" required>
            <br><br>

            <label for="">Description:</label>
            <textarea name="description" id="description" cols="30" rows="10">{{ $profil->description}}</textarea>
            <br><br>

            <label for="">Telephone   :</label>
            <input type="text" name="telephone_2" id="telephone_2" value="{{ $profil->telephone_2}}" required>
            <br><br>

            <label for="">Telephone 2 :</label>
            <input type="text" name="telepone" id="telepone" value="{{ $profil->telepone}}">
            <br><br>

            <label for="">Ville  :</label>
            <input type="text" name="ville" id="ville" value="{{$profil->ville}}" required>
            <br><br>

            <label for="">Adresse  :</label>
            <input type="text" name="addresse" id="addresse" value="{{ $profil->addresse}}">
            <br><br>

            <label for="">Niveau d'etude  :</label>
            <select name="niveau_etude" id="niveau_etude" required>
                <option value="Bac+1" {{ $profil->niveau_etude == 'Bac+1' ? 'selected' : '' }}>Bac+1</option>
                <option value="Bac+2"  {{ $profil->niveau_etude == 'Bac+2' ? 'selected' : '' }}>Bac+2</option>
                <option value="Bac+3"  {{ $profil->niveau_etude == 'Bac+3' ? 'selected' : '' }}>Bac+3</option>
                <option value="Bac+4"  {{ $profil->niveau_etude == 'Bac+4' ? 'selected' : '' }}>Bac+4</option>
                <option value="Bac+5"  {{ $profil->niveau_etude == 'Bac+5' ? 'selected' : '' }}>Bac+5</option>
                <option value="Bac+6"  {{ $profil->niveau_etude == 'Bac+6' ? 'selected' : '' }}>Bac+6</option>
                <option value="Bac+7"  {{ $profil->niveau_etude == 'Bac+7' ? 'selected' : '' }}>Bac+7</option>
            </select>
            <br><br>

            <label for="">Statut  :</label>
            <select name="statut" id="statut">
                <option value="Etudiant"  {{ $profil->statut == 'Etudiant' ? 'selected' : '' }}>Etudiant</option>
                <option value="Professionel"  {{ $profil->statut == 'Professionel' ? 'selected' : '' }}>Professionel</option>
                <option value="Chomeur"  {{ $profil->statut == 'Chomeur' ? 'selected' : '' }}>Chomeur</option>
                <option value="Stagiaire"  {{ $profil->statut == 'Stagiaire' ? 'selected' : '' }}>Stagiaire</option>
            </select>
            <br><br>

            <label for="image">Modifier votre image :</label>
            <br>
            <!-- Aperçu de l'image actuelle -->
            <img id="current-image" src="{{ asset('storage/' . $profil->image) }}" alt="Image actuelle" style="max-width: 200px;">
            <br>
            <input type="file" name="image" id="image">
            <br><br>
            
            <button type="submit">Enregistrer la modification</button>
        </form>
        
        @endauth
    </body>
</html>