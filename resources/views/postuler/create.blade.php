<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <h1>Postuler</h1>
    <div>
        <form action="{{ route('postuler.store') }}" method="POST" >
            @csrf

            <input type="hidden" name="offre_id" value="{{ $offre->id }}">

            <p>
            <textarea name="description" cols="30" rows="10" placeholder="description" required></textarea>
            </p>
            <p>
                <textarea name="motivation" cols="30" rows="10" placeholder="Motivation" required></textarea>
            </p>

            <div>
                <a href="{{ route('offre.index') }}">Cancel</a>
                <button type="submit">Submit</button>
            </div>
        </form>
    </div>


</body>
</html>