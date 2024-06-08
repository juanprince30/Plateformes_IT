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
        <form action="" method="POST" class='offre'>
            @csrf
            
            <p>
                <textarea name="description" cols="30" rows="10" placeholder="description"></textarea>
            </p>
            <p>
                <textarea name="motivation" cols="30" rows="10" placeholder="Motivation"></textarea>
            
            <div>
                <a href="{{ route('offre.index') }}">Cancel</a>
                <button type="submit">Submit</button>
            </div>
                

</body>
</html>