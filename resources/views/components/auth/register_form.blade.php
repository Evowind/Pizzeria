@extends('layouts.register')

@section('title', "Créer un compte")

@section('content')

    <form method="POST" class="form">
        @csrf

        <div class="input-control">
            <input type="text" name=login placeholder="Identifiant" class="input-field" value="{{ old('login') }}">
        </div>

        <div class="input-control">
            <input type="text" name=nom placeholder="Nom" class="input-field" value="{{ old('nom') }}">
        </div>

        <div class="input-control">
            <input type="text" name=prenom placeholder="Prénom" class="input-field" value="{{ old('prenom') }}">
        </div>

        <div class="input-control">
            <input type="password" name="mdp" placeholder="Mot de passe" class="input-field">
        </div>

        <div class="input-control">
            <input type="password" name="mdp_confirmation" placeholder="Confirmer mot de passe" class="input-field">
        </div>

        <input type="submit" value="Créer mon compte" class="input-submit">
    </form>

@endsection

