<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Offre</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-rc.0/css/select2.min.css" rel="stylesheet" />
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 60%;
            margin: 50px auto;
            padding: 20px;
            background-color: #ffffff;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            color: #333;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #555;
        }
        .form-group input,
        .form-group select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        .form-group input:focus,
        .form-group select:focus {
            border-color: #007bff;
            outline: none;
        }
        .btn-primary {
            display: block;
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
            text-align: center;
            margin-top: 20px;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
        .form-group p {
            margin: 0;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Créer une nouvelle offre</h1>
    <form action="{{ route('offre.store') }}" method="POST">
        @csrf
       
        <div class="form-group">
            <label for="titre">Titre</label>
            <input type="text" class="form-control" id="titre" name="titre" required>
        </div>
        
        <div class="form-group">
            <label for="type_offre">Type d'offre</label>
            <select class="form-control" name="type_offre" id="type_offre" required>
                <option value="" selected disabled hidden>Selectionner une option</option>
                <option value="Stage">Stage</option>
                <option value="Emploi">Emploi</option>
                <option value="Formation">Formation</option>
            </select>
        </div>

        <div class="form-group">
            <label for="ville">Ville</label>
            <input type="text" class="form-control" id="ville" name="ville" required>
        </div>

        <div class="form-group">
            <label for="pays">Pays</label>
            <input type="text" class="form-control" id="pays" name="pays" required>
        </div>

        <div class="form-group">
            <label for="salaire">Prix (Formation)</label>
            <input type="text" class="form-control" id="prix" name="prix" placeholder="Le prix en FCFA pour une formation">
        </div>

        <div class="form-group">
            <label for="salaire">Salaire (Stage ou Emploi)</label>
            <input type="text" class="form-control" id="salaire" name="salaire" placeholder="Le salaire en FCFA pour emploi ou stage">
        </div>

        <div class="form-group">
            <label for="experience_requis">Niveau d'Etude requis</label>
            <select name="experience_requis" id="experience_requis" class="form-control">
                <option value="" selected disabled hidden>Selectionner une option</option>
                <option value="Bac+1">Bac+1</option>
                <option value="Bac+2">Bac+2</option>
                <option value="Bac+3">Bac+3</option>
                <option value="Bac+4">Bac+4</option>
                <option value="Bac+5">Bac+5</option>
                <option value="Bac+6">Bac+6</option>
                <option value="Bac+7">Bac+7</option>
            </select>
        </div>

        <div>
            <label for="categorie_id" class="col-sm-2 col-form-label">Catégorie</label>
            <div class="form-control">
                <input type="hidden" name="categorie_id" id="categorie_id" required>
                <input type="text" name="categories" class="form-control" id="categorie_search" placeholder="Sélectionner une catégorie" required>
            </div>
        </div>
        

        <div class="form-group">
            <label for="responsabilite">Responsabilités</label>
            <input type="text" class="form-control" id="responsabilite" name="responsabilite" required>
        </div>

        <div class="form-group">
            <label for="competence_requis">Compétences requises</label>
            <input type="" class="form-control" id="competence_requis" name="competence_requis" required>
        </div>

        

            <p>
                <input type="date" name="date_debut_offre">
            </p>
            <p>
                <input type="date" name="date_fin_offre">
            </p>

        <button type="submit" class="btn btn-primary">Soumettre</button>
    </form>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-rc.0/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        $('#categorie_search').select2({
            placeholder: 'Sélectionner une catégorie',
            minimumInputLength: 2,
            ajax: {
                url: '{{ url('/api/categorie/search') }}',  // Utilisation de l'URL directe de l'API
                dataType: 'json',
                delay: 250,
                data: function (params) {
                    return {
                        q: params.term
                    };
                },
                processResults: function (data) {
                    return {
                        results: $.map(data, function (item) {
                            return {
                                id: item.id,
                                text: item.libelle
                            };
                        })
                    };
                },
                cache: true
            }
        });

        $('#categorie_search').on('select2:select', function (e) {
            var data = e.params.data;
            $('#categorie_id').val(data.id);
        });
    });
</script>
</body>
</html>