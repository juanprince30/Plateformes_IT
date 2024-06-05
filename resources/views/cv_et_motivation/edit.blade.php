<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Modifier un cv et motivation</title>

    </head>
    <body>
        @auth


        <h1>Modifier un cv et motivation </h1>

        <form method='POST' action='{{ route('cv_et_motivation.update', $cv_et_motivation->id) }}' enctype="multipart/form-data">

            @csrf
            @method('PUT')
            
            <label for="">Cv : </label>
            <input type="file" id="cv" name="cv" value="{{ $cv_et_motivation->cv}}"><br><br>
            <label for="">Motivation : </label>
            <input type="file" id="motivation" name="motivation" value="{{$cv_et_motivation->motivation}}"><br><br>
            <label for="">Description : </label>
            <textarea name="description" id="description" cols="30" rows="10">{{$cv_et_motivation->description}}</textarea><br><br>

            <button type="submit" class="btn btn-primary">Enregistrer</button>


        <form>
        @endauth

        @guest
            <h1>VOUS ETES PAS CONNECTER</h1>
            <a href="{{ route('login')}}">CLIQUER ici pour vous connecter!</a>
        @endguest
    </body>
</html>