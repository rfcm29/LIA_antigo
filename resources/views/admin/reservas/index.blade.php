@extends('admin.dashboard')

@section('content')
    <div>
        <h1>Reservas</h1>
        <br>

        <table class="table">
            <thead>
                <tr>
                    <th>Reservante</th>
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
                    <td scope="row">{{ $reserva->user }}</td>
                    <td>{{ $reserva->data_inicio }}</td>
                    <td>{{ $reserva->data_fim }}</td>
                    <td>{{ $reserva->estado }}</td>
                    <td><button class="btn btn-primary">Ver Reserva</button></td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection
