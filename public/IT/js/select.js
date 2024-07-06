$(document).ready(function() {
        $('#categorie_search').select2({
            placeholder: 'Sélectionner une catégorie',
            minimumInputLength: 2,
            ajax: {
                url: '{{ url('/api/categorie/search') }}',
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