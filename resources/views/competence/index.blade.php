<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Compétences</title>

    </head>
    <body>
        <h1>Compétences</h1>
        <br><br>

        @auth
            <a href="{{ route('competence.create')}}">Ajouter une competence</a>


    <table class="table">
        <thead>

            <tr>
                <th scope="col">#</th>
                <th scope="col">Titre</th>
                <th scope="col">Description</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody class="table-group-divider">
            @foreach ($competence as $item)
                <tr>
                    <th scope="row">{{ $item->id }}</th>
                    <td>{{$item->titre}}</td>
                    <td>
                        <form action="{{ route('competence.destroy',$item->id) }}" method="POST">

                            @csrf
                            @method('DELETE')

                        <button type="submit" class="btn btn-danger" onclick="return confirm('Etes-vous sûr de vouloir supprimer?')" >Supprimer</button>

                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    @endauth



    </body>
</html>