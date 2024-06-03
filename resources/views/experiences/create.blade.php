<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Ajouter une compétence</title>
        
    </head>
    <body>
        @auth
            
        
        <h1>Ajouter une compétence</h1>

        <form method='POST' action='{{ route('competence.store') }}'>

            @csrf
            <div class="mb-3 row">
                <label for="titre" class="col-sm-2 col-form-label">Titre</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='titre' id="libelle">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="description" class="col-sm-2 col-form-label">Desrciption</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='description' id="description">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="categorie_id" class="col-sm-2 col-form-label">Catégorie</label>
                <div class="col-sm-10">
                    <select name="categorie_id" id="">
                        <option value="">Selectionner ... </option>
                        @foreach ($categories as $categorie)
                        <option value="{{$categorie->id}}">{{$categorie->libelle}}</option>
                        @endforeach

                    </select>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Enregistrer</button>

        
        <form>
        @endauth
    </body>
</html>