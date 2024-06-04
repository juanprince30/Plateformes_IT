<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Ajouter un cv et motivation</title>

    </head>
    <body>
        @auth


        <h1>Ajouter un cv et motivation </h1>

        <form method='POST' action='{{ route('cv_et_motivation.store') }}' enctype="multipart/form-data">

            @csrf
            
            <label for="">Cv : </label>
            <input type="file" id="cv" name="cv"><br><br>
            <label for="">Motivation : </label>
            <input type="file" id="motivation" name="motivation"><br><br>
            <label for="">Description : </label>
            <textarea name="description" id="description" cols="30" rows="10"></textarea><br><br>

            <button type="submit" class="btn btn-primary">Enregistrer</button>


        <form>
        @endauth
    </body>
</html>