@extends('admin.dashboard')

@section('content')
    <h1>Kits</h1>

    <div class="kits-container">

        @foreach($kits as $kit)
            <div class="kit-container">
                <p>{{ $kit->descricao }}</p>
                <img src="https://images.unsplash.com/photo-1502920917128-1aa500764cbd?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=2250&q=80" height="100px">
                <a href="/admin/kits/{{ $kit->id }}" class="btn btn-block btn-secondary">Ver</a>
            </div>
        @endforeach

    </div>

    <a href="/admin/kits/create" class="btn btn-primary">Novo Kit</a>
@endsection
