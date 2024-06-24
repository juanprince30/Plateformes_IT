<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Discussions</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        .container {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            max-width: 600px;
            width: 100%;
        }
        h1 {
            text-align: center;
            color: #333;
        }
        .message {
            background-color: #dff0d8;
            color: #3c763d;
            padding: 10px;
            border-radius: 4px;
            margin-bottom: 20px;
            text-align: center;
        }
        ul {
            list-style-type: none;
            padding: 0;
        }
        li {
            background-color: #f1f1f1;
            margin: 10px 0;
            padding: 15px;
            border-radius: 4px;
            transition: background-color 0.3s;
        }
        li:hover {
            background-color: #e9e9e9;
        }
        a {
            text-decoration: none;
            color: #007bff;
            font-size: 18px;
        }
        a:hover {
            text-decoration: underline;
        }
        .pagination {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }
        .pagination a, .pagination span {
            margin: 0 5px;
            padding: 10px 15px;
            border-radius: 4px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            transition: background-color 0.3s;
        }
        .pagination a:hover, .pagination span:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Liste des Discussions</h1>
        @if(session('message'))
            <div class="message">
                {{ session('message') }}
            </div>
        @endif
        <ul>
            @foreach($discussions as $discussion)
                <li>
                    <a href="{{ route('discussion.show', $discussion) }}">{{ $discussion->sujet }}</a>
                </li>
            @endforeach
        </ul>
        <div class="pagination">
            {{ $discussions->links() }}
        </div>
    </div>
</body>
</html>
