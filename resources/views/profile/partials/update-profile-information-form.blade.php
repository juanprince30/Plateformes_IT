<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6" enctype="multipart/form-data">
        @csrf
        @method('patch')

        @if($user->image)
            <img src="{{ asset('storage/' . $user->image) }}" alt="Image du profil" width="100">
        @endif

        <div>
            <x-input-label for="image" :value="__('Image')" />
            <input type="file" id="image" name="image" class="mt-1 block w-full" accept="image/*" />
            <x-input-error class="mt-2" :messages="$errors->get('image')" />
        </div>


        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div>
            <x-input-label for="prenom" :value="__('Prenom')" />
            <x-text-input id="prenom" name="prenom" type="text" class="mt-1 block w-full" :value="old('prenom', $user->prenom)" required autofocus autocomplete="prenom" />
            <x-input-error class="mt-2" :messages="$errors->get('prenom')" />
        </div>

        <div>
            <x-input-label for="date_naissance" :value="__('Date de naissance')" />
            <x-text-input id="date_naissance" name="date_naissance" type="date" class="mt-1 block w-full" :value="old('date_naissance', $user->date_naissance)" autofocus autocomplete="date_naissance" />
            <x-input-error class="mt-2" :messages="$errors->get('date_naissance')" />
        </div>
        
        <div>
            <x-input-label for="telepone" :value="__('Telephone')" />
            <x-text-input id="telepone" name="telepone" type="text" class="mt-1 block w-full" :value="old('telepone', $user->telepone)"  autofocus autocomplete="telepone" />
            <x-input-error class="mt-2" :messages="$errors->get('telepone')" />
        </div>

        <div>
            <x-input-label for="telephone_2" :value="__('Telephone 2')" />
            <x-text-input id="telephone_2" name="telephone_2" type="text" class="mt-1 block w-full" :value="old('telephone_2', $user->telephone_2)" autofocus autocomplete="telephone_2" />
            <x-input-error class="mt-2" :messages="$errors->get('telephone_2')" />
        </div>

        <div>
            <x-input-label for="ville" :value="__('Ville')" />
            <x-text-input id="ville" name="ville" type="text" class="mt-1 block w-full" :value="old('ville', $user->ville)" autofocus autocomplete="ville" />
            <x-input-error class="mt-2" :messages="$errors->get('ville')" />
        </div>      
        
        <div>
            <x-input-label for="addresse" :value="__('Addresse ')" />
            <x-text-input id="addresse" name="addresse" type="text" class="mt-1 block w-full" :value="old('addresse', $user->addresse)" autofocus autocomplete="addresse" />
            <x-input-error class="mt-2" :messages="$errors->get('addresse')" />
        </div>

        <div>
            <x-input-label for="description" :value="__('Description')" />
            <textarea id="description" name="description" class="mt-1 block w-full" autofocus autocomplete="description">{{ old('description', $user->description) }}</textarea>
            <x-input-error class="mt-2" :messages="$errors->get('description')" />
        </div>
        
        <div>
            <x-input-label for="niveau_etude" :value="__('Niveau d\'étude')" />
            <select name="niveau_etude" id="niveau_etude" class="mt-1 block w-full">
                <option value="" selected disabled hidden>Selectionner une option</option>
                <option value="Bac+1" {{ old('niveau_etude', $user->niveau_etude) == 'Bac+1' ? 'selected' : '' }}>Bac+1</option>
                <option value="Bac+2" {{ old('niveau_etude', $user->niveau_etude) == 'Bac+2' ? 'selected' : '' }}>Bac+2</option>
                <option value="Bac+3" {{ old('niveau_etude', $user->niveau_etude) == 'Bac+3' ? 'selected' : '' }}>Bac+3</option>
                <option value="Bac+4" {{ old('niveau_etude', $user->niveau_etude) == 'Bac+4' ? 'selected' : '' }}>Bac+4</option>
                <option value="Bac+5" {{ old('niveau_etude', $user->niveau_etude) == 'Bac+5' ? 'selected' : '' }}>Bac+5</option>
                <option value="Bac+6" {{ old('niveau_etude', $user->niveau_etude) == 'Bac+6' ? 'selected' : '' }}>Bac+6</option>
                <option value="Bac+7" {{ old('niveau_etude', $user->niveau_etude) == 'Bac+7' ? 'selected' : '' }}>Bac+7</option>
            </select>
            <x-input-error class="mt-2" :messages="$errors->get('niveau_etude')" />
        </div>
        
        <div>
            <x-input-label for="statut" :value="__('Statut')" />
            <select name="statut" id="statut" class="mt-1 block w-full" >
                <option value="" selected disabled hidden>Selectionner une option</option>
                <option value="Etudiant" {{ old('statut', $user->statut) == 'Etudiant' ? 'selected' : '' }}>Etudiant</option>
                <option value="Professionel" {{ old('statut', $user->statut) == 'Professionel' ? 'selected' : '' }}>Professionel</option>
                <option value="Chomeur" {{ old('statut', $user->statut) == 'Chomeur' ? 'selected' : '' }}>Chomeur</option>
                <option value="Stagiaire" {{ old('statut', $user->statut) == 'Stagiaire' ? 'selected' : '' }}>Stagiaire</option>
            </select>
            <x-input-error class="mt-2" :messages="$errors->get('statut')" />
        </div>       

        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

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

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

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
