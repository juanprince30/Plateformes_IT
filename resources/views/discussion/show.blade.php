<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Discussion</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #e9ecef;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: flex-start;
            min-height: 100vh;
            padding-top: 20px;
        }
        .container {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 20px;
            max-width: 800px;
            width: 100%;
            margin: 0 20px;
        }
        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }
        .discussion-header {
            border-bottom: 1px solid #ddd;
            padding-bottom: 15px;
            margin-bottom: 20px;
        }
        .discussion-header p {
            margin: 5px 0;
        }
        .discussion-header strong {
            display: block;
            font-size: 1.5em;
            margin-top: 10px;
            color: #007bff;
        }
        .discussion-content {
            margin-bottom: 20px;
        }
        .discussion-status {
            margin-bottom: 20px;
            font-weight: bold;
        }
        .replies {
            border-top: 2px solid #ddd;
            padding-top: 20px;
        }
        .reply {
            background-color: #f8f9fa;
            margin: 10px 0;
            padding: 15px;
            border-left: 5px solid #007bff;
            border-radius: 4px;
        }
        .reply-author {
            font-weight: bold;
            color: #007bff;
        }
        .reply-content {
            margin: 5px 0;
            color: #333;
        }
        .reply-link {
            display: block;
            text-align: center;
            margin-top: 20px;
            padding: 10px 15px;
            border-radius: 4px;
            background-color: #28a745;
            color: #fff;
            text-decoration: none;
            transition: background-color 0.3s;
        }
        .reply-link:hover {
            background-color: #218838;
        }
        .timestamp {
            color: #6c757d;
            font-size: 0.9em;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Discussion</h1>
        <div class="discussion-header">
            <p>Auteur : {{$discussion->user->name}}</p>
            <strong>{{$discussion->sujet}}</strong>
        </div>
        <div class="discussion-content">
            <p>{{$discussion->contenu}}</p>
        </div>
        <div class="discussion-status">
            Etat : 
            @if($discussion->etat==1)
                Ouvert
            @elseif($discussion->etat==2)
                Fermer
            @endif
        </div>
        <div class="replies">
            <strong>Les Réponses</strong>
            @foreach($discussion->reponses->sortByDesc('created_at') as $reponse)
                <div class="reply">
                    <p class="reply-author">Auteur : {{$reponse->user->name}}</p>
                    <p class="timestamp">Date : {{$reponse->created_at}}</p>
                    <p class="reply-content">{{$reponse->contenu}}</p>
                    <a href="{{ route('reponse.create', ['discussion_id' => $discussion->id]) }}">reply</a>

                </div>
            @endforeach
        </div>
        <a class="reply-link" href="{{ route('reponse.create', ['discussion_id' => $discussion->id]) }}">Répondre</a>
    </div>
</body>
</html>
