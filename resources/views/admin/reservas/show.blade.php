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
                <li class="list-group-item">Estado da reserva: {{ $reserva->estadoReserva->descricao  }}</li>
                <h2>Kits Reservados</h2>
                @foreach ($reserva->kits as $kit)
                    <li class="list-group-item">{{ $kit->lia_code }}</li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection
