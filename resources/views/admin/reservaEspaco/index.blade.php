@extends('admin.dashboard')

@section('content')
    <div class="container">
        <h1>RESERVAS</h1>
        <br>

        <h2>Todas as Reservas</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Reservante</th>
                    <th>Email</th>
                    <th>Data Inicio</th>
                    <th>Data Fim</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($reservas as $reserva)
                <tr>
                    <td scope="row">{{ $reserva->getUser->name }}</td>
                    <td>{{ $reserva->getUser->email }}</td>
                    <td>{{ $reserva->data_inicio }}</td>
                    <td>{{ $reserva->data_fim }}</td>
                    <td><a href="/admin/reservaEspaco/{{ $reserva->id }}" class="btn btn-block btn-secondary">Ver</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
