@extends('layouts.test')

@section('titre')
Expériences

@endsection
@section('content')

        <div class="container mt-5">
            <h1>Experiences</h1>
            <br><br>
            
            @auth
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addExperienceModal">
                    Ajouter une expérience
                </button>
        
                <table class="table mt-3">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Titre</th>
                            <th scope="col">Entreprise</th>
                            <th scope="col">Nom du Superviseur</th>
                            <th scope="col">Contact du Superviseur</th>
                            <th scope="col">Responsabilité</th>
                            <th scope="col">Description</th>
                            <th scope="col">Travail Actuellement</th>
                            <th scope="col">Date Début</th>
                            <th scope="col">Date Fin</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">
                        @foreach ($experiences as $experience)
                            <tr>
                                <th scope="row">{{ $experience->id }}</th>
                                <td>{{ $experience->titre }}</td>
                                <td>{{ $experience->entreprise }}</td>
                                <td>{{ $experience->nom_superviseur }}</td>
                                <td>{{ $experience->contact_superviseur }}</td>
                                <td>{{ $experience->responsabilite }}</td>
                                <td>{{ $experience->Description }}</td>
                                <td>{{ $experience->travail_actuellement ? 'Oui' : 'Non' }}</td>
                                <td>{{ $experience->date_debut }}</td>
                                <td>{{ $experience->date_fin }}</td>
                                <td>
                                    <form action="{{ route('experiences.destroy', $experience->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <a href="{{ route('experiences.edit', $experience->id) }}" class="btn btn-primary">Modifier</a>
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Etes-vous sûr de vouloir supprimer?')">Supprimer</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endauth
        </div>

        <!-- Modal -->
        <div class="modal fade" id="addExperienceModal" tabindex="-1" aria-labelledby="addExperienceModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addExperienceModalLabel">Ajouter une expérience</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('experiences.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="pays_id">Pays</label>
                                <select class="form-control" id="pays_id" name="pays_id">
                                    <option value="">Sélectionner un pays</option>
                                    @foreach($pays as $pay)
                                        <option value="{{ $pay->id }}">{{ $pay->nom }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="titre">Titre</label>
                                <input type="text" class="form-control" id="titre" name="titre" required>
                            </div>
                            <div class="form-group">
                                <label for="entreprise">Entreprise</label>
                                <input type="text" class="form-control" id="entreprise" name="entreprise" required>
                            </div>
                            <div class="form-group">
                                <label for="nom_superviseur">Nom du Superviseur</label>
                                <input type="text" class="form-control" id="nom_superviseur" name="nom_superviseur">
                            </div>
                            <div class="form-group">
                                <label for="contact_superviseur">Contact du Superviseur</label>
                                <input type="text" class="form-control" id="contact_superviseur" name="contact_superviseur">
                            </div>
                            <div class="form-group">
                                <label for="ville">Ville</label>
                                <input type="number" class="form-control" id="ville" name="ville">
                            </div>
                            <div class="form-group">
                                <label for="responsabilite">Responsabilité</label>
                                <input type="text" class="form-control" id="responsabilite" name="responsabilite" required>
                            </div>
                            <div class="form-group">
                                <label for="Description">Description</label>
                                <textarea class="form-control" id="Description" name="Description" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="travail_actuellement">Travail Actuellement</label>
                                <select class="form-control" id="travail_actuellement" name="travail_actuellement">
                                    <option value="1">Oui</option>
                                    <option value="0">Non</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="date_debut">Date Début</label>
                                <input type="date" class="form-control" id="date_debut" name="date_debut" required>
                            </div>
                            <div class="form-group">
                                <label for="date_fin">Date Fin</label>
                                <input type="date" class="form-control" id="date_fin" name="date_fin">
                            </div>
                            <button type="submit" class="btn btn-primary">Ajouter</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

@endsection