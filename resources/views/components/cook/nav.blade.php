@extends('layouts.dashboard')

@section('title', 'Espace utilisateur')

@section('nav')
    <li class="nav-link">
        <a href="{{ route('user.home') }}" id="home" class="active">
            <i class='bx bx-home-alt icon'></i>
            <span class="text nav-text">Accueil</span>
        </a>
    </li>

    <li class="nav-link">
        <a href="{{ route('cook.commandes') }}" id="commands">
            <i class='bx bx-notepad icon'></i>
            <span class="text nav-text">Commandes</span>
        </a>
    </li>

    <li class="nav-link">
        <a href="{{ route('user.settings') }}" id="settings">
            <i class='bx bx-cog icon'></i>
            <span class="text nav-text">Paramètres</span>
        </a>
    </li>
@endsection

@section('imports')
    <script src="{{ URL::asset('js/nav.js') }}"></script>
    <script src="{{ URL::asset('js/events.js') }}"></script>
    <script src="{{ URL::asset('js/order.js') }}"></script>
@endsection
