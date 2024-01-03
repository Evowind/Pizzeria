@extends('components.user.nav');

@section('content')

    <div class="settings-container">
        <p class="text-large">Paramètres du compte</p>

        <div class="settings-wrapper">

            @if ($errors->any())
                <div class="error" id="error">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @elseif(session()->has('ok'))
                <p class="ok" id="ok"><i class='bx bxs-check-circle'></i> {{ session()->get('ok') }}</p>
            @elseif(session()->has('warn'))
                <p class="warn" id="warn"><i class='bx bx-error'></i> {{ session()->get('warn') }}</p>
            @endif

            <form action="{{ route('reset-password') }}" method="POST">

                <h3>Changer le mot de passe</h3>
                @csrf
                <div class="inputs">
                    <input class="input-field" name="id" type="hidden" value="{{ Auth::user()->id }}">
                    <input class="input-field pad" type="password" name="mdp" placeholder="Nouveau mot de passe">
                    <input class="input-field pad" type="password" name="mdp_confirmation"
                           placeholder="Confirmer le mot de passe">
                </div>
                <input class="input-submit" type="submit" value="Enregistrer">
            </form>
        </div>

    </div>

@endsection
