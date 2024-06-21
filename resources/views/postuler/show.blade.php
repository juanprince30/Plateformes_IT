<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<div class="postuler-body">
                    <strong><p>Job: {{ $candidature->offre->titre }}</p></strong>
                    <strong><p>@if ($candidature->description)
                        {{ $candidature->description}}
                    @endif</p></strong>
                    <p>{{ $candidature->motivation }}</p>
                    <p>Statue:{{$candidature->etat_candidature}}</p>
</div>
<a href="{{route('postuler.index')}}">Retour</a>
</body>
</html>