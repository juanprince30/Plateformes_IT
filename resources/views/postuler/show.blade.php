<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Link Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card mt-5">
                    <div class="card-body">
                        <h5 class="card-title">Job: {{ $candidature->offre->titre }}</h5>
                        <hr>
                        <strong>Description:</strong>
                        <p class="card-text">@if ($candidature->description)
                            {{ $candidature->description }}
                        @endif</p>
                        <strong>Motivation:</strong>
                        <p class="card-text">{{ $candidature->motivation }}</p>
                        <strong>Statut:</strong>
                        <p class="card-text">{{ $candidature->etat_candidature }}</p>
                        <hr>
                        <a href="{{ route('postuler.index') }}" class="btn btn-primary">Retour</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- Bootstrap JavaScript et jQuery (optionnel, pour les composants interactifs) -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</body>
</html>
