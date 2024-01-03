@extends('components.user.nav');

@section('title', "Panier")

@section('content')

    @php
        $price = 0;

        if(session()->get('cart')!==null){
            foreach (session()->get('cart') as $pizza) {
                if ($pizza['quantity'] > 0) {
                    $price += $pizza['price']*$pizza['quantity'];
                }
            }
        }
    @endphp

    <div class="order-container">
        <div class="table-wrapper">

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

            <table class="table tcart">

                <thead>
                <tr>
                    <th>Nom</th>
                    <th>Quantité</th>
                    <th>Prix</th>
                </tr>
                </thead>

                <tbody>
                @if(session()->get('cart') !== null)
                    @foreach(session()->get('cart') as $pizza)
                        @if($pizza['quantity'] > 0)

                            <tr>
                                <td>{{ $pizza['name'] }}</td>
                                <td class="controls">
                                    <div class="quantity-selector">
                                        <a href="{{ route('edit.cart', $pizza['id']) }}" class="dec" id="dec">
                                            -
                                        </a>
                                        <div class="quantity-value">
                                            <input id="qt-val" type="text" value="{{ $pizza['quantity'] }}">
                                        </div>
                                        <a href="{{ route('add.to.cart', $pizza['id']) }}" class="inc" id="inc">
                                            +
                                        </a>
                                    </div>
                                </td>
                                <td>{{ $pizza['price']*$pizza['quantity'] }}€</td>
                            </tr>
                        @endif
                    @endforeach
                @endif
                </tbody>

                <tfoot>
                <tr>
                    <td></td>
                    <td>Total:</td>
                    <td><p class="total">{{ $price }}€</p></td>
                </tr>
                </tfoot>

            </table>

            <div class="command">
                <a href="{{ route('checkout') }}">Passer la commande</a>
            </div>

        </div>
    </div>

@endsection
