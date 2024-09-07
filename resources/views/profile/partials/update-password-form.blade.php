<section>
    <header>
        <h4 class=" text-center">
            {{ __('Modifier Mot de passe') }}
        </h4>

        <p class=" text-center">
            {{ __(' Soyez sure que votre compte utilise un mot de passe long et aleatoire pour assurer votre securite.') }}
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="col-md-12 mt-6 space-y-6">
        @csrf
        @method('put')

        <div>
            <label for="update_password_current_password">Mot de passe actuel</label>
            <input id="update_password_current_password" name="current_password" type="password" class="mt-1 block w-full form-control" autocomplete="current-password" />
            @if ($errors->has('current_password'))
                <div class="mt-2 text-red-600">
                    @foreach ($errors->get('current_password') as $error)
                        <p class="text-danger">{{ $error }}</p>
                    @endforeach
                </div>
            @endif
        </div>

        <div>
            <label for="update_password_password">Nouveau Mot de passe</label>
            <input id="update_password_password" name="password" type="password" class="mt-1 block w-full form-control" autocomplete="new-password" />
            @if ($errors->has('password'))
                <div class="mt-2 text-red-600">
                    @foreach ($errors->get('password') as $error)
                        <p class="text-danger">{{ $error }}</p>
                    @endforeach
                </div>
            @endif
        </div>

        <div>
            <label for="update_password_password_confirmation">Retaper Mot de passe</label>
            <input id="update_password_password_confirmation" name="password_confirmation" type="password" class="mt-1 block w-full form-control" autocomplete="new-password" />
            @if ($errors->has('password_confirmation'))
                <div class="mt-2 text-red-600">
                    @foreach ($errors->get('password_confirmation') as $error)
                        <p class="text-danger">{{ $error }}</p>
                    @endforeach
                </div>
            @endif
        </div>
        <br>
        <div class="row">
            <div class="col-md-4"></div>

            <div class="col-md-2 flex items-center gap-4">
                <button class="btn btn-primary" type="submit">{{ __('Enregistrer') }}</button>
    
                @if (session('status') === 'password-updated')
                    <p
                        x-data="{ show: true }"
                        x-show="show"
                        x-transition
                        x-init="setTimeout(() => show = false, 2000)"
                        class="text-sm text-gray-600 dark:text-gray-400"
                    >{{ __('Saved.') }}</p>
                @endif
            </div>

            <div class="col-md-5"></div>
        </div>
    </form>
</section>
