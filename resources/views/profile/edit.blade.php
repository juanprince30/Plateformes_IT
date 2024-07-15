@extends('main.index')
@section('content')
    
<section class="section-hero overlay inner-page bg-image" style="background-image: url('IT/images/hero_1.jpg');" id="home-section">
    <div class="container">
      <div class="row">
        <div class="col-md-7">
          <h1 class="text-white font-weight-bold">Profil</h1>
          <div class="custom-breadcrumbs">
            <a href="{{route('offres.jobsRecents')}}">Home</a> <span class="mx-2 slash">/</span>
            <a href="{{route('profile.edit')}}">Profil</a> <span class="mx-2 slash">/</span>
            <span class="text-white"><strong>Profil</strong></span>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="site-section">
    <div class="container rounded bg-white">
    
        <!-- div pour une image et nom - mail -->
        <div class="row">
            <div class="col-md-2 border-right">
                <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                    @if($user->image)
                        <img class="rounded-circle mt-5" width="150px" src="{{ asset('storage/' . $user->image) }}" alt="Image du profil">
                    @else
                        <img class="rounded-circle mt-5" width="150px" src="{{asset('IT/images/avatar.jpg')}}">
                    @endif
                    <span class="font-weight-bold">{{$user->name}} {{$user->prenom}}</span>
                    <span class="text-black-50">{{$user->email}}</span>
                </div>
            </div>
    
            <!-- div pour le profil, c'est à dire les information concernant l'utilisateur conneceter -->
            <div class="col-md-6 border-right">
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h1 class="text-right"><strong>Profil</strong></h1>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-6">
                            <label class="labels">Nom</label>
                            <input type="text" class="form-control"value="{{$user->name}}" disabled>
                        </div>
                        <div class="col-md-6">
                            <label class="labels">Prenom</label>
                            <input type="text" class="form-control" value="{{$user->prenom}}" disabled>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12">
                            <label class="labels">Date de Naissance</label>
                            <input type="date" class="form-control" value="{{$user->date_naissance}}" disabled>
                        </div>
                        <div class="col-md-12">
                            <label class="labels">Numero de Telephone</label>
                            <input type="text" class="form-control" value="{{$user->telepone}}" disabled>
                        </div>
                        <div class="col-md-12">
                            <label class="labels">Numero de Telephone 2</label>
                            <input type="text" class="form-control" value="{{$user->telephone_2}}" disabled>
                        </div>
                        <div class="col-md-12">
                            <label class="labels">Description</label>  
                            <textarea class="editor form-control" rows="10" disabled>{{$user->description}}</textarea>
                        </div>
                        <div class="col-md-12">
                            <label class="labels">Niveau d'Etude</label> 
                            <input type="text" class="form-control" value="{{$user->niveau_etude}}" disabled>
                        </div>
                        <div class="col-md-12">
                            <label class="labels">Statut</label>  
                            <input type="text" class="form-control" value="{{$user->statut}}" disabled>
                        </div>
                        <div class="col-md-12">
                            <label class="labels">Email</label>  
                            <input type="text" class="form-control" value="{{$user->email}}" disabled>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <label class="labels">Ville</label>
                            <input type="text" class="form-control" value="{{$user->ville}}" disabled>
                        </div>
                        <div class="col-md-6">
                            <label class="labels">Addresse</label>
                            <input type="text" class="form-control" value="{{$user->addresse}}" disabled>
                        </div>
                    </div>
                    <div class="mt-5 text-center">
                        <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#modifier_profil" data-backdrop="false">Modifier Profile</button>
                    </div>

                    <div class="modal fade" id="modifier_profil" tabindex="-1" aria-labelledby="Modifier Profil" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                                <div class="modal-header">
                                <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100 modal-title" id="exampleModalLabel">
                                    {{ __('Profil') }}
                                </h2>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                                <div class="modal-body">
                                    @include('profile.partials.update-profile-information-form')
                                </div>
                          </div>
                        </div>
                    </div>

                    <br><br>
                    <hr style="border: solid black 1px;">
                    <div class="row mt-3">
                        @include('profile.partials.update-password-form')
                    </div>

                    <br><br>
                    <hr style="border: solid black 1px;">
                    <div class="row mt-3">
                        @include('profile.partials.delete-user-form')
                    </div>
    
                </div>
            </div>
    
            <!-- div pour les infos portfolio de l'utilisateur -->
            <div class="col-md-4">
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center">
                        <span><strong>Competences</strong> </span>
                        <button class="btn btn-info"><a href="{{route('competence.create')}}" style="color: white; text-decoration:none;"><i class="icon-add"></i></a></button>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <ul>    
                                @foreach ($competences as $competence)
                                    <li class="d-flex justify-content-between align-items-center mb-2">
                                        <div class="d-flex align-items-center">
                                            <span class="icon-check_circle mr-2 text-muted"></span>
                                            <span>{{$competence->titre}}</span>
                                        </div>
                                        <form action="{{ route('competence.destroy',$competence->id) }}" method="POST">

                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" onclick="return confirm('Etes vous sure de vouloir supprimer?')"  class="btn btn-light" style="border: none"><i class="icon-trash" style="color: red"></i></button>
                                        </form>
                                    </li>
                                
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div> 
                <hr style="border: solid black 1px;">
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center">
                        <span><strong>Certification</strong> </span>
                        <button class="btn btn-info" type="button"><a href="{{route('certification.create')}}" style="color: white; text-decoration:none;"><i class="icon-add"></i></a></button>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <ul>    
                                @foreach ($certifications as $certification)
                                    <li class="d-flex justify-content-between align-items-center mb-2">
                                        <div class="d-flex align-items-center">
                                            <span class="icon-check_circle mr-2 text-muted"></span>
                                            <span>{{$certification->titre}}</span>
                                        </div>
                                        <form action="{{ route('certification.destroy',$certification->id) }}" method="POST">

                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" onclick="return confirm('Etes vous sure de vouloir supprimer?')"  class="btn btn-light" style="border: none"><i class="icon-trash" style="color: red"></i></button>
                                        </form>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <hr style="border: solid black 1px;">
                <div class="p-3 py-5">
                        <div class="d-flex justify-content-between align-items-center">
                            <span><strong>Experience</strong> </span> 
                            <br>
                            <button class="btn btn-info mt-auto"><a href="{{route('experience.create')}}" style="color: white; text-decoration:none;"><i class="icon-add"></i></a></button>              
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <ul>    
                                    @foreach ($experiences as $experience)
                                        <li class="d-flex justify-content-between align-items-center mb-2">
                                            <div class="d-flex align-items-center">
                                                <span class="icon-check_circle mr-2 text-muted"></span>
                                                <span>{{$experience->titre}}</span>
                                            </div>
                                            <form action="{{ route('experience.destroy',$experience->id) }}" method="POST">

                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" onclick="return confirm('Etes vous sure de vouloir supprimer?')"  class="btn btn-light" style="border: none"><i class="icon-trash" style="color: red"></i></button>
                                            </form>
                                        </li>
                
                                    
                                    @endforeach
                                </ul>
                            </div>
                            <div class="col-md-3"></div>
                        </div>
                </div>
                <hr style="border: solid black 1px;">
                <div class="p-3 py-5">
                        <div class="d-flex justify-content-between align-items-center">
                            <span><strong>CV et Motivation</strong> </span>
                                @if ($cv_et_motivations->isEmpty())
                                    <button class="btn btn-info"><a href="{{route('cv_et_motivation.create')}}" style="color: white; text-decoration:none;"><i class="icon-add"></i></a></button>
                                @else
                                    
                                @endif
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <ul>    
                                    @foreach ($cv_et_motivations as $cv_et_motivation)
                                        @if ($cv_et_motivation->cv)
                                            <li class="d-flex justify-content-between align-items-center mb-2">
                                                <div class="d-flex align-items-center">
                                                    <span class="icon-check_circle mr-2 text-muted"></span>
                                                    <span><a href="{{ asset('storage/' . $cv_et_motivation->cv) }}">Voir le Cv</a></span>
                                                </div>
                                                <button class="btn btn-info"><a href="{{route('cv_et_motivation.edit', $cv_et_motivation->id)}}" style="color: white; text-decoration:none;"><i class="icon-edit" style="color: white"></i></a></button>
                                            </li>
                                        @endif
                                        @if ($cv_et_motivation->motivation)
                                        <li class="d-flex justify-content-between align-items-center mb-2">
                                            <div class="d-flex align-items-center">
                                                <span class="icon-check_circle mr-2 text-muted"></span>
                                                <span><a href="{{ asset('storage/' . $cv_et_motivation->motivation) }}">Voir motivation</a></span>
                                            </div>
                                            <button class="btn btn-info"><a href="{{route('cv_et_motivation.edit', $cv_et_motivation->id)}}" style="color: white; text-decoration:none;"><i class="icon-edit" style="color: white"></i></a></button>
                                        </li>
                                        @endif
                                        <form action="{{ route('cv_et_motivation.destroy',$cv_et_motivation->id) }}" method="POST">

                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" onclick="return confirm('Etes vous sure de vouloir supprimer?')"  class="btn btn-light" style="border: none"><i class="icon-trash" style="color: red">Supprimer</i></button>
                                        </form>
                                    
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                </div>
            </div>
            
        </div>
    </div>
    </div>
    </div>
  </section>

@endsection