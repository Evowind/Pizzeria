@extends('components.cook.nav');

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

        <form method="POST">
            @csrf
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
                @foreach($commandes as $commande)
                    <tr>
                        <td>{{ $commande -> id }}</td>
                        <td class={{ $commande ->statut }}>
                            <input type="text" hidden value="{{ $commande->id }}" name="id[{{ $commande->id }}]">
                            <select name="statut[{{ $commande->id }}]" class="sel">
                                <option value="{{ $commande -> statut }}">{{ $commande -> statut }}</option>
                                @foreach ($statuts as $statut)
                                    @if($statut !== $commande -> statut)
                                        <option value="{{ $statut }}">{{ $statut }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </td>
                        <td>{{ $commande -> created_at }}</td>
                        <td>{{ $commande -> updated_at }}</td>
                        <td><a href="{{ route('user.command.details', $commande->id) }}">Afficher</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            <button type="submit" class="btn">Enregistrer les modifications</button>

        </form>


    </div>
@endsection
