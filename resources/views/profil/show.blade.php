<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Profil</title>
        
    </head>
    <body>
        <h1>Votre Profil: </h1>
        <br><br>
        
        <form>
            @csrf
            @auth
                
            @if($profil->image)
                <img src="{{ asset('storage/' . $profil->image) }}" alt="Image du profil" width="100">
            @endif

            <br><br>

            <label for="">Nom :</label>
            <input type="text" name="nom" id="nom" value="{{ $profil->nom}}" disabled>
            <br><br>

            <label for="">Prenom :</label>
            <input type="text" name="prenom" id="prenom" value="{{ $profil->prenom}}" disabled>
            <br><br>

            <label for="">Description:</label>
            <textarea name="description" id="description" cols="30" rows="10" disabled>{{$profil->description}}</textarea>
            <br><br>

            <label for="">Telephone   :</label>
            <input type="text" name="telephone_2" id="telephone_2" value="{{ $profil->telephone_2}}" disabled>
            <br><br>

            <label for="">Telephone 2 :</label>
            <input type="text" name="telepone" id="telepone" value="{{ $profil->telepone}}" disabled>
            <br><br>

            <label for="">Ville  :</label>
            <input type="text" name="ville" id="ville" value="{{ $profil->ville}}" disabled>
            <br><br>

            <label for="">Adresse  :</label>
            <input type="text" name="addresse" id="addresse" value="{{ $profil->addresse}}" disabled>
            <br><br>

            <label for="">Niveau d'etude  :</label>
            <input type="text" id="niveau_etude" name="niveau_etude" value="{{ $profil->niveau_etude}}" disabled>
            <br><br>

            <label for="">Statut  :</label>
            <input type="text" id="statut" name="statut" value="{{ $profil->statut}}" disabled>
            <br><br> 

        </form>

        <br><br>
        <form action="{{ route('profil.destroy', $profil->id)}}" method="POST">
            @csrf
            @method('DELETE')
        <button><a href=" {{ route('profil.edit', $profil->id)}}">Modifier</a></button>
        <button type="submit" onclick=" return confirm('Etes vous bien sur de vouloir supprimer votre profil? Nb: Cette action est irreversible!')">Supprimer le profil</button>

        </form>

        <br><br>
        <a href="{{ route('profil.index')}}">Retour en arriere</a>

        @endauth
    </body>
</html>