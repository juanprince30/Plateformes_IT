<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <h1>Edit Your Condidature</h1>
    <div>
    <form action="{{route('postuler.update', $offre)}}" method="POST" class='offre'>
        @csrf
        @method('PUT')
    
        <p>
                <textarea name="motivation" cols="30" rows="10" value="{{ $candidacture->description }}"></textarea>
        </p>
        
        <p>
                <textarea name="motivation" cols="30" rows="10"  value="{{ $candidacture->motivation}}"></textarea>
         </p>
        <div>
            <a href="{{ route('offre.index') }}">Cancel</a>
            <button type="submit">Submit</button>
        </div>
    </form>
    </div>


</body>
</html>