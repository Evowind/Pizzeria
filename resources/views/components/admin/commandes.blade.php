@extends('components.admin.nav')

@section('title', 'Gestion des commandes')

@section('content')
    <div class="table-wrapper">
        <div class="top spacer">
            <h1 class="text-large">Commandes</h1>
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

        <div class="filter">
            <p class="text-normal" style="margin-bottom:.8rem;color:var(--primary-color)">Filtrer la selection</p>

            <form method="POST" class="params">
                @csrf
                <div>
                    <span class="text-normal">Date</span><input type="date" class="date" name="date">
                </div>
                <div>
                    <span class="text-normal">Statut</span>
                    <select name="statut" class="sel">
                        <option value="all">Aucun filtre</option>
                        <option value="envoye">Envoyé</option>
                        <option value="traitement">Traitement</option>
                        <option value="pret">Prêt</option>
                        <option value="recupere">Récuperé</option>
                    </select>
                </div>

                <button type="submit" class="send">Valider</button>
            </form>

        </div>


        <table class="table" style="margin-top: 1rem;">
            <thead>
            <tr>
                <th>Numéro</th>
                <th>Statut</th>
                <th>Date</th>
                <th>Détails</th>
            </tr>
            </thead>
            <tbody>

            @foreach($commandes as $commande)
                <tr>
                    <td>{{ $commande -> id }}</td>
                    <td>{{ $commande -> statut }}</td>
                    <td>{{ $commande->created_at }}</td>
                    <td><a href="{{ route('user.command.details', $commande->id) }}">Afficher</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{$commandes->links("pagination::bootstrap-4")}}

        <div class="recette" style="margin-top:1rem;font-size:1.3rem;">
            <p class="text-large">Recette du jour</p>
            <p class="text-normal" style="font-size:1.3rem;">{{ $recette }}€</p>
        </div>
    </div>
@endsection
