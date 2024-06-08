<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Postuler</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 50%;
            margin: 50px auto;
            padding: 20px;
            background-color: #ffffff;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            color: #333;
        }
        form p {
            margin-bottom: 15px;
        }
        textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        textarea:focus {
            border-color: #007bff;
            outline: none;
        }
        .form-actions {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .form-actions a {
            text-decoration: none;
            color: #007bff;
            background-color: transparent;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 4px;
        }
        .form-actions a:hover {
            text-decoration: underline;
        }
        .form-actions button {
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .form-actions button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Postuler</h1>
    <form action="{{ route('postuler.store') }}" method="POST">
        @csrf

        <input type="hidden" name="offre_id" value="{{ $offre->id }}">

        <p>
            <textarea name="description" cols="30" rows="10" placeholder="Description" required></textarea>
        </p>
        <p>
            <textarea name="motivation" cols="30" rows="10" placeholder="Motivation" required></textarea>
        </p>

        <div class="form-actions">
            <a href="{{ route('offre.index') }}">Cancel</a>
            <button type="submit">Submit</button>
        </div>
    </form>
</div>

</body>
</html>
