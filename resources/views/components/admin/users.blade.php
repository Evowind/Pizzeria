@extends('components.admin.nav')

@section('title', 'Gestion utilisateurs')

@section('content')
    <div class="table-wrapper">
        <div class="top spacer">
            <h1 class="text-large">Utilisateurs</h1>
        </div>

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


        <table class="table">
            <thead>
            <tr>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Type</th>
                <th>Détails</th>
            </tr>
            </thead>
            <tbody>

            @foreach($users as $user)
                <tr>
                    <td>{{ $user -> nom }}</td>
                    <td>{{ $user -> prenom }}</td>
                    <td>{{ $user->type }}</td>
                    <td><a href="">Afficher</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
