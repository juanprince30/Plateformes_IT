<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Profil</title>
        
    </head>
    <body>
        @auth
            
        <h1>Liste des categories</h1>
        <br>
        <a href="{{ route('categorie.create')}}">Ajouter une categorie</a>
        <ol>
            @foreach ($categorie as $item)
                <li>{{ $item->libelle}}</li>
                <form action="{{ route('categorie.destroy', $item->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
            <button><a href="{{ route('categorie.show', $item->id) }}">Detail</a></button>
            <button><a href="{{ route('categorie.edit', $item->id) }}">Modifier</a></button>
                    <button type="submit" onclick=" return confirm('Etes vous sure de vouloir supprimer cette categorie??')">Supprimer</button>
                </form>
            @endforeach
        </ol>
        @endauth
        @guest
            <h1>VOUS ETES PAS CONNECTER</h1>
            <a href="{{ route('login')}}">CLIQUER ici pour vous connecter!</a>
        @endguest
    </body>
</html>