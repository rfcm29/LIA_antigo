@extends('admin.dashboard')

@section('content')
    <div>
        <h1>Reservas</h1>
        <br>

        <table class="table">
            <thead>
                <tr>
                    <th>Reservante</th>
                    <th>Email</th>
                    <th>Data Inicio</th>
                    <th>Data Fim</th>
                    <th>Estado</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($reservas as $reserva)

                @endforeach
                <tr>
                    <td scope="row">{{ $reserva->getUser->name }}</td>
                    <td>{{ $reserva->getUser->email }}</td>
                    <td>{{ $reserva->data_inicio }}</td>
                    <td>{{ $reserva->data_fim }}</td>
                    <td>{{ $reserva->estadoReserva->descricao }}</td>
                    <td><a href="/admin/reservas/{{ $reserva->id }}" class="btn btn-block btn-secondary">Ver</a></td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection
