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
        <div class="candidature-container">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <h1>Liste de mes candidatures</h1>
    
                    <!-- Boucle foreach pour afficher les candidatures -->
                    @foreach($candidatures as $candidature)
                    <div class="card my-3">
                        <div class="card-body">
                            @if ($candidature->description)
                            <h5 class="card-title">{{ $candidature->description }}</h5>
                            @endif
                            <p class="card-text">{{ $candidature->motivation }}</p>
                            <a href="{{ route('postuler.show', $candidature) }}" class="btn btn-primary">View</a>
                            <!-- Ajoutez des boutons Edit et Delete si nécessaire -->
                        </div>
                    </div>
                    @endforeach
    
                    <!-- Bouton pour créer une nouvelle candidature -->
                    <!-- <a href="{{ route('postuler.create') }}" class="btn btn-success">Postuler</a> -->
                </div>
            </div>
        </div>
    </div>
<!-- Bootstrap JavaScript et jQuery (optionnel, pour les composants interactifs) -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</body>
</html>
    