<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Offre</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-rc.0/css/select2.min.css" rel="stylesheet" />
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
            <input type="text" class="form-control" id="prix" name="prix">
        </div>

        <div class="form-group">
            <label for="salaire">Salaire (Stage ou Emploi)</label>
            <input type="text" class="form-control" id="salaire" name="salaire" >
        </div>

        <div class="form-group">
            <label for="experience_requis">Expérience requise</label>
            <input type="text" class="form-control" id="experience_requis" name="experience_requis" >
        </div>

        <div>
            <label for="categorie_id" class="col-sm-2 col-form-label">Catégorie</label>
            <div class="col-sm-10">
                <input type="hidden" name="categorie_id" id="categorie_id" required>
                <input type="text" class="form-control" id="categorie_search" placeholder="Sélectionner une catégorie" required>
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