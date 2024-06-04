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
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editExperienceModal{{ $experience->id }}">
                                    Modifier
                                </button>

                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteExperienceModal{{ $experience->id }}">
                                    Supprimer
                                </button>
                            </td>
                        </tr>

                        <!-- Modal Modifier -->
                        <div class="modal fade" id="editExperienceModal{{ $experience->id }}" tabindex="-1" aria-labelledby="editExperienceModalLabel{{ $experience->id }}" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editExperienceModalLabel{{ $experience->id }}">Modifier une expérience</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('experiences.update', $experience->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="form-group">
                                                <label for="edit_pays_id{{ $experience->id }}">Pays</label>
                                                <select class="form-control" id="edit_pays_id{{ $experience->id }}" name="pays_id">
                                                    <option value="">Sélectionner un pays</option>
                                                    @foreach($pays as $pay)
                                                        <option value="{{ $pay->id }}" {{ $experience->pays_id == $pay->id ? 'selected' : '' }}>{{ $pay->nom }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="edit_titre{{ $experience->id }}">Titre</label>
                                                <input type="text" class="form-control" id="edit_titre{{ $experience->id }}" name="titre" value="{{ $experience->titre }}" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="edit_entreprise{{ $experience->id }}">Entreprise</label>
                                                <input type="text" class="form-control" id="edit_entreprise{{ $experience->id }}" name="entreprise" value="{{ $experience->entreprise }}" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="edit_nom_superviseur{{ $experience->id }}">Nom du Superviseur</label>
                                                <input type="text" class="form-control" id="edit_nom_superviseur{{ $experience->id }}" name="nom_superviseur" value="{{ $experience->nom_superviseur }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="edit_contact_superviseur{{ $experience->id }}">Contact du Superviseur</label>
                                                <input type="text" class="form-control" id="edit_contact_superviseur{{ $experience->id }}" name="contact_superviseur" value="{{ $experience->contact_superviseur }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="edit_ville{{ $experience->id }}">Ville</label>
                                                <input type="number" class="form-control" id="edit_ville{{ $experience->id }}" name="ville" value="{{ $experience->ville }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="edit_responsabilite{{ $experience->id }}">Responsabilité</label>
                                                <input type="text" class="form-control" id="edit_responsabilite{{ $experience->id }}" name="responsabilite" value="{{ $experience->responsabilite }}" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="edit_Description{{ $experience->id }}">Description</label>
                                                <textarea class="form-control" id="edit_Description{{ $experience->id }}" name="description" required>{{ $experience->Description }}</textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="edit_travail_actuellement{{ $experience->id }}">Travail Actuellement</label>
                                                <select class="form-control" id="edit_travail_actuellement{{ $experience->id }}" name="travail_actuellement">
                                                    <option value="1" {{ $experience->travail_actuellement ? 'selected' : '' }}>Oui</option>
                                                    <option value="0" {{ !$experience->travail_actuellement ? 'selected' : '' }}>Non</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="edit_date_debut{{ $experience->id }}">Date Début</label>
                                                <input type="date" class="form-control" id="edit_date_debut{{ $experience->id }}" name="date_debut" value="{{ $experience->date_debut }}" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="edit_date_fin{{ $experience->id }}">Date Fin</label>
                                                <input type="date" class="form-control" id="edit_date_fin{{ $experience->id }}" name="date_fin" value="{{ $experience->date_fin }}">
                                            </div>
                                            <button type="submit" class="btn btn-primary">Modifier</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Modal Supprimer -->
                        <div class="modal fade" id="deleteExperienceModal{{ $experience->id }}" tabindex="-1" aria-labelledby="deleteExperienceModalLabel{{ $experience->id }}" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="deleteExperienceModalLabel{{ $experience->id }}">Supprimer une expérience</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Êtes-vous sûr de vouloir supprimer cette expérience ?</p>
                                        <form action="{{ route('experiences.destroy', $experience->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Supprimer</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
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
                                <textarea class="form-control" id="Description" name="escription" required></textarea>
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