@extends('admin.dashboard')

@section('content')
    <div class="container">
        @foreach($itens as $item)
            <div>{{ $item->marca }}</div>
            <div>{{ $item->modelo }}</div>
            <a href="/admin/itens/{{ $item->id }}" class="btn btn-secondary">Editar</a>
        @endforeach
    </div>

    <a href="/admin/itens/create" class="btn btn-block btn-primary">Novo Item</a>
@endsection
