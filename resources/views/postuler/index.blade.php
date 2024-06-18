<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <div class="candidature-container">

        <!-- <a href="{{ route('postuler.create') }}" class="new-note-btn">
            Postuler
        </a> -->
        <div class="postuler">
            @forelse($candidatures as $candidature)
            <div class="postuler">
                <div class="postuler-body">
                    <strong><p>Job: {{ $candidature->offre->titre }}</p></strong>
                    <strong><p>{{ $candidature->description }}</p></strong>
                    <p>{{ $candidature->motivation }}</p>
                    <p>Statue:{{$candidature->etat_candidature}}</p>
                </div>
                <div class="offre-buttons">
                    <a href="{{ route('postuler.show', $candidature) }}" class="offre-edit-button">View</a>
                    
                    <!-- <a href="{{ route('postuler.edit', $candidature) }}" class="offre-edit-button">Edit</a> -->
                    <!-- <form action="{{ route('postuler.destroy', $candidature) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="offre-delete-button">Delete</button>
                    </form> -->
                </div>
            </div>
            <a href="{{route('offre.index')}}">Retour</a>
            @empty
            <a href="{{route('offre.index')}}">Retour</a>
            <p>Aucune candidature trouvée. Veuillez postuler à une offre avant.</p>
            @endforelse
           
        </div>
       
    </div>


</body>
</html>