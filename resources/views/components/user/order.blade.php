@extends('components.user.nav');

@section('title', "Nouvelle commande")

@section('content')

    <div class="order-container">
        <div class="table-wrapper">
            <div class="top spacer">
                <h1 class="text-large">Commander</h1>
                <div class="cart">
                    @if(session()->get('cart') !== null)
                        <p>{{ count((array) session('cart')) }}</p>
                    @else
                        <p>0</p>
                    @endif
                    <a href="{{ route('user.cart') }}"><i class='bx bx-cart'></i></a>
                </div>
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
                    <th>Description</th>
                    <th>Prix</th>
                    <th>Ajouter au panier</th>
                </tr>
                </thead>
                <tbody>

                @foreach($pizzas as $pizza)
                    <tr>
                        <td>
                            {{ $pizza -> nom }}
                        </td>
                        <td>{{ $pizza -> description }}</td>
                        <td>
                            {{ $pizza -> prix }}€
                        </td>
                        <td class="controls">
                            <div class="quantity-selector">

                                <a href="{{ route('add.to.cart', $pizza->id) }}" class="inc" id="inc">
                                    +
                                </a>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            {{$pizzas->links("pagination::bootstrap-4")}}
        </div>

    </div>

@endsection
