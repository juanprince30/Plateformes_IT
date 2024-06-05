<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Certification</title>

    </head>
    <body>
        @auth

            {{$cv_et_motivation->id}} <br>
            @if ($cv_et_motivation->description)
                {{$cv_et_motivation->description}} <br>
            @endif
            
            @if ($cv_et_motivation->cv)
                <a href="{{ asset('storage/' . $cv_et_motivation->cv) }}" target="_blank">Voir le fichier CV</a><br>  
            @endif

            @if ($cv_et_motivation->motivation)
                <a href="{{ asset('storage/' . $cv_et_motivation->motivation) }}" target="_blank">Voir le fichier Motivation</a>
            @endif
            
            
        @endauth

        @guest
            <h1>VOUS ETES PAS CONNECTER</h1>
            <a href="{{ route('login')}}">CLIQUER ici pour vous connecter!</a>
        @endguest
    </body>
</html>