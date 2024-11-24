<x-guest-layout>
    <div class="mb-4 text-sm text-gray-600">
        {{-- {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }} --}}
        {{ __("Vous avez oublié votre mot de passe ? Pas de problème. Indiquez-nous simplement votre adresse e-mail et nous vous enverrons un lien de réinitialisation qui vous permettra d'en choisir un nouveau.") }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" class="block mb-1 font-medium text-[20px] text-[#6F7D93]" :value="__('Entrez Votre E-mail')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus aria-placeholder="email"/>
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{-- {{ __('Email Password Reset Link') }} --}}
                {{ __('Envoyer le lien de réinitialisation du mot de passe') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
