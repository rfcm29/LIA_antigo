@extends('welcome')

@section('content')

<div class="container">

    @if (session()->has('reserva.kits'))
        @foreach (session()->get('reserva.kits') as $kit)
            <div class="produto">


                <div class="left">
                    <p>{{ $kit->descricao }}</p>
                </div>

                <div class="middle">
                    <p>{{ $kit->preco }}</p>
                </div>

                <div class="right">
                    <form action="/removeKit/{{ $kit->id }}" method="post">
                        @csrf
                        <button class="btn btn-danger fa fa-trash-o"></button>
                    </form>
                </div>
            </div>
        @endforeach
    @endif


    <br>
    <form action="{{ route('cancela.reserva') }}" method="post">
        @csrf
        <button type="submit" class="btn btn-primary">Cancelar reserva</button>
    </form>
    <a href="/confirmarReserva" class="btn btn-primary">Concluir Reserva</a>

</div>

@endsection
