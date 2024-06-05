<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Experiences</title>

    </head>
    <body>
        @auth
        <h1>Experiences</h1>
        <br><br>
            <button><a href="{{ route('experience.create')}}">Ajouter une experience proffesionel</a></button>
            <br><br>

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Titre</th>
                        <th scope="col">Entreprise</th>
                        <th scope="col">Nom superviseur</th>
                        <th scope="col">Contact superviseur</th>
                        <th scope="col">Responsabilite</th>
                        <th scope="col">Date Debut</th>
                        <th scope="col">Date Fin</th>
                        <th scope="col">Action 1</th>
                        <th scope="col">Action 2</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    @foreach ($experience as $item)
                        <tr>
                            <th scope="row">{{ $item->id }}</th>
                            <td >{{$item->titre}}</td>
                            <td>{{$item->entreprise}}</td>
                            <td>{{$item->nom_superviseur}}</td>
                            <td>{{$item->contact_superviseur}}</td>
                            <td>{{$item->responsabilite}}</td>
                            <td>{{$item->date_debut}}</td>
                            <td>{{$item->date_fin}}</td>
                            <td><button><a href="{{ route('experience.edit', $item->id) }}">Modifier</a></button></td>
                            <td>
                                <form action="{{ route('experience.destroy',$item->id) }}" method="POST">

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

    @guest
        <h1>VOUS ETES PAS CONNECTER</h1>
        <a href="{{ route('login')}}">CLIQUER ici pour vous connecter!</a>
    @endguest

    </body>
</html>