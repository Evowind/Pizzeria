@extends('layouts.dashboard')

@section('title', 'Espace utilisateur')

@section('nav')
    <li class="nav-link">
        <a href="{{ route('user.order') }}" id="order">
            <i class='bx bx-cart-alt icon'></i>
            <span class="text nav-text">Commander</span>
        </a>
    </li>

    <li class="nav-link">
        <a href="{{ route('user.commands') }}" id="commands">
            <i class='bx bx-notepad icon'></i>
            <span class="text nav-text">Mes commandes</span>
        </a>
    </li>

    @if (Auth::user()->isAdmin())
        <li class="nav-link">
            <a href="{{ route('panel.admin') }}">
                <i class='bx bx-user icon'></i>
                <span class="text nav-text">Espace admin</span>
            </a>
        </li>
    @endif

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
