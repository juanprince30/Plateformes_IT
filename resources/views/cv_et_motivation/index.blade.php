<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>CV et Motivation</title>

    </head>
    <body>
        <h1>CV et Motivation</h1>
        <br><br>

        @auth
            <button><a href="{{ route('cv_et_motivation.create')}}">Ajouter CV et Motivation</a></button>
            <br><br>

            
            <ol>
                @foreach ($cv_et_motivation as $item)
                    <li>
                        @if ($item->description)
                            {{$item->description}}
                            <br>
                        @endif
                        @if ($item->cv)
                            <a href="{{ asset('storage/' . $item->cv) }}" target="_blank">Voir le fichier CV</a><br>
                        @endif
                        
                        @if ($item->motivation)
                            <a href="{{ asset('storage/' . $item->motivation) }}" target="_blank">Voir le fichier Motivation</a>
                        @endif

                        <form action="{{ route('cv_et_motivation.destroy', $item->id)}}" method="POST">
                            @csrf
                            @method('DELETE')

                    <button><a href="{{ route('cv_et_motivation.show', $item->id)}}">Details</a></button>
                    <button><a href="{{ route('cv_et_motivation.edit', $item->id)}}">Modifier</a></button>
                            
                            <button type="submit" onclick=" return confirm('Etes vous sure de vouloir supprimer!')">Supprimer</button>
                        </form>
                    </li>
                @endforeach
            </ol>
            

        @endauth



    </body>
</html>