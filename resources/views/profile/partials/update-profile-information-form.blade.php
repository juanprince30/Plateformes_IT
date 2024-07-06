<section>
    <header>
        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("Mettez à jour votre profil et vos informations personnelles.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6 justify-items-center" enctype="multipart/form-data">
        @csrf
        @method('patch')

        @if($user->image)
            <img src="{{ asset('storage/' . $user->image) }}" class="rounded-circle mt-5" alt="Image du profil" width="150px">
        @else
            <img class="rounded-circle mt-5" width="150px" src="{{asset('IT/images/avatar.jpg')}}" alt="Image du profil">
        @endif

        <div>
            <label for="image">Modifier votre Image</label>
            <input type="file" id="image" name="image" class="mt-1 block w-full form-control" accept="image/*"/>
            @if ($errors->has('image'))
                <div class="mt-2 text-red-600">
                    @foreach ($errors->get('image') as $error)
                        <p class="text-danger">{{ $error }}</p>
                    @endforeach
                </div>
            @endif
        </div>


        <div>
            <label for="name">Nom</label>
            <input id="name" name="name" type="text" class="mt-1 block w-full form-control" value="{{$user->name}}" required autofocus autocomplete="name" />
            @if ($errors->has('name'))
                <div class="mt-2 text-red-600">
                    @foreach ($errors->get('name') as $error)
                        <p class="text-danger">{{ $error }}</p>
                    @endforeach
                </div>
            @endif
        </div>

        <div>
            <label for="prenom">Prenom</label>
            <input id="prenom" name="prenom" type="text" class="mt-1 block w-full form-control" value="{{$user->prenom}}" required autofocus autocomplete="prenom" />
            @if ($errors->has('prenom'))
                <div class="mt-2 text-red-600">
                    @foreach ($errors->get('prenom') as $error)
                        <p class="text-danger">{{ $error }}</p>
                    @endforeach
                </div>
            @endif
        </div>

        <div>
            <label for="date_naissance">Date de naissance</label>
            <input id="date_naissance" name="date_naissance" type="date" class="mt-1 block w-full form-control" value="{{$user->date_naissance}}" autofocus autocomplete="date_naissance" />
            @if ($errors->has('date_naissance'))
                <div class="mt-2 text-red-600">
                    @foreach ($errors->get('date_naissance') as $error)
                        <p class="text-danger">{{ $error }}</p>
                    @endforeach
                </div>
            @endif
        </div>
        
        <div>
            <label for="telepone">Telephone</label>
            <input id="telepone" name="telepone" type="text" class="mt-1 block w-full form-control" value="{{$user->telepone}}"  autofocus autocomplete="telepone" />
            @if ($errors->has('telepone'))
                <div class="mt-2 text-red-600">
                    @foreach ($errors->get('telepone') as $error)
                        <p class="text-danger">{{ $error }}</p>
                    @endforeach
                </div>
            @endif
        </div>

        <div>
            <label for="telephone_2">Telephone 2</label>
            <input id="telephone_2" name="telephone_2" type="text" class="mt-1 block w-full form-control" value="{{$user->telephone_2}}" autofocus autocomplete="telephone_2" />
            @if ($errors->has('telephone_2'))
                <div class="mt-2 text-red-600">
                    @foreach ($errors->get('telephone_2') as $error)
                        <p class="text-danger">{{ $error }}</p>
                    @endforeach
                </div>
            @endif
        </div>

        <div>
            <label for="ville">Ville</label>
            <input id="ville" name="ville" type="text" class="mt-1 block w-full form-control" value="{{$user->ville}}" autofocus autocomplete="ville" />
            @if ($errors->has('ville'))
                <div class="mt-2 text-red-600">
                    @foreach ($errors->get('ville') as $error)
                        <p class="text-danger">{{ $error }}</p>
                    @endforeach
                </div>
            @endif
        </div>      
        
        <div>
            <label for="addresse">Addresse</label>
            <input id="addresse" name="addresse" type="text" class="mt-1 block w-full form-control" value="{{$user->addresse}}" autofocus autocomplete="addresse" />
            @if ($errors->has('addresse'))
                <div class="mt-2 text-red-600">
                    @foreach ($errors->get('addresse') as $error)
                        <p class="text-danger">{{ $error }}</p>
                    @endforeach
                </div>
            @endif
        </div>

        <div>
            <label for="description">Description</label>
            <textarea id="description" name="description" rows="9" class="mt-1 block w-full form-control" autofocus autocomplete="description">{{ old('description', $user->description) }}</textarea>
            @if ($errors->has('description'))
                <div class="mt-2 text-red-600">
                    @foreach ($errors->get('description') as $error)
                        <p class="text-danger">{{ $error }}</p>
                    @endforeach
                </div>
            @endif
        </div>
        
        <div>
            <label for="niveau_etude">Niveau Etude</label>
            <select name="niveau_etude" id="niveau_etude" class="mt-1 block w-full form-control">
                <option value="" selected disabled hidden>Selectionner une option</option>
                <option value="Bac+1" {{ old('niveau_etude', $user->niveau_etude) == 'Bac+1' ? 'selected' : '' }}>Bac+1</option>
                <option value="Bac+2" {{ old('niveau_etude', $user->niveau_etude) == 'Bac+2' ? 'selected' : '' }}>Bac+2</option>
                <option value="Bac+3" {{ old('niveau_etude', $user->niveau_etude) == 'Bac+3' ? 'selected' : '' }}>Bac+3</option>
                <option value="Bac+4" {{ old('niveau_etude', $user->niveau_etude) == 'Bac+4' ? 'selected' : '' }}>Bac+4</option>
                <option value="Bac+5" {{ old('niveau_etude', $user->niveau_etude) == 'Bac+5' ? 'selected' : '' }}>Bac+5</option>
                <option value="Bac+6" {{ old('niveau_etude', $user->niveau_etude) == 'Bac+6' ? 'selected' : '' }}>Bac+6</option>
                <option value="Bac+7" {{ old('niveau_etude', $user->niveau_etude) == 'Bac+7' ? 'selected' : '' }}>Bac+7</option>
            </select>
            @if ($errors->has('niveau_etude'))
                <div class="mt-2 text-red-600">
                    @foreach ($errors->get('niveau_etude') as $error)
                        <p class="text-danger">{{ $error }}</p>
                    @endforeach
                </div>
            @endif
        </div>
        
        <div>
            <label for="statut">Statut</label>
            <select name="statut" id="statut" class="mt-1 block w-full form-control" >
                <option value="" selected disabled hidden>Selectionner une option</option>
                <option value="Etudiant" {{ old('statut', $user->statut) == 'Etudiant' ? 'selected' : '' }}>Etudiant</option>
                <option value="Professionel" {{ old('statut', $user->statut) == 'Professionel' ? 'selected' : '' }}>Professionel</option>
                <option value="Chomeur" {{ old('statut', $user->statut) == 'Chomeur' ? 'selected' : '' }}>Chomeur</option>
                <option value="Stagiaire" {{ old('statut', $user->statut) == 'Stagiaire' ? 'selected' : '' }}>Stagiaire</option>
            </select>
            @if ($errors->has('statut'))
                <div class="mt-2 text-red-600">
                    @foreach ($errors->get('statut') as $error)
                        <p class="text-danger">{{ $error }}</p>
                    @endforeach
                </div>
            @endif
        </div>       

        <div>
            <label for="email">Email</label>
            <input id="email" name="email" type="email" class="mt-1 block w-full form-control" value="{{$user->email}}" required autocomplete="username" />
            @if ($errors->has('email'))
                <div class="mt-2 text-red-600">
                    @foreach ($errors->get('email') as $error)
                        <p class="text-danger">{{ $error }}</p>
                    @endforeach
                </div>
            @endif

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800 dark:text-gray-200">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600 dark:text-green-400">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>
        <br>

        <div class="flex items-center gap-4">
            <button class="btn btn-primary">{{ __('Modifier') }}</button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600 dark:text-gray-400"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
