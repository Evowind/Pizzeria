@extends('components.admin.nav')

@section('content')
    <div class="table-wrapper">


        <div class="add">
            <button class="text" id="open_add">
                Ajouter
                <i class='bx bx-add-to-queue'></i>
            </button>
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
                <th>Id</th>
                <th>Nom</th>
                <th>Description</th>
                <th>Prix</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($pizzas as $pizza)
                <tr>
                    <td>{{ $pizza -> id }}</td>
                    <td>{{ $pizza -> nom }}</td>
                    <td>{{ $pizza -> description }}</td>
                    <td>{{ $pizza -> prix }}€</td>
                    <td class="actions">

                        <div class="controls">
                            <button id="open_edit" value="{{ $pizza->id }}" title="Editer">
                                <i class='bx bx-edit-alt'></i>
                            </button>

                            <form action="{{ route('pizza.remove') }}" method="POST">
                                @csrf
                                <input type="hidden" name="id" value="{{ $pizza->id }}">
                                <button type="submit" title="Supprimer">
                                    <i class='bx bx-trash'></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <div class="modal-container" id="modal_container_edit">
        <div class="modal">
            <button class="close" id="close_edit">
                <i class='bx bx-x-circle'></i>
            </button>

            <h1 class="text-large">Edition</h1>
            <p class="text-small">Actualisez au choix les informations ci-dessous.</p>

            <form method="POST" action="{{ route('pizza.edit') }}" class="form" id="form">
                @csrf

                <input type="hidden" id="id" name="id">

                <div class="input-control">
                    <input type="text" name="nom" placeholder="Nom" class="input-field">
                </div>

                <div class="input-control">
                    <input type="text" name="description" placeholder="Description" class="input-field">
                </div>

                <div class="input-control">
                    <input type="text" name="prix" placeholder="Prix" class="input-field">
                </div>

                <input type="submit" value="Enregistrer" class="input-submit">
            </form>
        </div>
    </div>

    <div class="modal-container" id="modal_container_add">
        <div class="modal">
            <button class="close" id="close_add">
                <i class='bx bx-x-circle'></i>
            </button>

            <h1 class="text-large">Ajout</h1>
            <p class="text-small">Complétez les informations afin d'effectuer l'ajout.</p>

            <form method="POST" action="{{ route('pizza.add') }}" class="form" id="form">
                @csrf

                <input type="hidden" id="id" name="id">

                <div class="input-control">
                    <input type="text" name="nom" placeholder="Nom" class="input-field" value="{{ old('nom') }}">
                </div>

                <div class="input-control">
                    <input type="text" name="description" placeholder="Description" class="input-field"
                           value="{{ old('description') }}">
                </div>

                <div class="input-control">
                    <input type="text" name="prix" placeholder="Prix" class="input-field" value="{{ old('prix') }}">
                </div>

                <input type="submit" value="Enregistrer" class="input-submit">
            </form>
        </div>
    </div>
@endsection
