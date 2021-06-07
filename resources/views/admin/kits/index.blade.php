@extends('admin.dashboard')

@section('content')
    <div class="container">
        @foreach($kits as $kit)
            <div>{{ $kit->descricao }}</div>
            <a href="/admin/kits/{{ $kit->id }}" class="btn btn-secondary">Ver</a>
        @endforeach
    </div>

    <a href="/admin/itens/create" class="btn btn-block btn-primary">Novo Kit</a>
@endsection
