@extends('admin.dashboard')

@section('content')
    <div class="container">
        <h1>Espaços de Trabalho</h1>
        <br>

        <div class="container">
            <ul class="list-group">
                @foreach ($espacos as $espaco)
                    <li class="list-group-item">
                        <h3>{{ $espaco->descricao }}</h3>
                        <br>
                        <a href="/admin/espacoLia/{{ $espaco->id }}" class="btn btn-light">Ver</a>
                    </li>
                @endforeach
            </ul>
        </div>

        <a href="/admin/espacoLia/create" class="btn btn-primary">Novo Espaço</a>
    </div>
@endsection
