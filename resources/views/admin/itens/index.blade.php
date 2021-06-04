@extends('admin.dashboard')

@section('content')
    <div class="lg:grid lg:grid-cols-2">
        @foreach($itens as $item)
            <div>{{ $item->marca }}</div>
            <div>{{ $item->modelo }}</div>
            <a href="/admin/itens/$item->id" class="btn btn-secondary">Ver item</a>
        @endforeach
    </div>

    <a href="/admin/itens/create" class="btn btn-block btn-primary">Novo Item</a>
@endsection
