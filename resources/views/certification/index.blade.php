<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>certification</title>

    </head>
    <body>
        <h1>Certification</h1>
        <br><br>

        @auth
            <button><a href="{{ route('certification.create')}}">Ajouter une certification</a></button>
            <br><br>

            
            <ol>
                @foreach ($certification as $item)
                    <li>
                        {{$item->titre}}---
                        {{$item->nom_institut}}---
                        {{$item->date_dobtention}}---
                        {{$item->fichier}}---
                        <a href="{{ asset('storage/' . $item->fichier) }}" target="_blank">Voir le fichier</a>
                        
                        <form action="{{ route('certification.destroy', $item->id)}}" method="POST">
                            @csrf
                            @method('DELETE')

                    <button><a href="{{ route('certification.show', $item->id)}}">Details</a></button>
                    <button><a href="{{ route('certification.edit', $item->id)}}">Modifier</a></button>
                            
                            <button type="submit" onclick=" return confirm('Etes vous sure de vouloir supprimer!')">Supprimer</button>
                        </form>
                    </li>
                @endforeach
            </ol>
            

        @endauth

        @guest
            <h1>VOUS ETES PAS CONNECTER</h1>
            <a href="{{ route('login')}}">CLIQUER ici pour vous connecter!</a>
        @endguest



    </body>
</html>