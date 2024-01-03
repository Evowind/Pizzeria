@extends('components.user.nav');

@section('title', "Détail de la commande $commande->id")

@section('content')
    <div class="table-wrapper">

        <div class="top spacer">
            <h1 class="text-large">Commande {{ $commande->id }}</h1>
            <p class="text-normal">{{ $user->nom }} {{ $user->prenom }}</p>
        </div>
        <table class="table tcart" style="margin-top: 1rem;">

            <thead>
            <tr>
                <th>Pizza</th>
                <th>Quantité</th>
                <th>Prix</th>
            </tr>
            </thead>

            <tbody>
            @php $total = 0; @endphp
            @foreach($items as $item)
                <tr>
                    <td>{{ $pizzas[$item->pizza_id]->nom }}</td>
                    <td>{{ $item->qte }}</td>
                    <td>{{ $pizzas[$item->pizza_id]->prix *$item->qte }}€</td>
                </tr>
                @php $total += $pizzas[$item->pizza_id]->prix *$item->qte; @endphp
            @endforeach
            </tbody>

            <tfoot>
            <tr>
                <td></td>
                <td>Total:</td>
                <td><p class="total">{{ $total }}€</p></td>
            </tr>
            </tfoot>
        </table>

        <p class="text-normal" style="margin-top: 1rem;">Le {{ $commande->created_at }}</p>

    </div>
@endsection
