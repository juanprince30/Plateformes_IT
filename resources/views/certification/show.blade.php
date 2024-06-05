<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Certification</title>

    </head>
    <body>
        @auth

            {{$certification->id}} <br>
            {{$certification->titre}} <br>
            {{$certification->nom_institut}} <br>
            {{$certification->date_dobtention}} <br>
            <a href="{{ asset('storage/' . $certification->fichier) }}" target="_blank">Voir le fichier</a>
        
        @endauth

        @guest
            <h1>VOUS ETES PAS CONNECTER</h1>
            <a href="{{ route('login')}}">CLIQUER ici pour vous connecter!</a>
        @endguest
    </body>
</html>