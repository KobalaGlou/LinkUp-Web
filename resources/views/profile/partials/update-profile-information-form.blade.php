<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Information du profil') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("Mettez à jour les informations de votre profil et votre adresse e-mail.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.updateProfile') }}" class="mt-6 space-y-6">
        @csrf

        <div>
            <x-input-label for="nomU" :value="__('Nom')" />
            <x-text-input id="nomU" name="nomU" type="text" class="mt-1 block w-full" :value="old('nomU', $user->nomU)" required autofocus autocomplete="nomU" />
            <x-input-error class="mt-2" :messages="$errors->get('nomU')" />
        </div>
        <div>
            <x-input-label for="prenomU" :value="__('Prénom')" />
            <x-text-input id="prenomU" name="prenomU" type="text" class="mt-1 block w-full" :value="old('prenomU', $user->prenomU)" required autofocus autocomplete="prenomU" />
            <x-input-error class="mt-2" :messages="$errors->get('prenomU')" />
        </div>
        <div>
            <x-input-label for="emailU" :value="__('Email')" />
            <x-text-input id="emailU" name="emailU" type="email" class="mt-1 block w-full" :value="old('emailU', $user->emailU)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('emailU')" />


        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Sauvegarder') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
            <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)" class="text-sm text-gray-600 dark:text-gray-400">{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>