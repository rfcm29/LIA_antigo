@extends('welcome')

@section('content')

<div class="container">

    <h2 class="reserva-h2">Reserva</h2>
    <p>{{session()->get('reserva.descricao')}}</p>

    <h2 class="reserva-h2">Data Início</h2>
    <p>{{session()->get('reserva.dataInicio')}}</p>

    <h2 class="reserva-h2">Data Fim</h2>
    <p>{{session()->get('reserva.dataFim')}}</p>

    <h2 class="reserva-h2">Produtos Adicionados</h2>

    @foreach (session()->get('reserva.kits') as $kit)
    <div class="reserva-container">
        <div class="img-reserva">
            <img src="https://images.unsplash.com/photo-1452780212940-6f5c0d14d848?ixid=MnwxMjA3fDB8MHxzZWFyY2h8MjB8fGNhbWVyYXxlbnwwfHwwfHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=700&q=60">
        </div>
        <div class="items-reserva">
            <h4>{{$kit->descricao}}</h4>
            <h5>Preço: {{$kit->preco}}</h5>
        </div>
    </div>
    @endforeach

    <form action="/confirmaReserva" method="post">
        @csrf
        <button id="btnReservar" class="btn btn-primary">CONFIRMAR</button>
    </form>

</div>

@endsection
