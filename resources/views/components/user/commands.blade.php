@extends('components.user.nav');

@section('title', "Mes commandes")

@section('content')
    <div class="table-wrapper">
        <div class="top spacer">
            <h1 class="text-large">Commandes passées</h1>
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


        <table class="table" style="margin-top: 1rem;">
            <thead>
            <tr>
                <th>Numéro</th>
                <th>Statut</th>
                <th>Date de création</th>
                <th>Dernière modification</th>
                <th>Détails</th>
            </tr>
            </thead>
            <tbody>

            @foreach($commands as $command)
                <tr>
                    <td>{{ $command -> id }}</td>
                    <td class={{ $command ->statut }}>{{ $command -> statut }}</td>
                    <td>{{ $command -> created_at }}</td>
                    <td>{{ $command -> updated_at }}</td>
                    <td><a href="{{ route('user.command.details', $command->id) }}">Afficher</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
