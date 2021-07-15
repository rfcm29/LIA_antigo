@extends('admin.dashboard')

@section('content')
<div class="container">
    <h1>Reserva</h1>
    <div class="container">
        <ul class="list-group">
            <li class="list-group-item">Reservante: {{ $reserva->getUser->name }}</li>
            <li class="list-group-item">Descrição: {{ $reserva->descricao }}</li>
            <li class="list-group-item">Data de inicio: {{ $reserva->data_inicio }}</li>
            <li class="list-group-item">Data de fim: {{ $reserva->data_fim }}</li>
            <h2>Espaco Reservado</h2>
            @foreach ($reserva->Espacos as $espaco)
                <h3>{{ $espaco->descricao }}</h3>
                <li class="list-group-item">
                    <h3>Items presentes neste espaço</h2>
                    @foreach ($espaco->items as $item)
                        <br>
                        <p>-> {{ $item->descricao }}</p>
                    @endforeach
                </li>
            @endforeach
        </ul>
    </div>
</div>
@endsection
