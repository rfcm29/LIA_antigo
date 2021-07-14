@extends('welcome')

@section('content')

<div class="container">
    <h1>Espaços de Trabalho</h1>

    <br>

    <form action="" method="post">
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
            <label for="motivo">Motivo da reserva</label>
            <input type="text" name="motivo" id="motivo">
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Escolher Espaço</button>
    </form>
</div>

@endsection
