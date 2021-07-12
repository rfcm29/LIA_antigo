@extends('welcome')

@section('content')

<div class="container">

    <div class="produto-container">
        <div class="left">
            <img src="https://images.unsplash.com/photo-1510127034890-ba27508e9f1c?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=2250&q=80" width="100%">
        </div>
        <div class="right">
            <div class="top">
                <h2>{{ $kit->descricao }}</h2>
                <h3>{{ $kit->preco }}€</h3><br>

                <h5>Este kit contém:</h5>

                @isset($itens[0])

                    @foreach ($itens as $item)

                        <p>{{ $item->descricao }}</p>

                    @endforeach

                @endisset
            </div>

            @if (session()->has('reserva'))
            <div class="bottom">
                <form action="/addCarrinho/{{ $kit->id }}" method="post">
                    @csrf
                    <button type="send" id="btnAddProdReserva" class="btn btn-primary">ADICIONAR À RESERVA</button>
                </form>
                @if ($errors->any())
                    <h4>{{ $errors->first() }}</h4>
                @endif
            </div>
            @endif
        </div>
    </div>

</div>

@endsection
