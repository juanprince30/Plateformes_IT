<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier une offre</title>
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
    <h1>Modifier l'offre "{{ $offre->titre }}"</h1>
    <form action="{{ route('offre.update', $offre->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="titre">Titre</label>
            <input type="text" class="form-control" id="titre" name="titre" value="{{ old('titre', $offre->titre) }}" required>
        </div>
        
        <div class="form-group">
            <label for="type_offre">Type d'offre</label>
            <select class="form-control" name="type_offre" id="type_offre" required>
                <option value="Stage" @if($offre->type_offre == 'Stage') selected @endif>Stage</option>
                <option value="Emploi" @if($offre->type_offre == 'Emploi') selected @endif>Emploi</option>
                <option value="Formation" @if($offre->type_offre == 'Formation') selected @endif>Formation</option>
            </select>
        </div>

        <div class="form-group">
            <label for="ville">Ville</label>
            <input type="text" class="form-control" id="ville" name="ville" value="{{ old('ville', $offre->ville) }}" required>
        </div>

        <div class="form-group">
            <label for="pays">Pays</label>
            <input type="text" class="form-control" id="pays" name="pays" value="{{ old('pays', $offre->pays) }}" required>
        </div>

        <div class="form-group">
            <label for="prix">Prix (Formation)</label>
            <input type="text" class="form-control" id="prix" name="prix" value="{{ old('prix', $offre->prix) }}" placeholder="Le prix en FCFA pour une formation">
        </div>

        <div class="form-group">
            <label for="salaire">Salaire (Stage ou Emploi)</label>
            <input type="text" class="form-control" id="salaire" name="salaire" value="{{ old('salaire', $offre->salaire) }}" placeholder="Le salaire en FCFA pour emploi ou stage">
        </div>

        <div class="form-group">
            <label for="experience_requis">Niveau d'Étude requis</label>
            <select name="experience_requis" id="experience_requis" class="form-control">
                <option value="Bac+1" @if($offre->experience_requis == 'Bac+1') selected @endif>Bac+1</option>
                <option value="Bac+2" @if($offre->experience_requis == 'Bac+2') selected @endif>Bac+2</option>
                <option value="Bac+3" @if($offre->experience_requis == 'Bac+3') selected @endif>Bac+3</option>
                <option value="Bac+4" @if($offre->experience_requis == 'Bac+4') selected @endif>Bac+4</option>
                <option value="Bac+5" @if($offre->experience_requis == 'Bac+5') selected @endif>Bac+5</option>
                <option value="Bac+6" @if($offre->experience_requis == 'Bac+6') selected @endif>Bac+6</option>
                <option value="Bac+7" @if($offre->experience_requis == 'Bac+7') selected @endif>Bac+7</option>
            </select>
        </div>

        <div>
            <label for="categorie_id" class="col-sm-2 col-form-label">Catégorie</label>
            <div class="form-control">
                <input type="hidden" name="categorie_id" id="categorie_id" value="{{ old('categorie_id', $offre->categorie_id) }}" required>
                <input type="text" name="categories" class="form-control" id="categorie_search" value="{{ old('categories', $offre->categorie->libelle) }}" placeholder="Sélectionner une catégorie" required>
            </div>
        </div>
        
        <div class="form-group">
            <label for="responsabilite">Responsabilités</label>
            <input type="text" class="form-control" id="responsabilite" name="responsabilite" value="{{ old('responsabilite', $offre->responsabilite) }}" required>
        </div>

        <div class="form-group">
            <label for="competence_requis">Compétences requises</label>
            <input type="text" class="form-control" id="competence_requis" name="competence_requis" value="{{ old('competence_requis', $offre->competence_requis) }}" required>
        </div>

        <div class="form-group">
            <label for="date_debut_offre">Date de début d'offre</label>
            <input type="date" class="form-control" id="date_debut_offre" name="date_debut_offre" value="{{ old('date_debut_offre', $offre->date_debut_offre) }}" required>
        </div>

        <div class="form-group">
            <label for="date_fin_offre">Date de fin d'offre</label>
            <input type="date" class="form-control" id="date_fin_offre" name="date_fin_offre" value="{{ old('date_fin_offre', $offre->date_fin_offre) }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Mettre à jour</button>
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
