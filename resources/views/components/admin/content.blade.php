@extends('components.admin.nav')

@section('content')
    <div class="text">
        <h2>Bienvenue dans votre espace administrateur {{ Auth::user()->nom }}</h2>
        <p>Type de l'utilisateur: {{ Auth::user()->type }}</p>
    </div>
@endsection