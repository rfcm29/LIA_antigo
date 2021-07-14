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
                <li class="list-group-item">Estado da reserva: {{ $reserva->estadoReserva->descricao }}</li>
                <h2>Kits Reservados</h2>
                @foreach ($reserva->kits as $kit)
                    <li class="list-group-item">{{ $kit->lia_code }}</li>
                @endforeach
            </ul>
        </div>

        @if ($reserva->estadoReserva->id == 1)
            <div class="container">
                <form action="/admin/reservas/{{ $reserva->id }}" method="post">
                    @method('PATCH')
                    @csrf
                    <button type="submit" class="btn btn-success">Autorizar</button>
                </form>
                <br>
                <form action="/admin/reservas/{{ $reserva->id }}" method="post">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-danger">Recusar</button>
                </form>
            </div>
        @endif
    </div>
@endsection
