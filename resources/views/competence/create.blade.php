<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ajouter une compétence</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-rc.0/css/select2.min.css" rel="stylesheet" />
</head>
<body>
    @auth
    <h1>Ajouter une compétence</h1>
    <form method='POST' action='{{ route('competence.store') }}'>
        @csrf
        <div class="mb-3 row">
            <label for="titre" class="col-sm-2 col-form-label">Titre</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='titre' id="titre" required>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="description" class="col-sm-2 col-form-label">Description</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='description' id="description" required>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="categorie_id" class="col-sm-2 col-form-label">Catégorie</label>
            <div class="col-sm-10">
                <input type="hidden" name="categorie_id" id="categorie_id" required>
                <input type="text" class="form-control" id="categorie_search" placeholder="Sélectionner une catégorie" required>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Enregistrer</button>
    </form>
    @endauth
    @guest
        <h1>VOUS N'ÊTES PAS CONNECTÉ</h1>
        <a href="{{ route('login') }}">CLIQUER ici pour vous connecter!</a>
    @endguest

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
