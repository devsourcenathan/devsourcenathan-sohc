@extends('client.partials.main')

@section('content')

<x-guest-layout>
    <x-auth-card>
        <div class="d-flex align-items-center mb-3 pb-1">
            <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
            <span class="h1 fw-bold mb-0">Logo</span>
          </div>

          <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Se connecter à son compte</h5>

                  
        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div class="form-outline mb-4">
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="form-control form-control-lg" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <!-- Password -->
            <div class="form-outline mb-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />
            </div>

            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Se souvenir de moi') }}</span>
                </label>
            </div>
            <div class="pt-1 mb-4">
                <x-button>
                    {{ __('Se connecter') }}
                </x-button>
              </div>

                

                @if (Route::has('password.request'))
                    <a class="small text-muted" href="{{ route('password.request') }}">Mot de passe oublié ?</a>
                  @endif
                  <p class="mb-5 pb-lg-2" style="color: #393f81;">Pas encore de compte ? <a href="/register"
                      style="color: #393f81;">Créer ici</a></p>
                  <a href="#!" class="small text-muted">Termes et usages.</a>
                  <a href="#!" class="small text-muted">Politique de confidentialité</a>
        </form>
    </x-auth-card>
</x-guest-layout>

@endsection
