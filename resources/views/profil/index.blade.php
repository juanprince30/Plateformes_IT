<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Profil</title>
        
    </head>
    <body>
        
        @auth
            <h1>PROFIL</h1>
            <br><br>

            @if (!$profil)
                <a href="{{ route('profil.create')}}">Ajouter un profil</a>      
            @else
                <br><br>
                
                {{$profil->nom}}
                ---
                {{ $profil->prenom}}


                <br><br>
                <button> <a href="{{ route('profil.show', $profil->id)}}">Voir plus...</a></button>
                

                <br><br>
                <button><a href="{{ route('competence.index')}}">Mes Competences</a></button><br><br>
                <button><a href="{{ route('cv_et_motivation.index')}}">CV et Motivation</a></button><br><br>
                <button><a href="{{ route('experience.index')}}">Mes Experiences</a></button><br><br>
                <button><a href="{{ route('certification.index')}}">Mes certifications</a></button><br><br> 
            @endif
            

        @endauth
        
    </body>
</html>