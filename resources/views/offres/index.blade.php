@extends('layouts.test')

@section('titre')
Offres
@endsection

@section('content')
<div class="container mt-5">
    <h1>Offres</h1>
    <br><br>

    @auth
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addOffreModal">
        Ajouter une offre
    </button>

    <table class="table mt-3">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Titre</th>
                <th scope="col">Type</th>
                <th scope="col">Ville</th>
                <th scope="col">Pays</th>
                <th scope="col">Salaire</th>
                <th scope="col">Expérience Requise</th>
                <th scope="col">Responsabilité</th>
                <th scope="col">Compétence Requise</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody class="table-group-divider">
            @foreach ($offres as $offre)
            <tr>
                <th scope="row">{{ $offre->id }}</th>
                <td>{{ $offre->titre }}</td>
                <td>{{ $offre->type_offre }}</td>
                <td>{{ $offre->ville }}</td>
                <td>{{ $offre->pays }}</td>
                <td>{{ $offre->salaire }}</td>
                <td>{{ $offre->experience_requis }}</td>
                <td>{{ $offre->responsabilite }}</td>
                <td>{{ $offre->competence_requis }}</td>
                <td>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editOffreModal{{ $offre->id }}">
                        Modifier
                    </button>
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteOffreModal{{ $offre->id }}">
                        Supprimer
                    </button>
                </td>
            </tr>

            <!-- Modal Modifier -->
            <div class="modal fade" id="editOffreModal{{ $offre->id }}" tabindex="-1" aria-labelledby="editOffreModalLabel{{ $offre->id }}" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editOffreModalLabel{{ $offre->id }}">Modifier une offre</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('offres.update', $offre->id) }}" method="POST">
                                @csrf
                                @method('PUT')

                                <div class="form-group">
                                    <label for="edit_titre{{ $offre->id }}">Titre</label>
                                    <input type="text" class="form-control" id="edit_titre{{ $offre->id }}" name="titre" value="{{ $offre->titre }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="edit_type_offre{{ $offre->id }}">Type d'Offre</label>
                                    <input type="text" class="form-control" id="edit_type_offre{{ $offre->id }}" name="type_offre" value="{{ $offre->type_offre }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="edit_ville{{ $offre->id }}">Ville</label>
                                    <input type="text" class="form-control" id="edit_ville{{ $offre->id }}" name="ville" value="{{ $offre->ville }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="edit_pays{{ $offre->id }}">Pays</label>
                                    <input type="text" class="form-control" id="edit_pays{{ $offre->id }}" name="pays" value="{{ $offre->pays }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="edit_salaire{{ $offre->id }}">Salaire</label>
                                    <input type="number" class="form-control" id="edit_salaire{{ $offre->id }}" name="salaire" value="{{ $offre->salaire }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="edit_experience_requis{{ $offre->id }}">Expérience Requise</label>
                                    <input type="text" class="form-control" id="edit_experience_requis{{ $offre->id }}" name="experience_requis" value="{{ $offre->experience_requis }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="edit_responsabilite{{ $offre->id }}">Responsabilité</label>
                                    <input type="text" class="form-control" id="edit_responsabilite{{ $offre->id }}" name="responsabilite" value="{{ $offre->responsabilite }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="edit_competence_requis{{ $offre->id }}">Compétence Requise</label>
                                    <input type="text" class="form-control" id="edit_competence_requis{{ $offre->id }}" name="competence_requis" value="{{ $offre->competence_requis }}" required>
                                </div>
                                <button type="submit" class="btn btn-primary">Modifier</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal Supprimer -->
            <div class="modal fade" id="deleteOffreModal{{ $offre->id }}" tabindex="-1" aria-labelledby="deleteOffreModalLabel{{ $offre->id }}" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="deleteOffreModalLabel{{ $offre->id }}">Supprimer une offre</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>Êtes-vous sûr de vouloir supprimer cette offre ?</p>
                            <form action="{{ route('offres.destroy', $offre->id) }}" method="POST">
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

<!-- Modal Ajouter -->
<div class="modal fade" id="addOffreModal" tabindex="-1" aria-labelledby="addOffreModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addOffreModalLabel">Ajouter une offre</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('offres.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="titre">Titre</label>
                        <input type="text" class="form-control" id="titre" name="titre" required>
                    </div>
                    <div class="form-group">
                        <label for="type_offre">Type d'Offre</label>
                        <input type="text" class="form-control" id="type_offre" name="type_offre" required>
                    </div>
                    <div class="form-group">
                        <label for="categorie_id">Catégorie</label>
                        <select class="form-control" id="categorie_id" name="categorie_id">
                            <option value="">Selecionner ...</option>
                            @foreach ($categories as $categorie)
                            <option value="{{$categorie->id}}">{{$categorie->libelle}}</option>
                                
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="ville">Ville</label>
                        <input type="text" class="form-control" id="ville" name="ville" required>
                    </div>
                    <div class="form-group">
                        <label for="pays">Pays</label>
                        <input type="text" class="form-control" id="pays" name="pays" required>
                    </div>
                    <div class="form-group">
                        <label for="salaire">Salaire</label>
                        <input type="number" class="form-control" id="salaire" name="salaire" required>
                    </div>
                    <div class="form-group">
                        <label for="experience_requis">Expérience Requise</label>
                        <input type="text" class="form-control" id="experience_requis" name="experience_requis" required>
                    </div>
                    <div class="form-group">
                        <label for="responsabilite">Responsabilité</label>
                        <input type="text" class="form-control" id="responsabilite" name="responsabilite" required>
                    </div>
                    <div class="form-group">
                        <label for="competence_requis">Compétence Requise</label>
                        <input type="text" class="form-control" id="competence_requis" name="competence_requis" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Ajouter</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
