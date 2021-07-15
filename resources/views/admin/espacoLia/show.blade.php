@extends('admin.dashboard')

@section('content')
    <h1>Espaco de Trabalho</h1>
    <br>

    <div>
        <ul class="list-group">
            <li class="list-group-item">
                <h3>{{ $espaco->descricao }}</h3>
                <p>Preço: {{ $espaco->preco }}</p>
            </li>
            <li class="list-group-item">
                <h2>Items presentes deste espaço</h2>
                @foreach ($espaco->items as $item)
                    <br>
                    <p>-> {{ $item->descricao }}</p>
                @endforeach
            </li>
        </ul>
    </div>

    <a href="/admin/espacoLia/{{ $espaco->id }}/edit" class="btn btn-primary">Editar</a>
@endsection
