@extends('welcome')

@section('content')

<div class="container">
    <h1>Nova Reserva</h1>

    <br>

    <form action="{{ route('cria.carrinho') }}" method="post">
        @csrf
        <div>
            <label for="dataInicio">Data de Inicio</label>
            <input type="date" name="dataInicio" id="dataInicio">
        </div>
        <div>
            <label for="dataFim">Data de Fim</label>
            <input type="date" name="dataFim" id="dataFim">
        </div>
        <div>
            <label for="descricao">Motivo de requisição</label>
            <input class="form-control" type="text" name="descricao" id="descricao">
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Cria carrinho</button>
    </form>

</div>

@endsection
