<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Profil</title>
        
    </head>
    <body>
        <h1>PROFIL</h1>
        <br><br>
        
        @auth
            <a href="{{ route('profil.create')}}">Ajouter un profil</a>
            
            <br><br>
            @foreach ($profil as $item)
                {{$item->nom}}
                ---
                {{ $item->prenom}}


                <br><br>
                <button> <a href="{{ route('profil.show', $item->id)}}">Voir plus...</a></button>
            @endforeach
        @endauth
        
    </body>
</html>