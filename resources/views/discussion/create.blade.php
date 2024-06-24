<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Discussion</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            max-width: 500px;
            width: 100%;
        }
        h1 {
            text-align: center;
            color: #333;
        }
        form {
            display: flex;
            flex-direction: column;
        }
        input[type="text"], textarea, select {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }
        button {
            padding: 10px 20px;
            margin-top: 10px;
            background-color: #28a745;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }
        button:hover {
            background-color: #218838;
        }
        label {
            margin-top: 10px;
            font-size: 14px;
            color: #555;
        }
        .form-control {
            display: block;
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Démarrer une discussion</h1>
        <form action="{{ route('discussion.store') }}" method="POST">
            @csrf
            <input type="text" id="sujet" name="sujet" placeholder="Sujet"> <br>
            <textarea name="contenu" id="contenu" cols="30" rows="10" placeholder="Contenu"></textarea><br>
            <label for="categorie_id">Catégorie</label>
            <select class="form-control" id="categorie_id" name="categorie_id" required>
                <option value="">Sélectionnez une catégorie</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->libelle }}</option>
                @endforeach
            </select><br>
            <label for="etat">Etat</label>
            <select name="etat" id="etat">
                <option value="Ouvert">Ouvert</option>
                <option value="Fermer">Fermer</option>
            </select><br>
            <button type="submit">Submit</button>
        </form>
    </div>
</body>
</html>
