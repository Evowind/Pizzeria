@extends('layouts.login')

@section('title', "Authentification")

@section('content')

    <form method="POST" class="form">
        @csrf

        <div class="input-control">
            <input type="text" name=login placeholder="Identifiant" class="input-field" value="{{ old('login') }}">
        </div>

        <div class="input-control">
            <input type="password" name="mdp" placeholder="Mot de passe" class="input-field">
        </div>

        <input type="submit" value="Connexion" class="input-submit">
    </form>

@endsection