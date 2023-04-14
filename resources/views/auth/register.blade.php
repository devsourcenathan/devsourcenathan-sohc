@extends('client.partials.main')

@section('content')

<x-guest-layout>
    <x-auth-card>
        <div class="d-flex align-items-center mb-3 pb-1">
            <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
            <span class="h1 fw-bold mb-0">Logo</span>
          </div>

          <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Créer un compte</h5>

                  
        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}"">
            @csrf

          <div class="form-outline mb-4">
            <label class="form-label" for="form2Example17">Type de compte</label>
            <select class="form-control form-control-lg" name="type">
                <option value="client">Client</option>
                <option value="lessor">Bayeur</option>
            </select>
            {{-- <input type="email" id="form2Example17" class="form-control form-control-lg" /> --}}
          </div>

          <div class="form-outline mb-4">
            <x-label for="name" :value="__('Nom')" />

                <x-input id="name" class="form-control form-control-lg" type="text" name="name" :value="old('name')" required autofocus />
          </div>

          <div class="form-outline mb-4">
            <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="form-control form-control-lg" type="email" name="email" :value="old('email')" required />
          </div>

          <div class="form-outline mb-4">
            <x-label for="password" :value="__('Mot de passe')" />

                <x-input id="password" class="form-control form-control-lg"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
          </div>

          <div class="form-outline mb-4">
            <x-label for="password_confirmation" :value="__('Comfirmer le Mot de passe')" />

            <x-input id="password_confirmation" class="form-control form-control-lg"
                            type="password"
                            name="password_confirmation" required />
          </div>

          <div class="pt-1 mb-4">
            <x-button>
                {{ __('Créer mon compte') }}
            </x-button>
          </div>

          <p class="mb-5 pb-lg-2" style="color: #393f81;">Déjà un compte ? <a href="{{ route('login') }}"
              style="color: #393f81;">Se connecter</a></p>
          <a href="#!" class="small text-muted">Termes et usages.</a>
          <a href="#!" class="small text-muted">Politique de confidentialité</a>
        </form>
    </x-auth-card>
</x-guest-layout>

@endsection
