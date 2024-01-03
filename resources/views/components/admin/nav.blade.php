@extends('layouts.dashboard')

@section('title', "Espace admministrateur")

@section('nav')

    <li class="nav-link">
        <a href="/panel/admin/home" class="active" id="home">
            <i class='bx bx-home-alt icon'></i>
            <span class="text nav-text">Accueil</span>
        </a>
    </li>
    <li class="nav-link">
        <a href="/panel/admin/pizzas" id="pizzas">
            <i class='bx bxs-pizza icon'></i>
            <span class="text nav-text">Pizzas</span>
        </a>
    </li>
    <li class="nav-link">
        <a href="{{ route('admin.commandes') }}" id="orders">
            <i class='bx bx-notepad icon'></i>
            <span class="text nav-text">Commandes</span>
        </a>
    </li>
    <li class="nav-link">
        <a href="{{ route('admin.users') }}" id="users">
            <i class='bx bx-user icon'></i>
            <span class="text nav-text">Utilisateurs</span>
        </a>
    </li>
    <li class="nav-link">
        <a href="{{ route('user.home') }}" id="users">
            <i class='bx bx-arrow-back icon'></i>
            <span class="text nav-text">Espace utilisateur</span>
        </a>
    </li>

@endsection

@section('imports')
    <script src="{{ URL::asset('js/nav.js') }}"></script>
    <script src="{{ URL::asset('js/pizzas.js') }}"></script>
    <script src="{{ URL::asset('js/events.js') }}"></script>
@endsection
