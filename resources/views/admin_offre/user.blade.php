<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
        }
        .offre-container {
            width: 80%;
            margin: 20px auto;
            padding: 20px;
        }
        .new-note-btn {
            display: inline-block;
            padding: 10px 15px;
            margin-bottom: 20px;
            background-color: #28a745;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .new-note-btn:hover {
            background-color: #218838;
        }
        .offres {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }
        .offre-item {
            background-color: #ffffff;
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            width: calc(33.333% - 20px);
            box-sizing: border-box;
        }
        .offre-body p {
            margin: 0 0 10px;
        }
        .offre-body strong {
            display: block;
            margin-bottom: 10px;
        }
        .offre-buttons {
            text-align: right;
        }
        .offre-view-button, .offre-edit-button, .offre-delete-button {
            display: inline-block;
            padding: 10px 15px;
            margin: 0 5px;
            border: none;
            border-radius: 3px;
            text-decoration: none;
            color: #fff;
        }
        .offre-view-button {
            background-color: #007bff;
        }
        .offre-view-button:hover {
            background-color: #0056b3;
        }
        .offre-edit-button {
            background-color: #ffc107;
        }
        .offre-edit-button:hover {
            background-color: #e0a800;
        }
        .offre-delete-button {
            background-color: #dc3545;
        }
        .offre-delete-button:hover {
            background-color: #c82333;
        }
    </style>
</head>
<body>
<div class="offre-container">
        <div class="offres">
        @foreach($users as $user)
            <ul>
                <li> NOM: {{$user->name}}</li>
                <li> PRENOM: {{$user->prenom}}</li>
                <li> Mail: {{$user->email}}</li>
            </ul>
        @endforeach
        </div>
    </div>
</body>
</html>