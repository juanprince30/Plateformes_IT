<section class="space-y-6">
    <header>
        <h4>
            {{ __('Supprimer votre compte') }}
        </h4>

        <p>
            {{ __('Une fois que votre compte est supprimer, toutes vos ressources et donnees seront supprimer definitivement.') }}
        </p>
    </header>
    
    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal" data-backdrop="false">Supprimer Compte</button>


    <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="Supprimer Compte" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Supprimer Compte</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
                        @csrf
                        @method('delete')
            
                        <h2>
                            {{ __('Etes vous sure de vouloir supprimer votre Compte?') }}
                        </h2>
            
                        <p>
                            {{ __('Une fois que votre compte est supprimer, toutes vos donnee et ressources le seront aussi. Entrer s\'il vous plait votre mot de passe pour confirmer la suppression definitive de votre Compte.') }}
                        </p>
            
                        <div class="mt-6">
                            <label for="password" class="sr-only">Mot de Passe </label>
            
                            <input
                                id="password"
                                name="password"
                                type="password"
                                class="mt-1 block w-3/4 form-control"
                                placeholder="{{ __('Mot de passe') }}"
                            />
                            @if ($errors->has('password'))
                                <div class="mt-2 text-red-600">
                                    @foreach ($errors->get('password') as $error)
                                        <p class="text-danger">{{ $error }}</p>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                        <br>
                        <div class="mt-6 flex justify-end">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
            
                            <button type="submit" class="btn btn-danger ms-3">Supprimer Compte</button>
                        </div>
                    </form>
                </div>
          </div>
        </div>
    </div>
      


</section>
